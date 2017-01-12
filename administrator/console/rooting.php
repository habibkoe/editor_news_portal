 <?php 
	if($pg == 'beranda'){ 
		include('view/beranda-awal.php');
	
	}else if($pg == 'berita'){
		include('view/berita.php');		
	
	}else if($pg == 'tv'){
		include('view/tv.php');	
	}
	else if($pg == 'iklan'){
		include('view/iklan.php');	
	}
	else if($pg == 'admin-edit'){
		include('view/admin_edit.php');	
	}
	else if($pg == 'comments'){
		include('view/comments.php');	
	}
	else if($pg == 'info'){
		include('view/info.php');	
	}
	?>