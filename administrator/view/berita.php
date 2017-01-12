<?php $kategori_berita = $dA->kategori_berita_all(); include('core/berita_core.php');
if(isset($_GET['menu'])){
		echo '<div class="content-menu">
					<a href="beranda.php?page=berita&menu&aksi=tambah">
						<div class="tombol-aksi-top-b">
							Add News <img src="../asset/img/news.png">
						</div>
					</a>
					<a href="beranda.php?page=berita&menu&aksi=lihat">
						<div class="tombol-aksi-top-b">
							View <img src="../asset/img/lihat.png">
						</div>
					</a>
					<a href="beranda.php?page=berita&menu&aksi=kategori&tambah">
						<div class="tombol-aksi-top-b">
							Menu Category <img src="../asset/img/kategoriputih.png">
						</div>
					</a>
			</div>
			';
	}
if ($_GET['aksi']== 'tambah'){ ?>
	<div class="content-kanan">
		<?php if (isset($pesan)) {?>
        	<div class="pesan-error">
				<?php echo $pesan; ?><a href="beranda.php?page=berita&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2">
				<?php echo $pesan2; ?><a href="beranda.php?page=berita&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php } ?>
		<div class="h_p">News > Write</div>
		<form action="beranda.php?page=berita&menu&aksi=tambah" method="post" enctype="multipart/form-data">
		<div class="content-kanan-des">
            <input type="hidden" name="penulis_admin" value="<?php echo $_SESSION['author_id'];?>" /> 
            <input type="hidden" name="link_id" value="<?php $waktu = time(); $link = $waktu + 1; echo $link;?>" /> 
            <input type="text" name="judul" placeholder="judul" class="form-judul">
            <p></p>
            <textarea name="isi" class="tinyMCE"></textarea>
            <input type="hidden" name="gambar_kosong" value="default.jpg" />
		</div>
		<div class="content-kanan-side">
        	<div class="head-side">
    			Image
    		</div>
            <div class="content-kanan-side-isi">
                <label> Main Image </label>
            	<input type="file" name="gambar" class="pilih-gambar">
        		<label class="alert">(*)Gambar Minimal 660px x 340px dan Maksimal 500kb</label>
    		</div>
			<div class="head-side">
    			Publish
   		 	</div>
    		<div class="content-kanan-side-isi">
                <input type="submit" value="Save" name="simpan" class="tombol-simpan"  > 
				<input type="submit" value="Publish" name="publish" class="tombol-publish"  >        
			</div>
            <div class="head-side">
    			Menu Category News
   		 	</div>
    		<div class="content-kanan-side-isi">
                <?php foreach($kategori_berita as $kb){ ?>
                	<div class="check-button"><input type="checkbox" name="kategori[]" value="<?php echo $kb['category_id'];?>" /> <?php echo $kb['category_name'].' <br>'; ?></div>
                <?php } ?>      
			</div>
		</div>
		</form>
</div>
<?php 

}else if($_GET['aksi']=='lihat') { ?>
	<div class="content-kanan">
		<div class="h_p">News > All</div>
        	<form>
            <table class="lebar-table1">
                <tr class="tbl thl">
                     <td><input type="checkbox" name="all" /></td>
                     <td width="50%">Title</td>
                     <td width="10%">Category</td>
                     <td width="10%">Author</td>
                     <td width="10%">Image</td> 
                     <td width="20%">Post Date</td>
                </tr>
                    <?php
                        if (isset($_GET["pag"])) { $pag  = $_GET["pag"]; } else { $pag=1; };$no = 1;
                        $start_from = ($pag-1) * 30; 		
                        $query = $pdo->prepare("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id
                        GROUP BY pnc.post_id DESC LIMIT $start_from, 30");
                        $query->execute();
                        for($i=0; $sd = $query->fetch(); $i++){?>
                <tr>
    				<td class="tbl"><input type="checkbox" name="select<?php echo $no; ?>" /></td>
                    <td><a target="_blank" href="http://editor.id/baca-<?php echo $sd['post_url']; ?>"><?php echo $sd['post_title']; ?></a>
                    	<p><a href="beranda.php?page=berita&menu&aksi=edit&id_eb=<?php echo $sd ['post_id'];?>">Edit</a> | <a href="beranda.php?page=berita&menu&aksi=hapus&id_hb=<?php echo $sd ['link_id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a> | <a target="_blank" href="http://editor.id/baca-<?php echo $sd['post_url']; ?>">View</a></p>
                    </td>
                    <td><?php echo $sd['category_name']; ?></td>
                    <td style="color:#03C;"><?php echo $sd['username']; ?></td>
                    <td class="rata-tengah"><img src="../images/<?php echo $sd['media_temp']; ?>" width="70" height="40" /></td> 
                    <td class="rata-tengah"><?php echo date(" j F Y, g:i a ", strtotime($sd["created_date"])); ?></td>
                </tr><?php $no++; } ?> 
                <tr>
                	<td colspan="6" class="pagination">
   					 <?php 
						$query = $pdo->prepare("SELECT COUNT(post_id) FROM post_news");
						$query->execute(); $sd = $query->fetch(); $total_records = $sd[0]; $total_pages = ceil($total_records / 30); 
						for ($i=1; $i<=$total_pages; $i++) { 
							echo "<a href='beranda.php?page=berita&menu&aksi=lihat&pag=".$i."'";
							if($pag==$i){echo "id=active";}
							echo ">";echo "".$i."</a> "; }; ?> 
                    </td>
                </tr>
       	</table>
        </form>
	</div>
<?php 
} else if($_GET['aksi']=='edit') { ?>
	<div class="content-kanan">
		<?php if (isset($pesan)) {?>
        	<div class="pesan-error"><?php echo $pesan; ?><a href="beranda.php?page=berita&menu&aksi=edit"><div class="tnd">x</div></a></div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2"><?php echo $pesan2; ?><a href="beranda.php?page=berita&menu&aksi=edit"><div class="tnd">x</div></a></div>
        <?php } ?>
		<div class="h_p">News > Edit</div>
		<?php if(isset($_GET['id_eb'])){$id_b = $_GET['id_eb'];$data = $dA->detail_berita($id_b);?>
		<form action="beranda.php?page=berita&menu&aksi=edit" method="post" enctype="multipart/form-data">
			<div class="content-kanan-des">
            <?php $id_l = $data['link_id'];
				  $category_now = $dA->kategori_update($id_l);
				  echo 'Recent Category : ';
				  foreach($category_now as $cn){
				  	echo $cn['category_name'].', ';
				  }
				  echo '<br><br>';
			 ?>
				<input type="text" name="judul" class="form-judul" value="<?php echo $data['post_title']; ?>">
                <input type="hidden" name="link_id" value="<?php echo $data['link_id']; ?>">
                <input type="hidden" name="penulis_admin" value="<?php echo $data['author_id']; ?>">
                <input type="hidden" name="date" value="<?php echo date('Ymd'); ?>">
				<p></p>
				<textarea name="isi" class="tinyMCE"><?php echo $data['post_description']; ?></textarea>
			</div>
	<div class="content-kanan-side">
        <div class="head-side">
            Image
        </div>
        <div class="content-kanan-side-isi">
            <div class="head-gambar">Image Now</div>
                <img src="../images/<?php echo $data['media_temp'];?>" class="gambar-side">
            <div class="head-gambar">Change</div>
                <input type="file" name="gambar" class="pilih-gambar">
                <input type="hidden" name="gambar_lama" value="<?php echo $data['media_temp']; ?>" />
                <input type="hidden" name="id_berita" value="<?php echo $data['post_id'];?>" />
                <label class="alert">(*)Gambar Minimal 660px x 340px dan Maksimal 500KB</label>
        </div>
        <div class="head-side">
            Publish
        </div>
        <div class="content-kanan-side-isi">
            <input type="submit" value="Save" name="simpan_edit" class="tombol-simpan"  >
            <input type="submit" value="Publish" name="edit_sub" class="tombol-publish"  >
        </div>
	</div>
</form>
 <?php 
}
?>
</div>
<?php } else if($_GET['aksi']=='kategori') { ?>
	<div class="content-kanan">
		<?php if (isset($pesan)) {?>
        	<div class="pesan-error"><?php echo $pesan; ?><a href="beranda.php?page=berita&menu&aksi=kategori&tambah"><div class="tnd">x</div></a></div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2"><?php echo $pesan2; ?><a href="beranda.php?page=berita&menu&aksi=kategori&tambah"><div class="tnd">x</div></a></div>
        <?php } ?>
		<div class="h_p">Post Category</div>
        <div class="content-kanan-des-galery">
        	<?php if (isset($_GET['tambah'])){?>
                <div class="kategori-content">
                    <form action="beranda.php?page=berita&menu&aksi=kategori&tambah" method="post">
                    	<table>
                        	<tr>
                            	<td>
                           			<label>Title : </label>
                                </td>
                                <td>
                                	 <input type="text" name="judul_kategori" class="form-kategori" />
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                	<label>Description : </label>
                                </td>
                            	<td>
                                	<input type="text" name="inisial_kategori" class="form-kategori" />
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                	<input type="submit" name="save_kategori" value="Publish" /> 
                                </td>
                            </tr>   
                        </table>
                    </form>
                </div>
            <?php }else if(isset($_GET['edit'])){ $id_kb = $_GET['edit']; $kbd = $dA->kategori_berita_detail($id_kb); ?>
            	 <div class="kategori-content">
                    <form action="beranda.php?page=berita&menu&aksi=kategori&edit" method="post">
                        <table>
                        	<tr>
                            	<td>
                           			<label>Title : </label>
                                </td>
                                <td>
                                	 <input type="text" name="judul_kategori" class="form-kategori" value="<?php echo $kbd['category_name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                	<label>Description : </label>
                                </td>
                            	<td>
                                	<input type="text" name="inisial_kategori" class="form-kategori" value="<?php echo $kbd['category_description']; ?>" />
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                	<input type="submit" name="update_kategori" value="Update" /> 
                                    <input type="hidden" name="id_kategori" value="<?php echo $kbd['category_id']; ?>" />
                                </td>
                            </tr>   
                        </table> 
                    </form>
                </div>
            <?php } ?>
            <div class="kategori-detail-content">
            	<table class="lebar-table1" border="1">
                	<tr class="tbl thl">
                    	<td>No</td>
                    	<td>Title</td>
                        <td>Description</td>
                    </tr>
                    <?php $no = 1;$kategori_berita_all = $dA->kategori_berita_all(); foreach($kategori_berita_all as $k_bs){ ?>
                	<tr>
                    	<td><?php echo $no; ?></td>
                    	<td><?php echo $k_bs['category_name']; ?><p>
                        <a href="beranda.php?page=berita&menu&aksi=kategori&edit=<?php echo $k_bs['category_id']; ?>">Edit</a> | <a href="beranda.php?page=berita&menu&aksi=hapus_kategori&id_hb=<?php echo $k_bs['category_id']; ?>">Delete</a></p></td><td><?php echo $k_bs['category_description']; ?></td>
                    </tr>
                    <?php $no++; } ?>
                </table>
            </div>
        </div>
    </div>
<?php } ?>