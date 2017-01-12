<?php	
	if(isset($_POST['publish'])){
			$tv_title = $_POST['tv_title'];
			$linkembed = $_POST['linkembed'];
			$query = $pdo->prepare('INSERT INTO post_tv (tv_title, tv_link ) VALUES(?,?)');
			$query->bindValue(1, $tv_title);
			$query->bindValue(2, $linkembed);
			$query->execute();
			if($query){ 
				$pesan = 'Selamat, Data Berhasil Di simpan';
			}
		
	}else if(isset($_POST['update'])){
			$judul = $_POST['judul'];
			$tvid = $_POST['tv_id'];
			$query = $pdo->prepare('UPDATE post_tv SET tv_title=? WHERE tv_id=?');
			$query->bindValue(1, $judul);
			$query->bindValue(2, $tvid);
			$query->execute();
			if($query){ 
				$pesan = 'Selamat, Data Berhasil Di simpan';
			}
		
	}
	else if($_GET['aksi']=='hapus') {
		if(isset($_GET['id_hb'])){$id_b=$_GET['id_hb'];
			$query = $pdo->prepare('DELETE FROM post_tv WHERE tv_id=?');
			$query->bindValue(1, $id_b);
			$query->execute();
			if($query){ ?>
				<script language="javascript">
					document.location="beranda.php?page=tv&menu&aksi=lihat";
                </script>
			<?php }
		}
	}
?>
