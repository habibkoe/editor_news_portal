<?php $kategori_berita = $dA->kategori_berita(); include('core/tv_core.php');
if(isset($_GET['menu'])){
		echo '<div class="content-menu">
					<a href="beranda.php?page=tv&menu&aksi=tambah">
						<div class="tombol-aksi-top-b">
							Add Video<img src="../asset/img/news.png">
						</div>
					</a>
					<a href="beranda.php?page=tv&menu&aksi=lihat">
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
				<?php echo $pesan; ?><a href="beranda.php?page=tv&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php }else if(isset($pesan2)) { ?>
        	<div class="pesan-error2">
				<?php echo $pesan2; ?><a href="beranda.php?page=tv&menu&aksi=tambah"><div class="tnd">x</div></a>
            </div>
        <?php } ?>
		<div class="h_p">Editor Tv > Add</div>
		<form action="beranda.php?page=tv&menu&aksi=tambah" method="post" enctype="multipart/form-data">
		<div class="content-kanan-des">
            <input type="text" name="tv_title" placeholder="judul" class="form-judul">
            <p></p>
             <input type="text" name="linkembed" placeholder="Link Embed" class="form-judul">
		</div>
		<div class="content-kanan-side">
			<div class="head-side">
    			Publish
   		 	</div>
    		<div class="content-kanan-side-isi">
				<input type="submit" value="Publish" name="publish" class="tombol-publish"  >        
			</div>
		</div>
		</form>
</div>
<?php 

}else if($_GET['aksi']=='lihat') { ?>
	<div class="content-kanan">
		<div class="h_p">Editor Tv > All</div>
        	<form>
            <table class="lebar-table1">
                <tr class="tbl thl">
                     <td><input type="checkbox" name="all" /></td>
                     <td width="50%">Title</td>
                     <td width="10%">video</td>
                     <td width="15%">Date</td>
                </tr>
                    <?php
                        if (isset($_GET["pag"])) { $pag  = $_GET["pag"]; } else { $pag=1; };$no = 1;
                        $start_from = ($pag-1) * 15; 		
                        $query = $pdo->prepare("SELECT * FROM post_tv ORDER BY tv_id DESC LIMIT $start_from, 15");
                        $query->execute();
                        for($i=0; $sd = $query->fetch(); $i++){?>
                <tr>
    				<td class="tbl"><input type="checkbox" name="select<?php echo $no; ?>" /></td>
                    <td><a target="_blank" href="http://localhost/sma2/beranda.php?page=allberita&detail_berita=<?php echo $sd['tv_id']; ?>"><?php echo $sd['tv_title']; ?></a>
                    	<p><a href="beranda.php?page=tv&menu&aksi=edit&id_eb=<?php echo $sd ['tv_id'];?>">Edit</a> | <a href="beranda.php?page=tv&menu&aksi=hapus&id_hb=<?php echo $sd ['tv_id'];?>">Hapus</a></p>
                    </td>
                    <td class="rata-tengah video"><?php echo $sd['tv_link']; ?></td>
                    <td class="rata-tengah"><?php echo date(" j F Y, g:i a ", strtotime($sd["created_date"])); ?></td>
                </tr><?php $no++; } ?> 
                <tr>
                	<td colspan="4" class="pagination">
   					 <?php 
						$query = $pdo->prepare("SELECT COUNT(tv_id) FROM post_tv");
						$query->execute(); $sd = $query->fetch(); $total_records = $sd[0]; $total_pages = ceil($total_records / 15); 
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
		<div class="h_p">Editor Tv > Edit</div>
		<?php if(isset($_GET['id_eb'])){
			$id_tv = $_GET['id_eb'];
			$data = $dA->detail_tv($id_tv);?>
		<form action="beranda.php?page=tv&menu&aksi=edit" method="post" enctype="multipart/form-data">
			<div class="content-kanan-des">
				<input type="text" name="tv_title" class="form-judul" value="<?php echo $data['tv_title']; ?>"/>
                <p>
                	<?php echo $data['tv_link']; ?>
                </p>
			</div>
	<div class="content-kanan-side">
	<div class="head-side">
    	Publish
    </div>
    <div class="content-kanan-side-isi">
        <input type="submit" value="Update" name="update" class="tombol-simpan"  >
    </div>
</form>
 <?php 
}
?>
</div>
<?php } ?>