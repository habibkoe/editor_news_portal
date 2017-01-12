<?php if(isset($_POST['edit'])){
	$user = $_POST['user'];
	$phone = $_POST['phone'];
	$pass = md5($_POST['pass']);
	$id = $_POST['id'];
	$query = $pdo->prepare("UPDATE author SET username=?, password=? WHERE author_id=?");
	$query->bindValue(1, $user);
	$query->bindValue(2, $pass);
	$query->bindValue(3, $id);
	$query->execute();
}else if(isset($_POST['tambah'])){
	$nama = $_POST['nama'];
	$phone = $_POST['phone'];
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$status = $_POST['status'];
	$query = $pdo->prepare("INSERT INTO author (author_name,username,password,previlage, phone_number) VALUES(?,?,?,?,?)");
	$query->bindValue(1, $nama);
	$query->bindValue(2, $user);
	$query->bindValue(3, $pass);
	$query->bindValue(4, $status);
	$query->bindValue(5, $phone);
	$query->execute();
	}?>
<div class="content-kanan-admin">
<div class="h_p"> Profil Admin</div>
<p><?php 
		global $pdo;
	$query = $pdo->prepare("SELECT * FROM author WHERE author_id = ?");
	$query->bindValue(1, $id_user);
	$query->execute();	
	$baris = $query->fetch();
		echo 'Name : '.$baris['author_name'].'<br>';
		echo 'Username : '.$baris['username'].'<br>';
		echo 'Phone Number : '.$baris['phone_number'].'<br>';
		echo 'Previlage : '.$baris['previlage']; ?></p>
        <hr>
<div class="admin_hal">
<div class="h_p">EDIT ADMIN</div>
<form method="post">
<table>
<tr><td><label>Username</label></td><td><input type="text" name="user"></td></tr>
<tr><td><label>Password</label></td><td><input type="password" name="pass"></td></tr>
<tr><td><label>Phone Number</label></td><td><input type="text" name="phone"></td></tr>
<input type="hidden" name="id" value="<?php echo $id_user; ?>"  />
<tr><td><input type="submit" name="edit" value="Update"></td></tr>
</table>
</form>
</div>
<div class="admin_hal">
<div class="h_p">ADD</div>
<form method="post">
<table>
<tr><td><label>Name</label></td><td><input type="text" name="nama"></td></tr>
<tr><td><label>Username</label></td><td><input type="text" name="user"></td></tr>
<tr><td><label>Password</label></td><td><input type="password" name="pass"></td></tr>
<tr><td><label>Phone Number</label></td><td><input type="text" name="phone"></td></tr>
<input type="hidden" name="status" value="admin">
<tr><td><input type="submit" name="tambah" value="Simpan"></td></tr>
</table>
</form>
</div>
</div>