 <?php if(isset($_GET['baca'])){ include('site/core/pesan-core.php');
 	$url = $_GET['baca'];
	$d_b = $qM->detail_berita($url);
	$post_id = $d_b['post_id'];
	/*--- counter page code ---*/
		$cp = $d_b['counter_page'];
		$cc = $cp+1;
		$query = $pdo->prepare('UPDATE post_news SET counter_page=? WHERE post_url=?');
		$query->bindValue(1, $cc);
		$query->bindValue(2, $url);
		$query->execute();
	/*---- end counter page code ----*/
 	 ?>
 <!--main Container-->
 		<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=178073548932787";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
        </script>
        
    	<div class="col-lg-12 col-sm-12 col-xs-12">            
            <!--left Main Area-->
            <div class="col-lg-9 col-sm-9 col-xs-12">
                <div class="col-lg-12 col-sm-12 col-xs-12 bg-white margin-top margin-rigth padding-zero">
                	<div class="title-merah">
                    	<?php echo $d_b['post_title']; ?>
                    </div>
                    <div class="category-berita">
                    	<box><?php echo $d_b['category_name']; ?></box><box-right><img src="asset/img/events.png" width="15" height="15"> <?php echo date('D j M Y G:i', strtotime($d_b['created_date'])).' WIB'; ?> | <img src="asset/img/user25.png" width="10" height="15"> <?php echo $d_b['author_name']; ?></box-right>
                    </div>
                    <div class="tomb-top">
                    	<box2><a href="https://twitter.com/share" class="twitter-share-button" data-via="editornews_id">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></box2><box2><div class="fb-share-button" data-href="http://editor.id/baca-<?php echo $url; ?>" data-layout="button_count"></div></box2><box><?php echo '<img src="asset/img/read.png" width="15" height="15"> '.$d_b['counter_page'].' read'; ?></box>
                    </div>
                    	<img src="images/<?php echo $d_b['media_temp']; ?>" width="100%" height="100%" /> 
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding-zero margin-top">
                    	 <?php $dna = $qM->detail_news_advertise(); foreach($dna as $ha){ ?>
            				<a href="<?php echo $ha['ad_link']; ?>"><img src="advertise/<?php echo $ha['ad_temp'];?>" class="iklan-img" /></a>
                		<?php } ?>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 padding-left margin-top">
                    	<?php echo $d_b['post_description']; ?>
                        
                    </div>
                    
                    <!--season baca juga ------------------------------------------------------------------------------>
                    <div class="title-merah">
                    	Baca Juga
                    </div>
                    <?php $berita_utama = $qM->berita_utama_bawah(); foreach($berita_utama as $bu){?>
                    <div class="col-lg-3 col-xs-12">
                    	<a href="baca-<?php echo $bu['post_url'];?>"><img src="images/<?php echo $bu['media_temp']; ?>" class="img-detail-bot" /> 
                        <?php echo $bu['post_title']; ?></a>
                    </div>
                    <?php } ?>    
                    <!--end season baca juga ------------------------------------------------------------------------------>
                    
                    <!--form komentar ------------------------------------------------------------------------------>
                    
                    	<table class="comment">
                        	<form action="baca-<?php echo $d_b['post_url'] ?>" method="post">
                                <tr class="bg-dark">
                                    <td>
                                       <div class="commentar-title"> KOMENTAR </div>
                                    </td>
                                </tr>	
                                <tr>
                                    <td>
                                        <input type="text" name="nama" class="form-comment" required="required" placeholder="Nama"/>
                                    </td>
                                </tr>
								<?php if(isset($pesan2)){ ?>
                                	<tr><div class="pesan-error"><?php echo $pesan2; ?></div></tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <textarea name="komentar" class="form-textarea" placeholder="Komentar"></textarea>
                                    </td>
                                </tr>
                                <tr class="bg-dark">
                                    <td>
                                    	<input type="hidden" name="counter_comment" value="<?php echo $d_b['counter_comment']; ?>" />
                                    	<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
                                        <input type="submit" name="kirim" value="kirim pesan" class="form-button" />
                                    </td>
                                </tr>
                            </form>
                    	</table>
                    
                    <!--end form komentar--------------------------------------------------------------------------->
                    
                    <?php 
					$post_id = $d_b['post_id'];
					$comments = $qM->loadcomments($post_id);
						foreach ($comments as $cm){ ?>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom border padding-top-bottom">
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                	<img src="asset/img/comentator.png" class="img-coment" width="100%" />
                                </div>
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                	<div class="user-coment"><?php echo $cm['comentator']; ?></div>
                                    <div class="tgl-coment"><?php echo date('D j M Y G:i', strtotime($cm['created_date'])).' WIB'; ?></div>
									<?php echo $cm['description']; ?>
                                </div>
                            </div>
						<?php	}
					 ?>
                </div>
            </div> 
            <!--End left Main Area------------------------------------------------------------------------------------->
            
             <!--Side Right-------------------------------------------------------------------------------------------->
            <div class="col-lg-3 col-sm-3 col-xs-12 bg-white margin-top padding-zero">
            	<div class="title-orange">
                	POPULER
                </div>
                	<?php $no = 1; $berita_populer = $qM->berita_populer(); foreach($berita_populer as $bp){ ?>
                    <div class="box-side">
                    	<left>
                        	<div class="numb"><?php echo $no; ?></div>
                        </left>
                        
                        <right>
                        	<a href="baca-<?php echo $bp['post_url']; ?>">
                        		<div class="st"><?= $bp['post_title'];  ?></div>
                        		<?= 'di baca '.$bp['counter_page'].' kali'; ?>
                   			</a>
                        </right>
                    
                    </div>
                    <?php $no++; } ?>
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
                  <div class="hr"></div>
                  <?php } ?>
            </div>
            <!--End Side Right-->

            
        </div>
<?php } ?>