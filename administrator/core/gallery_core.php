<?php
if (isset($_POST['up'])) {
    $j = 0; //Variable for indexing uploaded image 
	$about = $_POST['isi'];
	$judul = $_POST['judul'];
	$kategori = $_POST['kategori'];
	$penulis = $_POST['penulis_admin'];
	$nama_photo = $_FILES['file']['name'];
	$ukuran_file = $_FILES['file']['size'];
	$tmp_file = $_FILES['file']['tmp_name'];
	$type_file = $_FILES['file']['type'];
	$target_path = "../galery-album/"; //Declaring Path for uploaded images
	$rnd = time();
	$nama_file = $nama_photo;
    for ($i = 0; $i < count($tmp_file); $i++) {//loop to get individual element from the array   
      
	  if (($ukuran_file[$i] < 1000000)) //Approx. 1MB files can be uploaded.
               {
            if (move_uploaded_file($tmp_file[$i], $target_path.$nama_file[$i])) {//if file moved to uploads folder
               $query = $pdo->prepare('INSERT INTO gallery (nama_foto, foto, deskripsi_foto, kategori_foto, id_penulis) VALUES(?,?,?,?,?)');$query->bindValue(1, $judul);$query->bindValue(2, $nama_file[$i]);$query->bindValue(3, $about);$query->bindValue(4, $kategori);$query->bindValue(5, $penulis);$query->execute();
			if($query){
				$pesan = 'Selamat, Data berhasil di simpan';
			}else{?><script language="javascript">alert("Maaf, Error");document.location="beranda_admin.php?page=galery";</script><?php }
            } else {//if file was not moved.
                echo $pesan2. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $pesan2. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}
else if(isset($_POST['oke'])) {
	$gambar_kosong = $_POST['gambar_kosong'];$nama_photo= $_FILES['gambar']['name'];$type = $_FILES['gambar']['type'];$ukuran=$_FILES['gambar']['size'];$judul = $_POST['judul'];$isi = $_POST['isi'];	$id = $_POST['id_galery']; $penulis = $_POST['penulis_admin'];$kategori = $_POST['kategori'];
	if(empty ($nama_photo)){ $nama_file = $gambar_kosong;
		$query = $pdo->prepare('UPDATE gallery SET nama_foto=?, foto=?, deskripsi_foto=?, kategori_foto=?, id_penulis=? WHERE id_gallery=?');$query->bindValue(1, $judul);$query->bindValue(2, $nama_file);$query->bindValue(3, $isi);$query->bindValue(4, $kategori);$query->bindValue(5, $penulis);$query->bindValue(6, $id);$query->execute();
		if($query){ $pesan = 'Selamat Data Berhasil Di simpan'; }
		 
	}else{
		if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png"){ $pesan ='Maaf Gambar yang anda gunakan tidak di perkenankan!!!';}
		else {
			if($ukuran > 1000000){ $pesan = 'Gambar terlalu besar';}
			else{
			$uploaddir ='../galery-album/';$rnd = time();$nama_file = $rnd.'-'.$nama_photo;$alamat_file = $uploaddir.$nama_file;
			unlink("../galery-album/".$gambar_kosong);
			$upload = move_uploaded_file($_FILES['gambar']['tmp_name'],$alamat_file);
			$query = $pdo->prepare('UPDATE gallery SET nama_foto=?, foto=?, deskripsi_foto=?, kategori_foto=?, id_penulis=? WHERE id_gallery=?');$query->bindValue(1, $judul);$query->bindValue(2, $nama_file);$query->bindValue(3, $isi);$query->bindValue(4, $kategori);$query->bindValue(5, $penulis);$query->bindValue(6, $id);$query->execute();
			if($query){$pesan = 'Selamat data Berhasil Di simpan';}}}}
}
else if(isset($_POST['save_kategori'])){
		$judul_kategori = $_POST['judul_kategori'];$deskripsi = $_POST['deskripsi'];
		$query = $pdo->prepare('INSERT INTO kategori_galery (nama_galery, deskripsi_galery ) VALUES(?,?)');$query->bindValue(1, $judul_kategori);$query->bindValue(2, $deskripsi);$query->execute();
					if($query){ 
						$pesan = 'Selamat, Data Berhasil Di simpan';
					}
	
}else if(isset($_POST['update_kategori'])){
		$judul_kategori = $_POST['judul_kategori'];$deskripsi = $_POST['deskripsi'];$id_kategori = $_POST['id_kategori'];
		$query = $pdo->prepare('UPDATE kategori_galery SET nama_galery=?, deskripsi_galery=? WHERE id_k_g=?');$query->bindValue(1, $judul_kategori);$query->bindValue(2, $deskripsi);$query->bindValue(3, $id_kategori);$query->execute();
					if($query){ 
						$pesan = 'Selamat, Data Berhasil Di simpan';
					}
	
}

else if($_GET['aksi']=='hapus'){ 
if(isset($_GET['id_hp'])){
		$id_g=$_GET['id_hp'];$data = $dA->detail_galery($id_g);$df = $data['foto'];$query = $pdo->prepare('DELETE FROM gallery WHERE id_gallery=?');$query->bindValue(1, $id_g);$query->execute();
		if($query){ ?><script language="javascript">document.location="beranda.php?page=gallery&menu&aksi=lihat";</script><?php  }
		$nama_file="../galery-album/".$df;unlink($nama_file);echo "Data sudah di hapus!";}}
?>