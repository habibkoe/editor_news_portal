 <?php if(isset($_GET['baca'])){ 
 	$p_id = $_GET['baca'];
	$d_b = $qM->inside($p_id);
 	 ?>
 <!--main Container-->
    	<div class="col-lg-12 col-sm-12 col-xs-12">            
            <!--left Main Area-->
            <div class="col-lg-9 col-sm-9 col-xs-12">
                <div class="col-lg-12 col-sm-12 col-xs-12 bg-white margin-top margin-rigth padding-zero">
                	<div class="title-merah">
                    	<?php echo $d_b['page_title']; ?>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-zero margin-top">
                    	<?php echo $d_b['page_description']; ?>
                        
                    </div>
                    
                    <!--season baca juga ------------------------------------------------------------------------------>
                    <div class="title-merah">
                    	Baca Juga
                    </div>
                    <?php $berita_utama = $qM->berita_utama_bawah(); foreach($berita_utama as $bu){?>
                    <div class="col-lg-3 col-xs-12">
                    	<a href="baca-<?php echo $bu['post_url'];?>"><img src="images/<?php echo $bu['media_temp']; ?>" class="img-beranda" /> 
                        <?php echo $bu['post_title']; ?></a>
                    </div>
                    <?php } ?>    
                    <!--end season baca juga ------------------------------------------------------------------------------>
                    
                   
                </div>
            </div> 
            <!--End left Main Area------------------------------------------------------------------------------------->
            
             <!--Side Right-------------------------------------------------------------------------------------------->
            <div class="col-lg-3 col-sm-3 col-xs-12 bg-white margin-top padding-zero">
            	<div class="title-orange">
                	POPULER
                </div>
                   <?php $berita_populer = $qM->berita_populer(); foreach($berita_populer as $bp){ ?>
                    <a href="baca-<?php echo $bp['post_url']; ?>"><div class="st"><?= $bp['post_title'];  ?></div>
					<?= 'di baca '.$bp['counter_page'].' kali'; ?></a>
                    <hr />
                    <?php } ?>
            </div>
            <!--End Side Right-->
            
             <!--Side Right-------------------------------------------------------------------------------------------->
            <div class="col-lg-3 col-sm-3 col-xs-12 bg-white margin-top padding-zero">
            	<div class="title-orange">
                	TERKOMENTARI
                </div>
                  <?php $bt = $qM->berita_terkomentari(); foreach($bt as $bt){  ?>
                  <a href="baca-<?php echo $bt['post_url']; ?>"><div class="st"><?php echo $bt['post_title'];?></div>
                  <?= $bt['counter_comment'].' komentar'; ?> </a>
                  <hr />
                  <?php } ?>
            </div>
            <!--End Side Right-->

            
        </div>
<?php } ?>