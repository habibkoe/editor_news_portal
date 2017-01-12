<?php class queryMain{
	/* query beranda ..................................................................................*/
	
	public function heading_news_bb(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id ORDER BY pnc.post_id DESC  LIMIT 0, 5");
		$query->execute();
		return $query->fetchAll();
	}
	public function heading_news(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN media ON media.link_id=post_news.link_id WHERE post_status='Publish' ORDER BY post_id DESC  LIMIT 0, 5");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function heading_advertise(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM advertise WHERE ad_position='headers' ORDER BY ad_id DESC  LIMIT 1");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function side_right_advertise(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM advertise WHERE ad_position='side_rigth' ORDER BY ad_id DESC  LIMIT 1");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function side_midle_advertise(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM advertise WHERE ad_position='side_midle' ORDER BY ad_id DESC  LIMIT 1");
		$query->execute();
		return $query->fetchAll();
	}
	public function detail_news_advertise(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM advertise WHERE ad_position='detail_news' ORDER BY ad_id DESC  LIMIT 1");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function berita_utama_b(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN media ON media.link_id=post_news.link_id LEFT JOIN category_meta ON category_meta WHERE post_status='Publish' ORDER BY post_id DESC  LIMIT 5, 12");
		$query->execute();
		return $query->fetchAll();
	}
	public function berita_utama_bb(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id ORDER BY pnc.post_id DESC  LIMIT 5, 15");
		$query->execute();
		return $query->fetchAll();
	}
	public function berita_terkomentari(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE counter_comment > 0 ORDER BY counter_comment DESC LIMIT 0, 8");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function berita_photography(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_id = 37 ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 2");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function berita_populer(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE counter_page > 0 ORDER BY counter_page DESC LIMIT 0, 8");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function tv(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_tv ORDER BY tv_id DESC  LIMIT 0, 3");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function sport_beranda(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=2 ORDER BY post_id DESC LIMIT 0, 3");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query beranda */
	
	/* 1. query all index Season ----------------------------------------------------------------------------*/
	
	public function all_index(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id GROUP BY pnc.post_id DESC");
		$query->execute();
		return $query->fetchAll();
	}
	/* end query all index */
	
	/* 1. query Entertainment Season ----------------------------------------------------------------------------*/
	
	public function head_entertainment($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='gosip-seleb' or c.category_url='musik' or c.category_url='film' ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_entertainment($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='gosip-seleb' or c.category_url='musik' or c.category_url='film') as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	public function gosip_seleb(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=21 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function musik(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=22 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function film(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=23 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function head_photography($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url = ?) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_photography($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url = ?) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query berita Entertainment */
	
	/* 2. query berita Sport ----------------------------------------------------------------------------*/
	
	public function head_sport($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='sepak-bola' or c.category_url='sport-mania' ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_sport($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='sepak-bola' or c.category_url='sport-mania') as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	public function sepak_bola(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=19 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function sport_mania(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=20 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query berita Sport */
	
	/* 3. query berita News ----------------------------------------------------------------------------*/
	
	public function head_news($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='nasional' or c.category_url='internasional' or c.category_url='daerah' or c.category_url='jabodetabek' ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_news($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='nasional' or c.category_url='internasional' or c.category_url='daerah' or c.category_url='jabodetabek') as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	public function nasional(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=3 ORDER BY post_id DESC LIMIT 0, 3");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function internasional(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=10 ORDER BY post_id DESC LIMIT 0, 3");
		$query->execute();
		return $query->fetchAll();
	}
	public function daerah(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=14 ORDER BY post_id DESC LIMIT 0, 3");
		$query->execute();
		return $query->fetchAll();
	}
	public function jabodetabek(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=15 ORDER BY post_id DESC LIMIT 0, 3");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query berita News */
	
	/* 4. query berita Lifestyle ----------------------------------------------------------------------------*/
	
	public function head_lifestyle($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='kesehatan' or c.category_url='iptek' or c.category_url='teknologi-informasi' or c.category_url='manajemen' ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_lifestyle($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='kesehatan' or c.category_url='iptek' or c.category_url='teknologi-informasi' or c.category_url='manajemen') as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	public function kesehatan(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=4 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function iptek(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=11 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function teknologi_informasi(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=24 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function manajemen(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=25 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query berita Lifestyle */
	
	/* 5. query berita Food ----------------------------------------------------------------------------*/
	
	public function head_food($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='hang-out' or c.category_url='kuliner-mak-nyos' or c.category_url='info-makan-enak' ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_food($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='hang-out' or c.category_url='kuliner-mak-nyos' or c.category_url='info-makan-enak') as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	public function hangout(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=26 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function info_makan_enak(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=27 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function kuliner_mak_nyos(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=28 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}

	
	/* end query berita Food */
	
	/* 6. query berita bisnis ........................................................................................*/
	public function head_bisnis($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='bursa-saham' or c.category_url='pasar-uang' or c.category_url='industri-dan-pertambangan' or c.category_url='properti' ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_bisnis($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='bursa-saham' or c.category_url='pasar-uang' or c.category_url='industri-dan-pertambangan' or c.category_url='properti') as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	public function bursa_saham(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=16 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function pasar_uang(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=17 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function industri_dan_pertambangan(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=18 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function properti(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=9 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query berita bisnis */
	
	/* 7. query berita Traveling ----------------------------------------------------------------------------*/
	
	public function head_traveling($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='tempat-favorit' or c.category_url='jalan-jalan' or c.category_url='hotel-dan-resto' ) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_traveling($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =? or c.category_url='tempat-favorit' or c.category_url='jalan-jalan' or c.category_url='hotel-dan-resto') as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	public function tempat_favorit(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=30 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function jalan_jalan(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=31 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	public function hotel_dan_resto(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id LEFT JOIN media ON media.link_id=post_news.link_id WHERE category_id=32 ORDER BY post_id DESC LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query berita Traveling */
	
	
	/* 1. query sub category ----------------------------------------------------------------------------*/
	
	public function head_sub_category($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id, c.category_name, c.category_url from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =?) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetch();
	}
	
	public function index_sub_category($c){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from  (SELECT cm.category_id, cm.link_id from category as c LEFT JOIN category_meta as cm  ON cm.category_id=c.category_id where c.category_url =?) as pnc LEFT JOIN post_news as pn ON pn.link_id = pnc.link_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pn.author_id ORDER BY pn.post_id DESC LIMIT 1, 15");
		$query->bindValue(1, $c);
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query sub category */
	
	/* query detail berita ........................................................................................*/
	
	public function detail_berita($url){
		global $pdo;
		$query =$pdo->prepare("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id where pn.post_url =?) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id");
		$query->bindValue(1, $url);
		$query->execute();
		return $query->fetch();
		}
	public function loadcomments($post_id){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM comments WHERE post_id=? ORDER BY comment_id DESC");
		$query->bindValue(1, $post_id);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function berita_utama_bawah(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN media ON media.link_id=post_news.link_id WHERE post_status='Publish' ORDER BY post_id DESC  LIMIT 0, 4");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query detail berita */
	
	/* query sub berita bawah-----------------------------------------------------------------------------------------*/
	
	public function berita_sub_bawah(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_news LEFT JOIN media ON media.link_id=post_news.link_id WHERE post_status='Publish' ORDER BY post_id DESC  LIMIT 0, 6");
		$query->execute();
		return $query->fetchAll();
	}
	
	/* end query detail berita */
	
	/* query inside */
		public function inside($p_id){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM post_page LEFT JOIN page_category ON page_category.page_cat_id=post_page.page_category WHERE page_cat_url=? and status='Publish'");
		$query->bindValue(1, $p_id);
		$query->execute();
		return $query->fetch();
	}
	/* end query inside */
	
	/* query page */
		public function page_category(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM page_category");
		$query->execute();
		return $query->fetchAll();
	}
	/* end query inside */
	
	/* query search */
		public function search($cari){
		global $pdo;	
		$query = $pdo->prepare("SELECT * from post_news where post_title like ? or post_description like ? ");
		$query->bindValue(1, "%$cari%");
		$query->bindValue(2, "%$cari%");
		$query->execute();
		return $query->fetchAll();
	}
	/* end query search */
	
} ?>