<div class="container padding-zero">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-dark footer">
     	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-top">
        	<li><a href="news">News</a></li>
            <li><a href="nasional">Nasional</a></li>
            <li><a href="internasional">Internasional</a></li>
            <li><a href="daerah">Daerah</a></li>
            <li><a href="jabodetabek">Jabodetabek</a></li>
            <li><a href="tokoh-berprestasi">Tokoh Berprestasi</a></li>
            <br />
            <li><a href="food">Food</a></li>
            <li><a href="hangout">Hangout</a></li>
            <li><a href="info-makan-enak">Info Makan Enak</a></li>
            <li><a href="kuliner-mak-nyos">Kuliner Mak Nyos</a></li>
            <br />
            <li><a href="otomotif">Otomotif</a></li>
            <li><a href="agribisnis">Agribisnis</a></li>
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-top">
			<li><a href="bisnis">Bisnis</a></li>
            <li><a href="bursa-saham">Bursa Saham</a></li>
            <li><a href="pasar-uang">Pasar Uang</a></li>
            <li><a href="industri-dan-pertambangan">Industri Dan Pertambangan</a></li>
            <li><a href="internasional">Properti</a></li>
            <br />
            <li><a href="lifestyle">Life Style</a></li>
            <li><a href="kesehatan">Kesehatan</a></li>
            <li><a href="kecantikan">Kecantikan</a></li>
            <li><a href="iptek">Iptek</a></li>
            <li><a href="teknologi-informasi">Teknologi Informasi</a></li>
            <li><a href="manajemen">Manajemen</a></li>
            <br />
            <li><a href="hobi">Hobi</a></li>
            <li><a href="hukum">Hukum</a></li>
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-top">
             <li><a href="sport">Sport</a></li>
             <li><a href="sepak-bola">Sepak Bola</a></li>
             <li><a href="sport-mania">Sport Mania</a></li>
             <br />
             <li><a href="entertainment">Entertainment</a></li>
             <li><a href="gosip-seleb">Gosip Seleb</a></li>
             <li><a href="musik">Musik</a></li>
             <li><a href="film">Film</a></li>
             <br />
              <li><a href="traveling">Traveling</a></li>
             <li><a href="tempat-favorit">Tempat Favorit</a></li>
             <li><a href="jalan-jalan">Jalan - Jalan</a></li>
             <li><a href="hotel-dan-resto">Hotel Dan Resto</a></li>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-top">
        	<div class="sosmed">
        	<a href="https://www.facebook.com/Newseditor_id-1635693813350028/" target="_blank">
            	<img src="asset/img/fb.png" /> Facebook
            </a>
            </div>
            <div class="sosmed">
            <a href="https://twitter.com/editornews_id" target="_blank">
            	<img src="asset/img/twiter.png" />Twitter
            </a>
            </div>
            <div class="sosmed">
            <img src="asset/img/youtube.png" /> Youtube
            </div>
            <div class="sosmed">
            <img src="asset/img/gplus.png" /> Google Plus
            </div>
            <div class="redaksi">
            	Kantor :  <br />
                Telpon :
            </div>
        </div>
	</div>
    <div class="col-lg-12 bg-dark border-top">
    	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
    		<div class="copyright-bottom">
    			Copyright &copy; Editor.id <?php echo $d = date('Y'); ?> , All Right Reserved
    		</div>
    		<div class="copyright-bottom">
            <?php $page_category = $qM->page_category(); foreach($page_category as $pc){ ?>
    			<a href="inside-<?php echo $pc['page_cat_url']; ?>"><?php echo $pc['page_cat_title'] ?></a> -
            <?php } ?>
    		</div>
    	</div>
    	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	    	<div class="logo-bottom">
	        	<a href="#">Editor.id</a>
	        </div>
        </div>
    </div>
</div>