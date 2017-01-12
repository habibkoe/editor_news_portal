<?php
class dbAdmin{
	
public function berita(){
		global $pdo;
		$query =$pdo->prepare("select * FROM post_news LEFT JOIN category_meta ON category_meta.link_id=post_news.link_id");
		$query->execute();
		return $query->fetchAll();
		}
public function cek_link($id_b){
		global $pdo;
		$query =$pdo->prepare("select * FROM media WHERE link_id=?");
		$query->bindValue(1, $id_b);
		$query->execute();
		return $query->fetch();
		}
public function comments(){
		global $pdo;
		$query =$pdo->prepare("select * FROM comments LEFT JOIN post_news ON post_news.post_id=comments.post_id ORDER BY comment_id DESC");
		$query->execute();
		return $query->fetchAll();
		}
public function info(){
		global $pdo;
		$query =$pdo->prepare("select * FROM post_page LEFT JOIN page_category ON page_category.page_cat_id=post_page.page_category ORDER BY page_id DESC");
		$query->execute();
		return $query->fetchAll();
		}
public function detail_info($id_b){
		global $pdo;
		$query =$pdo->prepare("select * FROM post_page LEFT JOIN page_category ON page_category.page_cat_id=post_page.page_category WHERE page_id=?");
		$query->bindValue(1, $id_b);
		$query->execute();
		return $query->fetch();
		}

public function detail_berita($id_b){
		global $pdo;
		$query =$pdo->prepare("SELECT * from  (SELECT pn.author_id, pn.link_id, cm.category_id, pn.post_title, pn.post_description, pn.created_date, pn.counter_comment, pn.counter_page, pn.post_url, pn.post_id from post_news as pn LEFT JOIN category_meta as cm  ON cm.link_id=pn.link_id where pn.post_id =?) as pnc LEFT JOIN category as c ON c.category_id = pnc.category_id LEFT JOIN media as m ON m.link_id=pnc.link_id LEFT JOIN author as au ON au.author_id = pnc.author_id");
		$query->bindValue(1, $id_b);
		$query->execute();
		return $query->fetch();
		}

public function kategori_update($id_l){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM category as c LEFT JOIN category_meta as cm ON cm.category_id=c.category_id WHERE cm.link_id=?");
		$query->bindValue(1, $id_l);
		$query->execute();
		return $query->fetchAll();
		}

public function kategori_berita(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM category as c LEFT JOIN category_meta as cm ON cm.category_id=c.category_id GROUP BY c.category_id");
		$query->execute();
		return $query->fetchAll();
		}
public function kategori_berita_detail($id_kb){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM category WHERE category_id=?");
		$query->bindValue(1, $id_kb);
		$query->execute();
		return $query->fetch();
		}
public function kategori_berita_all(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM category ORDER BY category_id DESC");
		$query->execute();
		return $query->fetchAll();
		}
public function kategori_page_all(){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM page_category ORDER BY page_cat_id DESC");
		$query->execute();
		return $query->fetchAll();
}
public function kategori_page_detail($id_kb){
		global $pdo;	
		$query = $pdo->prepare("SELECT * FROM page_category WHERE page_cat_id=?");
		$query->bindValue(1, $id_kb);
		$query->execute();
		return $query->fetch();
		}
public function detail_tv($id_tv){
		global $pdo;
		$query =$pdo->prepare("select * FROM post_tv WHERE tv_id =?");
		$query->bindValue(1, $id_tv);
		$query->execute();
		return $query->fetch();
		}
public function detail_advertise($ad_id){
		global $pdo;
		$query =$pdo->prepare("select * FROM advertise WHERE ad_id =?");
		$query->bindValue(1, $ad_id);
		$query->execute();
		return $query->fetch();
		}
}



?>