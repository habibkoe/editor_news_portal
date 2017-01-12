<?php
	if(isset($_POST['kirim'])){
		$comentator = $_POST['nama'];
		$counter_comment = $_POST['counter_comment'];
		$cc = $counter_comment+1;
		$post_id = $_POST['post_id'];
		$komentar = nl2br($_POST['komentar']);
		if(empty($comentator)){
			$pesan2 = 'Maaf Nama Wajib Di Isi!!!';
			}
		else{
			$query = $pdo->prepare('INSERT INTO comments (post_id, description, comentator) VALUES(?,?,?)');
			$query->bindValue(1, $post_id);
			$query->bindValue(2, $komentar);
			$query->bindValue(3, $comentator);
			$query->execute();
			
			$query2 = $pdo->prepare('UPDATE post_news SET counter_comment=? WHERE post_id=?');
			$query2->bindValue(1, $cc);
			$query2->bindValue(2, $post_id);
			$query2->execute();
				if($query && $query2){ $pesan = 'Pesan Anda Berhasil Terkirim!!';}
		}
	}
	
?>