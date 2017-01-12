
 <?php
include("../../../config/connect.php");


if(isset($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];
$query=$pdo->prepare("select * from berita where id_berita<? order by id_berita desc limit 4");
$query->bindValue(1, $lastmsg);
$query->execute();
$rm = $query->fetchAll();
foreach($rm as $ib){ ?>
 				<div class="row">
                    <div class="col-lg-12">
                        <div class="index_post">
                            <img src="images/<?php echo $ib['foto']; ?>" width="250" height="170" />
                            <a href="beranda.php?page=allberita&detail_berita=<?php echo $ib['id_berita']; ?>">
                                <div class="judul">
                                    <?php echo $ib['judul']; ?>
                                </div>
                            </a>
                                <div class="deskripsi">
                                    <?php $isilimit = substr($ib['isi_berita'],0,300); echo  $isilimit; ?>
                                    <br />
                                    <a href="beranda.php?page=allberita&detail_berita=<?php echo $ib['id_berita']; ?>" class="redmore">
                                        Selengkapnya
                                    </a>
                                </div>
                         </div>
                     </div>
                </div>
<?php } ?>
<div id="more<?php echo $id_berita; ?>" class="morebox">
<a href="#" id="<?php echo $id_berita; ?>" class="more">more</a>
</div>

<?php
}
?>