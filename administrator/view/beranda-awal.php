<?php
	global $pdo;$query = $pdo->prepare("SELECT nama, status, ussername FROM user WHERE id_user = ?");
	$query->bindValue(1, $id_user);$query->execute();$baris = $query->fetch(); ?>
<div class="content-beranda">
<div class="judul-branda-awal">Welcome To Editor.id Admin Panel</div>
Selamat datang <b><?php echo 'Admin';//$baris['nama']; ?></b> hak akses anda <b><?php echo $baris['status']; ?></b><br /><br />

</div>