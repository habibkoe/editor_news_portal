<?php	
	if(isset($_POST['publish'])){
		$judul = $_POST['judul'];
		$publish = $_POST['publish'];
		$isi = nl2br ($_POST['isi']);
		$kategori = $_POST['kategori'];			
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{	
					$query = $pdo->prepare('INSERT INTO post_page (page_title, page_description, page_category, status ) VALUES(?,?,?,?)');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $kategori);
					$query->bindValue(4, $publish);
					$query->execute();
					
						if($query){ 
							$pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=info&menu&aksi=tambah";
                            </script>
						<?php }}								
								
	}else if(isset($_POST['simpan'])){
		$judul = $_POST['judul'];
		$simpan = $_POST['simpan'];
		$isi = nl2br ($_POST['isi']);
		$kategori = $_POST['kategori'];			
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{	
					$query = $pdo->prepare('INSERT INTO post_page (page_title, page_description, page_category, status ) VALUES(?,?,?,?)');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $kategori);
					$query->bindValue(4, $simpan);
					$query->execute();
					
						if($query){ 
							$pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=info&menu&aksi=tambah";
                            </script>
								<?php } } 
								
								
	}else if(isset($_POST['edit_sub'])){
		$judul = $_POST['judul'];
		$publish = $_POST['edit_sub'];
		$kategori = $_POST['kategori'];
		$isi = nl2br ($_POST['isi']);
		$id_berita = $_POST['id_berita'];	
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{	
					$query = $pdo->prepare('UPDATE post_page SET page_title=?, page_description=?, page_category=?, status=? WHERE page_id=?');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $kategori);
					$query->bindValue(4, $publish);
					$query->bindValue(5, $id_berita);
					$query->execute();
					
						if($query){ 
							$pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=info&menu&aksi=tambah";
                            </script>
						<?php }}
					
	}else if(isset($_POST['edit_simpan'])){
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$simpan = $_POST['edit_simpan'];
		$isi = nl2br ($_POST['isi']);
		$id_berita = $_POST['id_berita'];	
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{	
					$query = $pdo->prepare('UPDATE post_page SET page_title=?, page_description=?, page_category=?, status=? WHERE page_id=?');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $kategori);
					$query->bindValue(4, $simpan);
					$query->bindValue(5, $id_berita);
					$query->execute();
					
						if($query){ 
							$pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=info&menu&aksi=tambah";
                            </script>
						<?php }}
					
	}else if(isset($_POST['save_kategori'])){
			$judul_kategori = $_POST['judul_kategori'];
			$url = str_replace(" ", ".", $judul_kategori);
			$query = $pdo->prepare('INSERT INTO page_category (page_cat_title, page_cat_url) VALUES(?,?)');
			$query->bindValue(1, $judul_kategori);
			$query->bindValue(2, $url);
			$query->execute();
			if($query){ 
				$pesan = 'Selamat, Data Berhasil Di simpan';
			}
		
	}else if(isset($_POST['update_kategori'])){
			
			$judul_kategori = $_POST['judul_kategori'];
			$url = str_replace(" ", ".", $judul_kategori);
			$id_kategori = $_POST['id_kategori'];
			$query = $pdo->prepare('UPDATE page_category SET page_cat_title=?, page_cat_url=? WHERE page_cat_id=?');
			$query->bindValue(1, $judul_kategori);
			$query->bindValue(2, $url);
			$query->bindValue(3, $id_kategori);
			$query->execute();
			if($query){ 
				$pesan = 'Selamat, Data Berhasil Di simpan';
			}
		
	}else if($_GET['aksi']=='hapus') {
		if(isset($_GET['id_hb'])){
			$id_b=$_GET['id_hb'];
			$query = $pdo->prepare('DELETE FROM post_page WHERE page_id=?');
			$query->bindValue(1, $id_b);
			$query->execute();
		
			if($query){ ?><script language="javascript">document.location="beranda.php?page=info&menu&aksi=lihat";</script>
			<?php }}
	}
	else if($_GET['aksi']=='hapus_kategori') {
		if(isset($_GET['id_hb'])){$id_b=$_GET['id_hb'];
			$query = $pdo->prepare('DELETE FROM page_category WHERE page_cat_id=?');
			$query->bindValue(1, $id_b);
			$query->execute();
			if($query){ ?>
				<script language="javascript">
					document.location="beranda.php?page=info&menu&aksi=kategori&tambah";
                </script>
			<?php }
		}
	}
?>