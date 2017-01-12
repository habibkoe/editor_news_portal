//variable initialization 
var current_page	=	1;
var loading			=	false;
var oldscroll		=	-5;
$(document).ready(function(){

	$.ajax({
		'url':'site/core/get_data.php',
		'type':'post',
		'data': 'p='+current_page,
		success:function(data){
			var data	=	$.parseJSON(data);
			$(data.html).hide().appendTo('#messages-list').fadeIn(500);
			current_page++;
		}
	});
	
	$(window).scroll(function() {
		if( $(window).scrollTop() > oldscroll ){ //if we are scrolling down
			if( ($(window).scrollTop() + $(window).height() >= $(document).height()  ) && (current_page <= total_pages) ) {
				   if( ! loading ){
						loading = true;
						$('#messages-list').addClass('loading');
						$.ajax({
							'url':'site/core/get_data.php',
							'type':'post',
							'data': 'p='+current_page,
							success:function(data){
								var data	=	$.parseJSON(data);
								$(data.html).hide().appendTo('#messages-list').fadeIn(500);
								current_page++;
								$('#messages-list').removeClass('loading');
								loading = false;
							}
						});	
				   }
			}
		}
	});
	
});