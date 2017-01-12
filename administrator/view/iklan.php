<?php $kategori_berita = $dA->kategori_berita(); include('core/iklan_core.php');
if(isset($_GET['menu'])){
		echo '<div class="content-menu">
					<a href="beranda.php?page=iklan&menu&aksi=tambah">
						<div class="tombol-aksi-top-b">
							Add Advertise<img src="../asset/img/news.png">
						</div>
					</a>
					<a href="beranda.php?page=iklan&menu&aksi=lihat">
						<div class="tombol-aksi-top-b">
							View<img src="../asset/img/lihat.png">
						</div>
					</a>
					
			</div>
			';
	}
if ($_GET['aksi']== 'tambah'){ ?>
	<div class="content-kanan">
		<?php if (isset($pesan)) {?>
        	<div class="pesan-error">
				<?php echo $pesan; ?><a href="beranda.php?page=iklan&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2">
				<?php echo $pesan2; ?><a href="beranda.php?page=iklan&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php } ?>
		<div class="h_p">Advertise > Add</div>
		<form action="beranda.php?page=iklan&menu&aksi=tambah" method="post" enctype="multipart/form-data">
		<div class="content-kanan-des">
            <input type="text" name="ad_title" placeholder="judul" class="form-judul">
            <p></p>
             <input type="text" name="ad_link" placeholder="Link Advertise" class="form-judul">
		</div>
		<div class="content-kanan-side">
			<div class="head-side">
    			Image Advertise
   		 	</div>
    		<div class="content-kanan-side-isi">
            	<input type="file" name="ad_temp" class="pilih-gambar" />   
                <label class="alert">(*) Maksimal 500kb</label>    
			</div>
            <div class="head-side">
    			Position Advertise
   		 	</div>
    		<div class="content-kanan-side-isi">
            	<input type="checkbox" name="position1" value="headers">Header (650px x 130px)<br/> 
            	<input type="checkbox" name="position2" value="side_right">Side Right (320px x 320px)<br/>   
                <input type="checkbox" name="position3" value="side_midle">Side Midle (300px x 300px)<br/>  
                <input type="checkbox" name="position4" value="detail_news">Detail News (100px x 350px)<br/>       
			</div>
            <div class="head-side">
    			Publish
   		 	</div>
    		<div class="content-kanan-side-isi">
				<input type="submit" value="publish" name="publish" class="tombol-publish"  >        
			</div>
		</div>
		</form>
</div>
<?php 

}else if($_GET['aksi']=='lihat') { ?>
	<div class="content-kanan">
		<div class="h_p">Advertise > All</div>
        	<form>
            <table class="lebar-table1">
                <tr class="tbl thl">
                     <td><input type="checkbox" name="all" /></td>
                     <td width="50%">Title</td>
                     <td width="10%">Advertise</td>
                </tr>
                    <?php
                        if (isset($_GET["pag"])) { $pag  = $_GET["pag"]; } else { $pag=1; };$no = 1;
                        $start_from = ($pag-1) * 15; 		
                        $query = $pdo->prepare("SELECT * FROM advertise ORDER BY ad_id DESC LIMIT $start_from, 15");
                        $query->execute();
                        for($i=0; $sd = $query->fetch(); $i++){?>
                <tr>
    				<td class="tbl"><input type="checkbox" name="select<?php echo $no; ?>" /></td>
                    <td><a target="_blank" href="http://editor.id/beranda.php?page=allberita&detail_berita=<?php echo $sd['ad_id']; ?>"><?php echo $sd['ad_title']; ?></a>
                    	<p><a href="beranda.php?page=iklan&menu&aksi=edit&id_eb=<?php echo $sd ['ad_id'];?>">Edit</a> | <a href="beranda.php?page=iklan&menu&aksi=hapus&id_hb=<?php echo $sd ['ad_id'];?>">Hapus</a></p>
                    </td>
                    <td><div class="box"><img src="../advertise/<?php echo $sd['ad_temp']; ?>" class="img" /></div></td>
                </tr><?php $no++; } ?> 
                <tr>
                	<td colspan="3" class="pagination">
   					 <?php 
						$query = $pdo->prepare("SELECT COUNT(ad_id) FROM advertise");
						$query->execute(); $sd = $query->fetch(); $total_records = $sd[0]; $total_pages = ceil($total_records / 15); 
						for ($i=1; $i<=$total_pages; $i++) { 
							echo "<a href='beranda.php?page=iklan&menu&aksi=lihat&pag=".$i."'";
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
        	<div class="pesan-error"><?php echo $pesan; ?><a href="beranda.php?page=iklan&menu&aksi=edit"><div class="tnd">x</div></a></div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2"><?php echo $pesan2; ?><a href="beranda.php?page=iklan&menu&aksi=edit"><div class="tnd">x</div></a></div>
        <?php } ?>
		<div class="h_p">Advertise > Edit</div>
		<?php if(isset($_GET['id_eb'])){$ad_id = $_GET['id_eb'];$data = $dA->detail_advertise($ad_id);?>
		<form action="beranda.php?page=iklan&menu&aksi=edit" method="post" enctype="multipart/form-data">
			<div class="content-kanan-des">
				<input type="text" name="judul" class="form-judul" value="<?php echo $data['ad_title']; ?>">
				<p></p>
				 <input type="text" name="ad_link" placeholder="Link Advertise" value="<?php  echo $data['ad_link']; ?>" class="form-judul">
			</div>
	<div class="content-kanan-side">
	<div class="head-side">
    	Publish
    </div>
    <div class="content-kanan-side-isi">
        <input type="submit" value="Update" name="edit_sub" class="tombol-simpan"  >
    </div>
    <div class="head-side">
    	Image
    </div>
	<div class="content-kanan-side-isi">
		<div class="head-gambar">Gambar Sekarang</div>
			<img src="../advertise/<?php echo $data['ad_temp'];?>" class="gambar-side">
		<div class="head-gambar">Ganti Gambar</div>
			<input type="file" name="gambar" class="pilih-gambar">
			<input type="hidden" name="gambar_lama" value="<?php echo $data['ad_temp']; ?>" />
			<input type="hidden" name="id_berita" value="<?php echo $data['ad_id'];?>" />
			<label class="alert">(*)Gambar Minimal 1024px x 600px dan Maksimal 1MB</label>
	</div>
	</div>
</form>
 <?php 
}
?>
</div>
<?php } ?>