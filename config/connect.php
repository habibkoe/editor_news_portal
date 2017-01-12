<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=db_editorv2', 'root', '');
}catch(PDOException $e){
	exit('Database mengalami masalah mas brow, tolong di cek!!');
}


function formatBytes($size, $precision = 2){
    $base = log($size) / log(1024);
    $suffixes = array('', ' KB', ' MB', ' GB', ' TB');   
    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}
?>