<?php session_start();include_once('../config/connect.php');include_once('models/db-admin.php');$dA = new dbAdmin;
if(isset($_SESSION['author_id'])){$id_user = $_SESSION['author_id'];$pg = $_GET['page'];?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $pg; ?> > admin editor.id </title>
<link rel="stylesheet" href="../asset/css/style-admin.css" type="text/css" />
<link rel="stylesheet" href="../asset/css/menu-samping.css" type="text/css" />
<link rel="shortcut icon" href="../asset/img/favicon.png" />
<script src="../asset/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../asset/tiny_mce/tiny_mce_src.js"></script>
<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "specific_textareas",
		theme : "advanced",
		editor_selector: "tinyMCE",
		content_css : "http://localhost/editor.idv2/asset/tiny_mce/themes/advanced/skins/default/costum_content.css",
		theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
		font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",
	
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_toolbar_location : "top",
   		theme_advanced_toolbar_align : "left",
		theme_advanced_resizing : "true",
		theme_advanced_resize_horizontal : "true",
		theme_advanced_statusbar_location : "bottom",

		// Example content CSS (should be your site CSS)
		content_css : "../asset/css/style-admin.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
				{title: 'Bold text', inline: 'b'},
        		{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        		{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        		{title: 'Example 1', inline: 'span', classes: 'example1'},
        		{title: 'Example 2', inline: 'span', classes: 'example2'},
        		{title: 'Table styles'},
        		{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

</head>

<body>
<div class="header">
	<div class="head-kiri">
    	EDITOR.ID ADMIN
    </div>
    <div class="head_cari">
    	<marquee>| Editor.id | Selamat Bekerja , Mari Tingkatkan Informasi Yang Berkualitas Untuk Pembaca | Editor.id |</marquee>
    </div>
    <div class="head-kanan">
    	<?php 
		global $pdo;
			$query = $pdo->prepare("SELECT author_name, previlage, username FROM author WHERE author_id = ?");
			$query->bindValue(1, $id_user);
			$query->execute();	
			$baris = $query->fetch();
			echo '<a href="?page=admin-edit">';
			echo '<img src="../asset/img/setting.png" />';
			echo $baris['username']; 
			echo '</a>';
		?>
    </div>
    <div class="head_out">
    	<ul class="menu">
    	<li class="item9"><a href="logout.php">Logout</a>
        </li>
        </ul>
	</div>
</div>
	<div class="side-menu-kiri">
    	<?php include('template/sidebar-left.php'); ?>
    	    </div>
        <?php include('console/rooting.php'); ?>    
           
   
</body>
</html>
<?php }else{
	?><script language="javascript">
	document.location="login.php?page=login";
	</script>
	<?php 
} ?>