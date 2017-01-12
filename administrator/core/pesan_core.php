<?php
if(isset($_POST['kirim'])){
$name=$_POST['nama'];$email=$_POST['email'];$subject=$_POST['judul'];$pesan=nl2br($_POST['isi_pesan']);

$to=$email;

$pesan="From:$name <br />".$pesan;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <admin@sma2selong.com>' . "\r\n";
$headers .= 'Cc: admin@sma2selong.com' . "\r\n";
@mail($to,$subject,$pesan,$headers);
if(@mail)
{
$pesan_error = "Email sent successfully !!";	
}
}
?>