<?php $kategori_berita = $dA->kategori_page_all(); include('core/info_core.php');
if(isset($_GET['menu'])){
		echo '<div class="content-menu">
					<a href="beranda.php?page=info&menu&aksi=tambah">
						<div class="tombol-aksi-top-b">
							Add Info <img src="../asset/img/news.png">
						</div>
					</a>
					<a href="beranda.php?page=info&menu&aksi=lihat">
						<div class="tombol-aksi-top-b">
							View <img src="../asset/img/lihat.png">
						</div>
					</a>
					<a href="beranda.php?page=info&menu&aksi=kategori&tambah">
						<div class="tombol-aksi-top-b">
							Category Info <img src="../asset/img/kategoriputih.png">
						</div>
					</a>
			</div>
			';
	}
if ($_GET['aksi']== 'tambah'){ ?>
	<div class="content-kanan">
		<?php if (isset($pesan)) {?>
        	<div class="pesan-error">
				<?php echo $pesan; ?><a href="beranda.php?page=info&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2">
				<?php echo $pesan2; ?><a href="beranda.php?page=info&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php } ?>
		<div class="h_p">Info > Write</div>
		<form action="beranda.php?page=info&menu&aksi=tambah" method="post" enctype="multipart/form-data">
		<div class="content-kanan-des"> 
            <input type="text" name="judul" placeholder="judul" class="form-judul">
            <p></p>
            <textarea name="isi" class="tinyMCE">
            </textarea>
		</div>
		<div class="content-kanan-side">
			<div class="head-side">
    			Publish
   		 	</div>
    		<div class="content-kanan-side-isi">
                <input type="submit" value="Save" name="simpan" class="tombol-simpan"  > 
				<input type="submit" value="Publish" name="publish" class="tombol-publish"  >        
			</div>
            <div class="head-side">
    			Menu Category Info
   		 	</div>
    		<div class="content-kanan-side-isi">
                <?php foreach($kategori_berita as $kb){ ?>
                	<div class="check-button"><input type="radio" name="kategori" value="<?php echo $kb['page_cat_id'];?>" /> <?php echo $kb['page_cat_title'].' <br>'; ?></div>
                <?php } ?>      
			</div>
		</div>
		</form>
</div>
<?php 

}else if($_GET['aksi']=='lihat') { ?>
	<div class="content-kanan">
		<div class="h_p">Info > All</div>
        	<form>
            <table class="lebar-table1">
                <tr class="tbl thl">
                     <td><input type="checkbox" name="all" /></td>
                     <td width="60%">Title</td>
                     <td width="20%">Category</td>
                     <td width="20%">Status</td>
                </tr>
                <?php $info = $dA->info(); foreach($info as $sd){ ?>
                <tr>
    				<td class="tbl">
                    	<input type="checkbox" name="select<?php echo $no; ?>" />
                    </td>
                    <td>
                    <a target="_blank" href="http://editor.id/info-<?php echo $sd['page_cat_title']; ?>">
					<?php echo $sd['page_title']; ?>
                    </a>
                    	<p><a href="beranda.php?page=info&menu&aksi=edit&id_eb=<?php echo $sd ['page_id'];?>">Edit</a> | <a href="beranda.php?page=info&menu&aksi=hapus&id_hb=<?php echo $sd ['page_id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a> | <a target="_blank" href="http://editor.id/inside-<?php echo $sd['page_cat_url']; ?>">View</a></p>
                    </td>
                    <td>
                    	<?php echo $sd['page_cat_title']; ?>
                    </td>
              
                    <td>
                    	<?php echo $sd['status']; ?>
                    </td>
                  <?php } ?>
                </tr>
       	</table>
        </form>
	</div>
<?php 
} else if($_GET['aksi']=='edit') { ?>
	<div class="content-kanan">
		<?php if (isset($pesan)) {?>
        	<div class="pesan-error"><?php echo $pesan; ?><a href="beranda.php?page=info&menu&aksi=edit"><div class="tnd">x</div></a></div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2"><?php echo $pesan2; ?><a href="beranda.php?page=info&menu&aksi=edit"><div class="tnd">x</div></a></div>
        <?php } ?>
		<div class="h_p">Info > Edit</div>
		<?php if(isset($_GET['id_eb'])){$id_b = $_GET['id_eb'];$data = $dA->detail_info($id_b);?>
		<form action="beranda.php?page=info&menu&aksi=edit" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_berita" value="<?php echo $data['page_id'];?>" />
			<div class="content-kanan-des">
           
				<input type="text" name="judul" class="form-judul" value="<?php echo $data['page_title']; ?>">
				<p></p>
				<textarea name="isi" class="tinyMCE">
 				<?php echo $data['page_description']; ?>
				</textarea>
			</div>
	<div class="content-kanan-side">
    <div class="head-side">
    	Publish
    </div>
    <div class="content-kanan-side-isi">
        <input type="submit" value="Save" name="edit_simpan" class="tombol-simpan"  >
        <input type="submit" value="Publish" name="edit_sub" class="tombol-publish"  >
    </div>
     <div class="head-side">
    			Change Category Info
   		 	</div>
    		<div class="content-kanan-side-isi">
                <?php foreach($kategori_berita as $kb){ ?> 
					<?php if($kb['page_cat_id']== $data['page_category']) { ?>
                        <div class="check-button">
                        	<input type="radio" name="kategori" checked="checked" value="<?php echo $kb['page_cat_id'];?>" /> 
							<?php echo $kb['page_cat_title'].' <br>'; ?>
                            </div>
                    <?php }else{ ?>
                		<div class="check-button">
                    	<input type="radio" name="kategori" value="<?php echo $kb['page_cat_id'];?>" /> 
						<?php echo $kb['page_cat_title'].' <br>'; ?>
                        </div>
                	<?php } ?>
                <?php } ?>      
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
        	<div class="pesan-error"><?php echo $pesan; ?><a href="beranda.php?page=info&menu&aksi=kategori&tambah"><div class="tnd">x</div></a></div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2"><?php echo $pesan2; ?><a href="beranda.php?page=info&menu&aksi=kategori&tambah"><div class="tnd">x</div></a></div>
        <?php } ?>
		<div class="h_p">Info Category</div>
        <div class="content-kanan-des-galery">
        	<?php if (isset($_GET['tambah'])){?>
                <div class="kategori-content">
                    <form action="beranda.php?page=info&menu&aksi=kategori&tambah" method="post">
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
                                	<input type="submit" name="save_kategori" value="Publish" /> 
                                </td>
                            </tr>   
                        </table>
                    </form>
                </div>
            <?php }else if(isset($_GET['edit'])){ $id_kb = $_GET['edit']; $kbd = $dA->kategori_page_detail($id_kb); ?>
            	 <div class="kategori-content">
                    <form action="beranda.php?page=info&menu&aksi=kategori&edit" method="post">
                        <table>
                        	<tr>
                            	<td>
                           			<label>Title : </label>
                                </td>
                                <td>
                                	 <input type="text" name="judul_kategori" class="form-kategori" value="<?php echo $kbd['page_cat_title']; ?>" />
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                	<input type="submit" name="update_kategori" value="Update" /> 
                                    <input type="hidden" name="id_kategori" value="<?php echo $kbd['page_cat_id']; ?>" />
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
                    </tr>
                    <?php $no = 1;$kategori_berita_all = $dA->kategori_page_all(); foreach($kategori_berita_all as $k_bs){ ?>
                	<tr>
                    	<td><?php echo $no; ?></td>
                    	<td>
						<?php echo $k_bs['page_cat_title']; ?><p>
                        <a href="beranda.php?page=info&menu&aksi=kategori&edit=<?php echo $k_bs['page_cat_id']; ?>">Edit</a> | <a href="beranda.php?page=info&menu&aksi=hapus_kategori&id_hb=<?php echo $k_bs['page_cat_id']; ?>">Delete</a></p>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                </table>
            </div>
        </div>
    </div>
<?php } ?>