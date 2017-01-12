<?php	
	if(isset($_POST['publish'])){
		$judul = $_POST['judul'];
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		$jdl = str_replace($d, "", $_POST['judul']);
		$url = str_replace(" ", ".", $jdl);
		$publish = $_POST['publish'];
		$isi = nl2br ($_POST['isi']);
		$gambar_kosong = $_POST['gambar_kosong'];
		$nama_photo= $_FILES['gambar']['name'];
		$penulis_admin = $_POST['penulis_admin'];
		$link_id = $_POST['link_id'];
		$type = $_FILES['gambar']['type'];
		$ukuran=$_FILES['gambar']['size'];
		$kategori = $_POST['kategori'];			
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{	
				
				if(empty($nama_photo)){
					$nama_file = $gambar_kosong;
					$query = $pdo->prepare('INSERT INTO post_news (post_title, post_description, author_id, link_id, 
					post_status, post_url ) VALUES(?,?,?,?,?,?)');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $penulis_admin);
					$query->bindValue(4, $link_id);
					$query->bindValue(5, $publish);
					$query->bindValue(6, $url);
					$query->execute();
					
					for ($i=0; $i<sizeof($kategori);$i++) {
					$query2 = $pdo->prepare('INSERT INTO category_meta (category_id, link_id) VALUES(?,?)');
					$query2->bindValue(1, $kategori[$i]);
					$query2->bindValue(2, $link_id);
					$query2->execute();
					}
					$query3 = $pdo->prepare('INSERT INTO media (media_type, media_title, author_id, size, media_temp, link_id) VALUES(?,?,?,?,?,?)');
					$query3->bindValue(1, $type);
					$query3->bindValue(2, $judul);
					$query3->bindValue(3, $penulis_admin);
					$query3->bindValue(4, $ukuran);
					$query3->bindValue(5, $nama_file);
					$query3->bindValue(6, $link_id);
					$query3->execute();
						if($query && $query2 && $query3){ 
							$pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=berita&menu&aksi=tambah";
                            </script>
						<?php }	
				}else{	
					if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
						$pesan2 ="Maaf, Gambar yang di perbolehkan hanya .jpg | .gif | .jpeg | .png";
					}else{
						if($ukuran>1000000){ $pesan2 ="Maaf, Gambar yang di perbolehkan di bawah 1MB";
					} else{
						$uploaddir ='../images/';
						$rnd = time();
						$nama_file = $rnd.'-'.$nama_photo;
						$alamat_file = $uploaddir.$nama_file;
							if(move_uploaded_file($_FILES['gambar']['tmp_name'],$alamat_file)){
								$query = $pdo->prepare('INSERT INTO post_news (post_title, post_description, author_id, link_id, post_status, post_url ) VALUES(?,?,?,?,?,?)');
								$query->bindValue(1, $judul);
								$query->bindValue(2, $isi);
								$query->bindValue(3, $penulis_admin);
								$query->bindValue(4, $link_id);
								$query->bindValue(5, $publish);
								$query->bindValue(6, $url);
								$query->execute();
								for ($i=0; $i<sizeof($kategori);$i++) {
								$query2 = $pdo->prepare('INSERT INTO category_meta (category_id, link_id) VALUES(?,?)');
								$query2->bindValue(1, $kategori[$i]);
								$query2->bindValue(2, $link_id);
								$query2->execute();
								}
								$query3 = $pdo->prepare('INSERT INTO media (media_type, media_title, author_id, size, media_temp, link_id) VALUES(?,?,?,?,?,?)');
								$query3->bindValue(1, $type);
								$query3->bindValue(2, $judul);
								$query3->bindValue(3, $penulis_admin);
								$query3->bindValue(4, $ukuran);
								$query3->bindValue(5, $nama_file);
								$query3->bindValue(6, $link_id);
								$query3->execute();
									if($query && $query2 && $query3){
										$pesan = 'Selamat, Data berhasil di simpan';
									}else{?>
										<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=berita&menu&aksi=tambah";
                                        </script>
									<?php }
							}else{?>
								<script language="javascript">alert("Maaf, Data Gagal Disimpan!!");document.location="beranda.php?page=berita&menu&aksi=tambah";
                                </script>
								<?php } } } } }
								
								
	}else if(isset($_POST['simpan'])){
		$judul = $_POST['judul'];
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		$jdl = str_replace($d, "", $_POST['judul']);
		$url = str_replace(" ", ".", $jdl);
		$simpan = $_POST['simpan'];
		$isi = nl2br ($_POST['isi']);
		$gambar_kosong = $_POST['gambar_kosong'];
		$nama_photo= $_FILES['gambar']['name'];
		$penulis_admin = $_POST['penulis_admin'];
		$link_id = $_POST['link_id'];
		$kategori = $_POST['kategori'];
		$type = $_FILES['gambar']['type'];
		$ukuran=$_FILES['gambar']['size'];
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{	
				
				if(empty($nama_photo)){	
					$nama_file = $gambar_kosong;
					$query = $pdo->prepare('INSERT INTO post_news (post_title, post_description, author_id, link_id, post_status, post_url ) VALUES(?,?,?,?,?,?)');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $penulis_admin);
					$query->bindValue(4, $link_id);
					$query->bindValue(5, $simpan);
					$query->bindValue(6, $url);
					$query->execute();
					
					for ($i=0; $i<sizeof($kategori);$i++) {
					$query2 = $pdo->prepare('INSERT INTO category_meta (category_id, link_id) VALUES(?,?)');
					$query2->bindValue(1, $kategori[$i]);
					$query2->bindValue(2, $link_id);
					$query2->execute();
					}
					$query3 = $pdo->prepare('INSERT INTO media (media_type, media_title, author_id, size, media_temp, link_id) VALUES(?,?,?,?,?,?)');
					$query3->bindValue(1, $type);
					$query3->bindValue(2, $judul);
					$query3->bindValue(3, $penulis_admin);
					$query3->bindValue(4, $ukuran);
					$query3->bindValue(5, $nama_file);
					$query3->bindValue(6, $link_id);
					$query3->execute();
						if($query && $query2 && $query3){ 
							$pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=berita&menu&aksi=tambah";
                            </script>
						<?php }	
				}else{	
					if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
						$pesan2 ="Maaf, Gambar yang di perbolehkan hanya .jpg | .gif | .jpeg | .png";
					}else{
						if($ukuran>1000000){ $pesan2 ="Maaf, Gambar yang di perbolehkan di bawah 1MB";
					} else{
						$uploaddir ='../images/';
						$rnd = time();
						$nama_file = $rnd.'-'.$nama_photo;
						$alamat_file = $uploaddir.$nama_file;
							if(move_uploaded_file($_FILES['gambar']['tmp_name'],$alamat_file)){
								$query = $pdo->prepare('INSERT INTO post_news (post_title, post_description, author_id,link_id, post_status, post_url ) VALUES(?,?,?,?,?,?)');
								$query->bindValue(1, $judul);
								$query->bindValue(2, $isi);
								$query->bindValue(3, $penulis_admin);
								$query->bindValue(4, $link_id);
								$query->bindValue(5, $simpan);
								$query->bindValue(6, $url);
								$query->execute();
								for ($i=0; $i<sizeof($kategori);$i++) {
								$query2 = $pdo->prepare('INSERT INTO category_meta (category_id, link_id) VALUES(?,?)');
								$query2->bindValue(1, $kategori[$i]);
								$query2->bindValue(2, $link_id);
								$query2->execute();
								}
								$query3 = $pdo->prepare('INSERT INTO media (media_type, media_title, author_id, size, media_temp, link_id) VALUES(?,?,?,?,?,?)');
								$query3->bindValue(1, $type);
								$query3->bindValue(2, $judul);
								$query3->bindValue(3, $penulis_admin);
								$query3->bindValue(4, $ukuran);
								$query3->bindValue(5, $nama_file);
								$query3->bindValue(6, $link_id);
								$query3->execute();
									if($query && $query2 && $query3){
										$pesan = 'Selamat, Data berhasil di simpan';
									}else{?>
										<script language="javascript">alert("Maaf, Error");document.location="beranda.php?page=berita&menu&aksi=tambah";
                                        </script>
									<?php }
							}else{?>
								<script language="javascript">alert("Maaf, Data Gagal Disimpan!!");document.location="beranda.php?page=berita&menu&aksi=tambah";
                                </script>
								<?php } } } } }
								
								
	}else if(isset($_POST['edit_sub'])){
		$judul = $_POST['judul'];
		$publish = $_POST['edit_sub'];
		$link_id = $_POST['link_id'];
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		$jdl = str_replace($d, "", $_POST['judul']);
		$url = str_replace(" ", ".", $jdl);
		$date = $_POST['date'];
		$penulis_admin = $_POST['penulis_admin'];
		$isi = nl2br ($_POST['isi']);
		$nama_photo= $_FILES['gambar']['name'];
		$gambar_lama=$_POST['gambar_lama'];
		$id_berita=$_POST['id_berita'];
		$type = $_FILES['gambar']['type'];
		$ukuran=$_FILES['gambar']['size'];
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{		
				if(empty($nama_photo)){
					$nama_file = $gambar_lama;
					$query = $pdo->prepare('UPDATE post_news SET post_title=?, post_description=?, author_id=?, edited_date=?, post_url=?, post_status=? WHERE link_id=?');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $penulis_admin);
					$query->bindValue(4, $date);
					$query->bindValue(5, $url);
					$query->bindValue(6, $publish);
					$query->bindValue(7, $link_id);
					$query->execute();
					
					$query3 = $pdo->prepare('UPDATE media SET media_title=?, media_temp=? WHERE link_id=?');
					$query3->bindValue(1, $judul);
					$query3->bindValue(2, $nama_file);
					$query3->bindValue(3, $link_id);
					$query3->execute();
						if($query && $query3){ $pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">
							alert("Maaf, Error");
							document.location="beranda.php?page=berita&menu&aksi=edit&id_eb=<?php echo $id_berita; ?>";
                            </script>
						<?php }	
				}else{
					if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
						$pesan2 ="Maaf, Gambar yang di perbolehkan hanya .jpg | .gif | .jpeg | .png";
					}else{
						if($ukuran>1000000){$pesan2 ="Maaf, Gambar yang di perbolehkan di bawah 1MB";
					}else{
						$uploaddir ='../images/';
						$rnd = time();
						$nama_file = $rnd.'-'.$nama_photo;
						$alamat_file = $uploaddir.$nama_file;
						if( move_uploaded_file($_FILES['gambar']['tmp_name'],$alamat_file)){
						$query = $pdo->prepare('UPDATE post_news SET post_title=?, post_description=?, author_id=?, edited_date=?, post_url=?, post_status=? WHERE link_id=?');
						$query->bindValue(1, $judul);
						$query->bindValue(2, $isi);
						$query->bindValue(3, $penulis_admin);
						$query->bindValue(4, $date);
						$query->bindValue(5, $url);
						$query->bindValue(6, $publish);
						$query->bindValue(7, $link_id);
						$query->execute();
						
						
						$query3 = $pdo->prepare('UPDATE media SET media_type=?, media_title=?, size=?, media_temp=? WHERE link_id=?');
						$query3->bindValue(1, $type);
						$query3->bindValue(2, $judul);
						$query3->bindValue(3, $ukuran);
						$query3->bindValue(4, $nama_file);
						$query3->bindValue(5, $link_id);
						$query3->execute();
							
						}
						
						if($query && $query3){$pesan = 'Selamat, Data berhasil di simpan';
						}else{?><script language="javascript">
							alert("Maaf, Error");
							document.location="beranda.php?page=berita&menu&aksi=edit&id_eb=<?php echo $id_berita; ?>";</script><?php }}}}}
					
	}else if(isset($_POST['simpan_edit'])){
		$judul = $_POST['judul'];
		$publish = $_POST['simpan_edit'];
		$link_id = $_POST['link_id'];
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
		$jdl = str_replace($d, "", $_POST['judul']);
		$url = str_replace(" ", ".", $jdl);
		$date = $_POST['date'];
		$isi = nl2br ($_POST['isi']);
		$nama_photo= $_FILES['gambar']['name'];
		$gambar_lama=$_POST['gambar_lama'];
		$id_berita=$_POST['id_berita'];
		$type = $_FILES['gambar']['type'];
		$ukuran=$_FILES['gambar']['size'];
			if(empty($judul)){ $pesan2 ='Maaf Judul Masih Kosong!!';
			}else{		
				if(empty($nama_photo)){
					$nama_file  = $gambar_lama;
					$query = $pdo->prepare('UPDATE post_news SET post_title=?, post_description=?, edited_date=?, post_url=?, post_status=? WHERE link_id=?');
					$query->bindValue(1, $judul);
					$query->bindValue(2, $isi);
					$query->bindValue(3, $date);
					$query->bindValue(4, $url);
					$query->bindValue(5, $publish);
					$query->bindValue(6, $link_id);
					$query->execute();
					
					$query3 = $pdo->prepare('UPDATE media SET media_title=?, media_temp=? WHERE link_id=?');
					$query3->bindValue(1, $judul);
					$query3->bindValue(2, $nama_file);
					$query3->bindValue(3, $link_id);
						if($query && $query3){ $pesan = 'Selamat, Data Berhasil Di simpan';
						}else{ ?>
							<script language="javascript">
							alert("Maaf, Error");
							document.location="beranda.php?page=berita&menu&aksi=edit&id_eb=<?php echo $id_berita; ?>";
                            </script>
						<?php }	
				}else{
					if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
						$pesan2 ="Maaf, Gambar yang di perbolehkan hanya .jpg | .gif | .jpeg | .png";
					}else{
						if($ukuran>1000000){$pesan2 ="Maaf, Gambar yang di perbolehkan di bawah 1MB";
					}else{
						$uploaddir ='../images/';
						$rnd = time();
						$nama_file = $rnd.'-'.$nama_photo;
						$alamat_file = $uploaddir.$nama_file;
						unlink("../images/".$gambar_lama);
						$upload = move_uploaded_file($_FILES['gambar']['tmp_name'],$alamat_file);
						$query = $pdo->prepare('UPDATE post_news SET post_title=?, post_description=?, edited_date=?, post_url=?, post_status=? WHERE link_id=?');
						$query->bindValue(1, $judul);
						$query->bindValue(2, $isi);
						$query->bindValue(3, $date);
						$query->bindValue(4, $url);
						$query->bindValue(5, $publish);
						$query->bindValue(6, $link_id);
						$query->execute();
						
						$query3 = $pdo->prepare('UPDATE media SET media_type=?, media_title=?, size=?, media_temp=? WHERE link_id=?');
						$query3->bindValue(1, $type);
						$query3->bindValue(2, $judul);
						$query3->bindValue(3, $ukuran);
						$query3->bindValue(4, $nama_file);
						$query3->bindValue(5, $link_id);
						$query3->execute();
						
						if($query && $query3){$pesan = 'Selamat, Data berhasil di simpan';
						}else{?><script language="javascript">
							alert("Maaf, Error");
							document.location="beranda.php?page=berita&menu&aksi=edit&id_eb=<?php echo $id_berita; ?>";</script><?php }}}}}
					
	}else if(isset($_POST['save_kategori'])){
			$judul_kategori = $_POST['judul_kategori'];
			$url = strtolower(str_replace(" ", "-", $judul_kategori));
			$inisial_kategori = $_POST['inisial_kategori'];
			$query = $pdo->prepare('INSERT INTO category (category_name, category_description, category_url ) VALUES(?,?,?)');
			$query->bindValue(1, $judul_kategori);
			$query->bindValue(2, $inisial_kategori);
			$query->bindValue(3, $url);
			$query->execute();
			if($query){ 
				$pesan = 'Selamat, Data Berhasil Di simpan';
			}
		
	}else if(isset($_POST['update_kategori'])){
			$judul_kategori = $_POST['judul_kategori'];
			$url = strtolower(str_replace(" ", "-", $judul_kategori));
			$inisial_kategori = $_POST['inisial_kategori'];
			$id_kategori = $_POST['id_kategori'];
			$query = $pdo->prepare('UPDATE category SET category_name=?, category_description=?, category_url=? WHERE category_id=?');
			$query->bindValue(1, $judul_kategori);
			$query->bindValue(2, $inisial_kategori);
			$query->bindValue(3, $url);
			$query->bindValue(4, $id_kategori);
			$query->execute();
			if($query){ 
				$pesan = 'Selamat, Data Berhasil Di simpan';
			}
		
	}else if($_GET['aksi']=='hapus') {
		if(isset($_GET['id_hb'])){
			$id_b=$_GET['id_hb'];
			$query = $pdo->prepare('DELETE FROM post_news WHERE link_id=?');
			$query->bindValue(1, $id_b);
			$query->execute();
			
			$query2 = $pdo->prepare('DELETE FROM category_meta WHERE link_id=?');
			$query2->bindValue(1, $id_b);
			$query2->execute();
			
			$query3 = $pdo->prepare('DELETE FROM media WHERE link_id=?');
			$query3->bindValue(1, $id_b);
			$query3->execute();
			if($query && $query2 && $query3){ ?><script language="javascript">document.location="beranda.php?page=berita&menu&aksi=lihat";</script>
			<?php $nama_file="../images/".$df;unlink($nama_file);echo "Data sudah di hapus!";}}
	}
	else if($_GET['aksi']=='hapus_kategori') {
		if(isset($_GET['id_hb'])){$id_b=$_GET['id_hb'];
			$query = $pdo->prepare('DELETE FROM category WHERE category_id=?');
			$query->bindValue(1, $id_b);
			$query->execute();
			if($query){ ?>
				<script language="javascript">
					document.location="beranda.php?page=berita&menu&aksi=kategori&tambah";
                </script>
			<?php }
		}
	}
?>