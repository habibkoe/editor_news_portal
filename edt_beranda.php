<?php include('site/models/db-query.php');include('squrity.php');include('config/connect.php');$qM = new queryMain; 
if (isset($_GET['baca'])){
	$bc2 = $_GET['baca'];
	$bc = str_replace("."," ",$bc2);
	}else{$bc ='Informasi Teraktual Untuk Anda';} 
	if(isset($_GET['page'])){
	$pg = $_GET['page'];
	}else{
	$pg = 'beranda';	
	}
	?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="editor.id">
    <meta name="description" content="berita terbaru, berita terkini">
	<meta name="keywords" content="berita terbaru, berita terkini, berita bola, berita motogp, berita unik, berita terlengkap, berita teraktual, aktual">

    <title>Editor.id - <?php echo $pg; ?> | <?php echo $bc; ?></title>
	<link rel="stylesheet" href="asset/css/style-beranda.css" >
    <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="asset/img/favicon.png" />
    <script src="asset/js/jquery.min.js" type="text/javascript"></script>
     <!-- Core JavaScript Files -->
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
		$(document).ready(function(){
		$('ul.nav li.dropdown').hover(function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(50);
		}, function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(100);
		});  
	});
	</script>
    <!-- Custom Theme JavaScript -->
    <!-- Fonts -->
<style type="text/css">
/* KangRian Box CSS */
@media (max-width:800px){ #kr-box { display:none; } }
#kr-box {
position:fixed !important;
position:absolute;
top:-700px;
left:39%;
margin:0px 0px 0px -182px;
font:normal Dosis, Georgia, Serif;
color:#333;
-webkit-box-shadow:0px 0px 10px #333;
-moz-box-shadow:0px 0px 10px #333;
box-shadow:0px 0px 10px #333;
background:#fff;
}
#kr-box a.close-popup {
position:absolute;
top:-25px;
right:0px;
font:25px Arial, Sans-Serif;
text-decoration:none;
text-align:center;
color:#f2f2f2;
cursor:pointer;
}
#kr-box a.close-popup:hover { color:#fff; }
#kr-box a.close-popup:active { opacity:0; }
#kr-box div.black-bg { background:#000 url(http://3.bp.blogspot.com/-7A606zdRAD8/U10SZcdl9QI/AAAAAAAAE3o/V_9HMnP0fLQ/s1600/ajax-loader-apps.gif) no-repeat center;position:fixed;top:0px;left:0px;width:100%;height:100%;opacity:.6;z-index:-500; }
#kr-box div.gambar-space { border:5px solid #fff; position:relative; background:#fff;border-bottom:0px;}
#kr-box div.gambar-space img { width:600px; height:400px; }
</style>
</head>
<body class="bg-container">
 <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
      		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            	<a class="navbar-brand padding-top" href="brnd">
                        <img src="asset/img/logonav.png" width="25" height="25" />
                </a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                 <div class="text-center">
                     <form action="search" method="post">
                         
                            <input type="search" name="searchnews" class="form-control-beranda margin-top-5" placeholder="Cari Berita Di Editor.id.....">
                         
                     </form>
                 </div>
             </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
             	<?php echo $date = date('D j M Y'); ?>
             </div>
         </div>
    </nav>
	<!--Inner Container-->
	<div class="container bg-white padding-bottom margin-top-beranda">
        <!-- CONSOLE -->
        <?php include('site/console/rooting.php'); ?>
        <!-- /CONSOLE -->
   	</div>
     <!-- End of inner contain -->
     <!-- Section: footer -->
    	<?php include('site/template/footer.php'); ?>
    <!-- /Section: footer -->
    <!-- jQuery KR-Box [ Begin ] -->
<div id="kr-box">
<a class="close-popup" href="#">&#215;</a>
<div class="black-bg kaluar"></div>
<div class="gambar-space">
<a href="#link"><img src="http://1.bp.blogspot.com/-Eq--wpK-4ko/U10QpJeZN6I/AAAAAAAAE3c/0Qb_BlUQUzg/s1600/SPACE-PROMOTE-600X400-PIXEL.png" alt="Judul"/></a>
</div>
</div>

<script type='text/javascript'>
// JavaScript KR-Box
$(window).bind("load", function() {
$('#kr-box').animate({top:"100px"}, 2000);
$('a.close-popup, .kaluar').click(function() {
$(this).parent().fadeOut(500);
return false;
});
});
</script>
<!-- jQuery KR-Box [ End ] -->
</body>

</html>