<?php
include('../../config/connect.php');
if( isset( $_POST['p'] ) )
{
	$page = intval( $_POST['p'] );
	$current_page = $page - 1;
	$records_per_page = 12; // records to show per page
	$start = $current_page * $records_per_page;
	$query = $pdo->prepare("SELECT * from post_news LEFT JOIN author ON author.author_id=post_news.author_id ORDER BY post_id DESC LIMIT $start, $records_per_page");
	$query->execute();
	$html=	"";
	while ( $row = $query->fetch() ){
		$html	.='<li>'.$row['post_title'].': '.$row['username'].'</li>';
		}
	//returning data
	$data=array(
				'html' => $html
				);
	echo json_encode($data);

}
?>