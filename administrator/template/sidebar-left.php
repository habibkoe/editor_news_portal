<div class="dala-menu-kiri">
        <div id="wrapper">

	<ul class="menu">
        <li class="item2"><a href="?page=berita&menu&aksi=tambah">Post</a>
		</li>
		<li class="item1"><a href="?page=tv&menu&aksi=tambah">Editor Tv</a>
		</li>
		<li class="item13"><a href="?page=comments&menu&aksi=lihat">Comment</a>
		</li>
        <li class="item6"><a href="?page=berita&menu&aksi=kategori&tambah">Menu Category</a>
		</li>
        <li class="item14"><a href="?page=info&menu&aksi=tambah">Manage Page Info</a>
		</li>
        <li class="item4"><a href="?page=iklan&menu&aksi=tambah">Advertise</a>
		</li>
        <li class="item5"><a href="?page=admin-edit&menu&aksi=tambah">Users</a>
		</li>
        <li class="item3"><a href="http://editor.id"  target="_blank">Visite Web</a>
		</li>
	</ul>

</div>

<!--initiate accordion-->
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu > li > ul'),
	           menu_a  = $('.menu > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>
   
   	</div>
   <div class="footer-menu-kiri">
    Copyright &copy; Editor.id <?php echo $d = date('Y'); ?>
    </div>
