<?php $comments= $dA->comments(); include('core/pesan_core.php'); ?>
<div class="content-menu">
	<a href="beranda.php?page=comments&menu&aksi=lihat">
		<div class="tombol-aksi-top-b">
			Inbox <img src="../asset/img/lihat.png">
		</div>
	</a>
</div>
<?php if($_GET['aksi']=='lihat') { ?>
    <div class="content-kanan">
        <div class="h_p">Comments</div>
        <form>
            <table class="lebar-table1" width="100%">
                <tr class="tbl thl">
                    <th width="3%"><input type="checkbox" name="all"></th>
                    <th width="20%">Posting</th>
                    <th width="10%">Comentator</th>
                    <th width="68%">Comments</th>
                </tr>
                <?php $no = 1; foreach($comments as $b){ ?>
                <tr>
                    <td class="tbl"><input type="checkbox" name="centong<?php echo $no; ?>" value="<?php echo $b['comment_id']; ?>"></td>
                    <td><a href="http://editor.id/baca-<?php echo $b['post_url']; ?>" target="_blank"><?php echo $b['post_title']; ?></a>
                    </td>
                    <td><?php echo $b['comentator']; ?>
                    </td>
                    <td><?php $isilimit = substr($b['description'],0,350); echo  $isilimit; ?>
                    </td>
                </tr>
                <?php $no++; } ?>
            </table>
        </form>
    </div>
<?php }else if($_GET['aksi']=='detail_pesan') { $id_t = $_GET['id_t']; $detail_tamu = $dA->detail_tamu($id_t);?>
    <div class="content-kanan">
    	<?php if (isset($pesan_error)) {?>
        	<div class="pesan-error"><?php echo $pesan; ?><a href="beranda.php?page=berita&menu&aksi=tambah"><div class="tnd">x</div></a></div>
        <?php }else if(isset($pesan_error2)) { ?>
        	<div class="pesan-error2"><?php echo $pesan2; ?><a href="beranda.php?page=berita&menu&aksi=tambah"><div class="tnd">x</div></a></div>
        <?php } ?>
    	<div class="content-kanan-des-galery">
    
    		<?php echo $detail_tamu['pesan']; ?>
            <hr />
            <form action="beranda.php?page=tamu&menu&aksi=detail_pesan" method="post">
            	<table>
                	<tr>
                    	<td>
            				<input type="email" name="email" value="<?php echo $detail_tamu['email']; ?>" />
                            <input type="hidden" name="nama" value="adminSMA2selong" />
                        </td>    
                    </tr>
                    <tr>
                    	<td>
            				<input type="text" name="judul" placeholder="judul pesan" />
                        </td>    
                    </tr>
                    <tr>
                    	<td>
            				<textarea name="isi_pesan" cols="100" rows="5"></textarea>
                        </td>    
                    </tr>   
                    <tr>
                    	<td>
            				<input type="submit" name="kirim" value="kirim" />
                        </td>    
                    </tr>            
            	</table>
            </form>
        </div>
    </div>
<?php } ?>