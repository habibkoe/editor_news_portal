<?php  
session_start();
if(isset($_SESSION['author_id']))
{
	unset($_SESSION['author_id'])
	//session_destroy();
	?><script language="javascript">
	document.location="index.php";
	</script><?php 
	
}else{
	?><script language="javascript">
	document.location="index.php";
	</script>
	<?php 
}
?>
