 <?php if(isset($_GET['page'])){ 
 $search = $_POST['searchnews'];
 $q = $pdo->prepare ("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id WHERE pn.post_title like ? or pn.post_description like ?) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id GROUP BY pnc.post_id DESC");
		$q->bindValue(1, "%$search%");
		$q->bindValue(2, "%$search%");
		$q->execute();
		$num = $q->rowCount();
		if ($num > 0) { 
			$q = $q->fetchAll(); ?>

 <!--main Container-->
    	<div class="col-lg-12 col-sm-12 col-xs-12">            
            <!--Right Main Area-->
            <!--heading-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white margin-top margin-rigth padding-zero">
                	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="title-merah">
                            SEARCH BERITA
                        </div>
                        <div class="menu-index">
                            <form method="post" action="search">	
                            	<input type="search" name="searchnews" class="form-control" placeholder="Cari Berita...." />
                            </form>
                            <div class="tomb-top">
                                <box2>ditemukan (<?php echo $num; ?>)</box2>
                             </div>
                        </div>
                	</div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 padding-zero-right">
                        <div class="title-merah">
                            All Search
                        </div>
						 		<?php foreach($q as $bu){ ?>
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
                                <?php } 
							}?>   
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