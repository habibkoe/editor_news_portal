   <script src="asset/js/jssor.slider.min.js" type="text/javascript"></script>	
  <script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
                $Loop: 1,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 5, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $Loop: 2,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                    $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 4,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 4,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 0,                            //[Optional] The offset position to park thumbnail
                    $Orientation: 2,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                             //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    var sliderWidth = parentWidth;

                    //keep the slider width no more than 810
                    sliderWidth = Math.min(sliderWidth, 790);

                    jssor_slider1.$ScaleWidth(sliderWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
 <!--main Container-->
    	<div class="col-lg-12 col-ms-12 col-sm-12 col-xs-12">            
            <!--Right Main Area-->
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 margin-top">
            		 <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    					<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 790px; height: 320px; background: #000; overflow: hidden; ">
                            <!-- Loading Screen -->
                            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                    background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                                </div>
                                <div style="position: absolute; display: block; background: url(asset/img/loading.gif) no-repeat center center;
                                    top: 0px; left: 0px;width: 100%;height:100%;">
                                </div>
                            </div>
                            <!-- Slides Container -->
                            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 570px; height: 320px;
                                overflow: hidden;">
                                <?php $heading_news = $qM->heading_news_bb(); foreach($heading_news as $hn){ ?>
                                <div>
                                	<?php if($hn['category_id']==37){ ?>
                                    <a href="foto-<?php echo $hn['post_url']; ?>">
                                    <?php }else{ ?>
                                    <a href="baca-<?php echo $hn['post_url']; ?>">
                                    <?php } ?>
                                    <img u="image" src="images/<?php echo $hn['media_temp']; ?>" title="<?php echo $hn['post_title']; ?>" />
                                    <span class="heading-beranda"><?php echo $hn['post_title']; ?></span>
                                    </a>
                                    <div u="thumb">
                                       	<?php if($hn['category_id']==37){ ?>
                                        <a href="foto-<?php echo $hn['post_url']; ?>">
                                        <?php }else{ ?>
                                        <a href="baca-<?php echo $hn['post_url']; ?>">
                                        <?php } ?>
                                        <img class="i" src="images/<?php echo $hn['media_temp'];?>" width="70" height="50" /><div class="t"><?php $tl = $hn['post_title']; $isilimit = substr($tl,0,40); echo  $isilimit.'...';  ?></div>
                                        <div class="c">More +</div></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            
                            <!--#region ThumbnailNavigator Skin Begin -->
                            <div u="thumbnavigator" class="jssort11" style="left: 570px; top:0px;">
                                <!-- Thumbnail Item Skin Begin -->
                                <div u="slides" style="cursor: default;">
                                    <div u="prototype" class="p" style="top: 0; left: 0;">
                                        <div u="thumbnailtemplate" class="tp"></div>
                                    </div>
                                </div>
                                <!-- Thumbnail Item Skin End -->
                            </div>
                            <!--#endregion ThumbnailNavigator Skin End -->
                        </div>
    <!-- Jssor Slider End -->
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 bg-white margin-top margin-rigth padding-zero">
                	<div class="title-merah">
                    	Terkini <a href="indexz"><div class="index-bottom">Index +</div></a>
                    </div>
                    <?php $berita_utama = $qM->berita_utama_bb(); foreach($berita_utama as $bu){ ?>
                    <div class="col-lg-4 col-xs-12 margin-bottom min-height">
                    	<?php if($bu['category_id']==37){ ?>
                              <a href="foto-<?php echo $bu['post_url']; ?>">
                        <?php }else{ ?>
                              <a href="baca-<?php echo $bu['post_url']; ?>">
                        <?php } ?>
                    	<div class="box-beranda1">
                    		<img src="images/<?php echo $bu['media_temp']; ?>" class="img-beranda" /> 
                        </div>
                        <div class="box-beranda2">
                        	<div class="tggl-news"><?php echo date('D j M Y G:i', strtotime($bu['created_date'])).' WIB'; ?></div>
                        	<?php $tl = $bu['post_title']; $isilimit = substr($tl,0,50); echo  $isilimit.'...'; ?>
                        </div>
                        </a>
                    </div>
                    <?php } ?>
               	</div>
                
                <div class="width-col-4 width-col-sm-4 col-xs-12 bg-white margin-top padding-zero">
                	<div class="title-orange">
                        FORUM PEMBACA
                    </div>
                    	<?php $bt = $qM->berita_terkomentari(); foreach($bt as $bt){  ?>
                        
                        <a href="baca-<?php echo $bt['post_url']; ?>">
                           <div class="st"><?php echo $bt['post_title'];?></div>
                           <?= $bt['counter_comment'].' komentar'; ?> 
                       </a>
                        <div class="hr"></div>
                        <?php } ?>
                        
                        <?php $sma = $qM->side_midle_advertise(); foreach($sma as $ha){ ?>
            				<a href="<?php echo $ha['ad_link']; ?>"><img src="advertise/<?php echo $ha['ad_temp'];?>" class="iklan-img" /></a>
                		<?php } ?>
                </div>
            </div> 
            <!--End Right Main Area-->
            
            <!--Side Top Right-->
            <div class="col-lg-3 col-sm-3 col-xs-12 bg-dark margin-top padding-zero">
            	<div class="title-orange">
                	EDITOR TV
                </div>
                <div class="box color-white">
                	<?php $tv = $qM->tv(); foreach($tv as $tv){ ?>
                	<box-in>
                    <?php echo $tv['tv_link'];$jdl = strtolower($tv['tv_title']);$isilimit = substr($jdl,0,50); echo  $isilimit.'...'; ?>
                    </box-in>
                    <?php } ?>
                </div>
            </div>
            <!--End Side Top Right-->
            
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
            
              <!--Side Bottom Right-->
            <div class="col-lg-3 col-sm-3 col-xs-12 bg-white margin-top padding-zero">
            	<div class="title-orange">
                	NEWS PHOTOGRAPHY
                </div>
                	<?php $berita_poto = $qM->berita_photography(); foreach($berita_poto as $bp){ ?>
                        	<a href="foto-<?php echo $bp['post_url']; ?>">
                            	<div class="box-photo">
                                    <img src="images/<?php echo $bp['media_temp']; ?>" />
                                    <span class="judul"><?= $bp['post_title'];  ?></span>
                                </div>
                   			</a>
                    <?php } ?>
            </div>
            
            <div class="col-lg-3 col-sm-3 col-xs-12 bg-white margin-top padding-zero iklan">
            <?php $sra = $qM->side_right_advertise(); foreach($sra as $ha){ ?>
            	<a href="<?php echo $ha['ad_link']; ?>"><img src="advertise/<?php echo $ha['ad_temp'];?>" class="iklan-img" /></a>
                <?php } ?>  
            </div>
            <!--End Side Bottom Right-->

             <div class="col-lg-12 col-sm-12 col-xs-12 bg-white margin-top margin-rigth">
            </div>
        </div>