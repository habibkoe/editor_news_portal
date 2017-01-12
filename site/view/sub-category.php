 <?php if(isset($_GET['page'])){ 
 $c = $_GET['page'];
 $index_bisnis = $qM->index_sub_category($c); $hib = $qM->head_sub_category($c); ?>
 <!--main Container-->
    	<div class="col-lg-12 col-sm-12 col-xs-12">            
            <!--Right Main Area-->
            <!--heading-->
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 bg-dark margin-top heading-news">
            		<div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
                    	<img src="images/<?php echo $hib['media_temp']; ?>" width="100%" />
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 padding-zero-left">
                    	<a href="baca-<?php echo $hib['post_url']; ?>"><h2><?php echo $hib['post_title']; ?></h2> 
                        <div class="tggl-news-sub"><?php echo date('D j M Y G:i', strtotime($hib['created_date'])).' WIB'; ?></div>
                        </a>
                        <hr />
                        
                    </div>
                     <div class="col-lg-3 padding-zero-left">
                    	<div class="heading"><?php echo $hib['category_name']; ?></div>
                    </div>
                </div>
                <!--end heading-->
                <div class="col-lg-12 col-sm-12 col-xs-12 bg-white margin-top margin-rigth padding-zero">
                	<div class="title-merah">
                    	All News
                    </div>
                    <?php foreach($index_bisnis as $bu){ ?>
                    	<div class="col-lg-12 col-sm-12 col-xs-12 margin-bottom">
                            <a href="baca-<?php echo $bu['post_url']; ?>">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <img src="images/<?php echo $bu['media_temp']; ?>" class="img-sub" /> 
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <div class="title-sub">
                                        <?php echo $bu['post_title']; ?>
                                            <div class="tgl">
                                                <?php echo date('D j M Y G:i', strtotime($bu['created_date'])).' WIB'; ?>
                                            </div> 
                                    </div>
                                </div>
                            </a>
						</div>
                    <?php } ?>
                             
                </div>
            </div> 
            <!--End Right Main Area-->
            
             <!--Side Bottom Right-->
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
            <!--End Side Bottom Right-->

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