<?php if(isset($_POST['publish'])){
	
	 if (isset($_POST['position1'])) {    
 		$position = $_POST['position1'];    
 	 }    
 	 if (isset($_POST['position2'])) {    
 		$position = $_POST['position2'];    
 	 }    
 	 if (isset($_POST['position3'])) {    
    	$position = $_POST['position3'];    
     }    
 	 if (isset($_POST['position4'])) {    
 		$position = $_POST['position4'];    
 	 } 
		$title = $_POST['ad_title'];
		$link = $_POST['ad_link'];
		$fileya= $_FILES['ad_temp']['name'];
		$type = $_FILES['ad_temp']['type'];
		$ukuran=$_FILES['ad_temp']['size'];
			if(empty($title)){ $pesan2 ='Maaf Nama File Masih Kosong!!';
			}else{
					if($ukuran>500000){ $pesan2 ="Maaf, Gambar yang di perbolehkan di bawah 5MB";
					}
					else{
						$uploaddir ='../advertise/';
						$rnd = time();
						$nama_file = $rnd.'-'.$fileya;
						$alamat_file = $uploaddir.$nama_file;
							if(move_uploaded_file($_FILES['ad_temp']['tmp_name'],$alamat_file)){
								$query = $pdo->prepare('INSERT INTO advertise (ad_title, ad_temp, ad_link, ad_position ) VALUES(?,?,?,?)');
								$query->bindValue(1, $title);
								$query->bindValue(2, $nama_file);
								$query->bindValue(3, $link);
								$query->bindValue(4, $position);
								$query->execute();
									if($query){
										$pesan = 'Selamat, Data berhasil di simpan';
									}else{?>
										<script language="javascript">
											alert("Maaf, Error");document.location="beranda.php?page=iklan&menu&aksi=tambah";
                                        </script> <?php }
									}else{?>
										<script language="javascript">
											alert("Maaf, Data Gagal Disimpan!!");document.location="beranda.php?page=iklan&menu&aksi=tambah";
                                            </script> <?php } } } 
}
else if(isset($_POST['save_kategori'])){
		$judul_kategori = $_POST['judul_kategori'];
		$query = $pdo->prepare('INSERT INTO kategori_upload (kategori_upload) VALUES(?)');$query->bindValue(1, $judul_kategori);$query->execute();
					if($query){ 
						$pesan = 'Selamat, Data Berhasil Di simpan';
					}
	
}else if(isset($_POST['update_kategori'])){
		$judul_kategori = $_POST['judul_kategori'];$id_kategori = $_POST['id_kategori'];
		$query = $pdo->prepare('UPDATE kategori_upload SET kategori_upload=? WHERE id_ku=?');$query->bindValue(1, $judul_kategori);$query->bindValue(2, $id_kategori);$query->execute();
					if($query){ 
						$pesan = 'Selamat, Data Berhasil Di simpan';
					}
	
}
else if($_GET['aksi']=='hapus') {
	if(isset($_GET['id_hf'])){$id_fu =$_GET['id_hf'];$delete_file = $dA->detail_file_upload($id_fu);
		$df = $delete_file['nama_file'];
		$query = $pdo->prepare('DELETE FROM file WHERE id_file=?');
		$query->bindValue(1, $id_fu);$query->execute();
		if($query){ ?><script language="javascript">document.location="beranda.php?page=vupload&menu&aksi=lihat";</script>
		<?php $nama_file="../file/".$df;unlink($nama_file);echo "Data sudah di hapus!";}}
}	
 ?>