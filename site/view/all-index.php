 <?php if(isset($_GET['page'])){ 
 $index_bisnis = $qM->all_index(); ?>
 <!--main Container-->
    	<div class="col-lg-12 col-sm-12 col-xs-12">            
            <!--Right Main Area-->
            <!--heading-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white margin-top margin-rigth padding-zero">
                	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="title-merah">
                            INDEX
                        </div>
                        <div class="menu-index">
                            <li><a href="news">news</a></li>
                            <li><a href="bisnis">bisnis</a></li>
                            <li><a href="sport">sport</a></li>
                            <li><a href="hukum">hukum</a></li>
                            <li><a href="entertainment">entertainment</a></li>
                            <li><a href="lifestyle">lifestyle</a></li>
                            <li><a href="food">food</a></li>
                            <li><a href="traveling">traveling</a></li>
                            <li><a href="hobi">hobi</a></li>
                            <li><a href="otomotif">otomotif</a></li>
                            <li><a href="agribisnis">agribisnis</a></li>
                        </div>
                	</div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 padding-zero-right">
                        <div class="title-merah">
                            All News
                        </div>
                        <?php
                        if (isset($_GET["pag"])) { $pag  = $_GET["pag"]; } else { $pag=1; };$no = 1;
                        $start_from = ($pag-1) * 30; 		
                        $query = $pdo->prepare("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id
                        GROUP BY pnc.post_id DESC LIMIT $start_from, 30");
                        $query->execute();
                        for($i=0; $bu = $query->fetch(); $i++){?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-top-bottom border-bottom">
                                <a href="baca-<?php echo $bu['post_url']; ?>">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="title-index">
                                            <?php echo $bu['post_title']; ?>
                                                <div class="tgl">
                                                    <?php echo date('D j M Y G:i', strtotime($bu['created_date'])).' WIB'; ?>
                                                </div> 
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>  
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pagination">
                        	 <?php 
								$query = $pdo->prepare("SELECT COUNT(post_id) FROM post_news");
								$query->execute(); 
								$sd = $query->fetch(); 
								$total_records = $sd[0]; 
								$total_pages = ceil($total_records / 30); 
								for ($i=1; $i<=$total_pages; $i++) { 
								echo "<a href='indexz&pag=".$i."'";
								if($pag==$i){echo "id=active";}
								echo ">";echo "".$i."</a> "; }; ?> 
                        </div> 
                </div>
            </div> 
            <!--End Right Main Area-->

			<!--bootom news-->
             <div class="col-lg-12 col-sm-12 col-xs-12 bg-white margin-top margin-rigth">
             	<div class="title-biru"></div>
            	 <?php $berita_sub = $qM->berita_sub_bawah(); foreach($berita_sub as $bs){?>
                    <div class="col-lg-2 col-xs-12">
                    	<a href="baca-<?php echo $bs['post_url']; ?>">
                        <img src="images/<?php echo $bs['media_temp']; ?>" class="img-detail-bot" /> 
                        <?php echo $bs['post_title']; ?></a>
                    </div>
                    <?php } ?> 
                <div class="title-putih"></div>
            <!--end bootoom news-->
            </div>
        </div>
<?php } ?>