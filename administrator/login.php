<?php

session_start();

include_once('../config/connect.php');

if(isset($_POST['masuk'])){
	$user = $_POST['user'];
	$password = md5($_POST['password']);
		if(empty($user) or empty($password)){$error = 'Maaf Username atau Password masih kosong';
		}else{
			$query = $pdo->prepare("SELECT author_id FROM author WHERE username=? AND password=?");
			$query->bindValue(1, $user);
			$query->bindValue(2, $password);
			$query->execute();
			$data = $query->fetch();
			$num = $query->rowCount();
			if($num == 1){
				$_SESSION['author_id']=$data['author_id'];
				header('Location:beranda.php?page=beranda');exit();
			}else{$error='User Atau Password tidak cocok';}}}?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Editor.id</title>
<link rel="shortcut icon" href="../gambar/favicon.png" />
<link rel="stylesheet" href="../asset/css/login-css.css" type="text/css" />
</head>

<body>
<div class="login">
	<div class="head-login">Admin Panel</div>
    
	<div class="screen-login">
    	<img src="../asset/img/menubg.png" />
    	<?php if (isset($error)) { ?><div class="screen-pesan">
			<?php echo $error; ?></div><?php 
			
			}?>
    </div>
    <div class="menu-login">
    	<form method="post" autocomplete="off">
        <table>
        	<tr>
                <td colspan="2"><input type="text" name="user" autofocus="autofocus" placeholder="Username" class="form-login" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="password" name="password" placeholder="Password" class="form-login" /></td>
            </tr>
             <tr>
                <td><input type="submit" name="masuk" value="Masuk" class="tombol-login" /></td>
                <td><input type="reset" name="reset" value="Reset" class="tombol-reset" /></td>
            </tr>
        
        </table>
        
        </form>
    </div>
	<div class="footer-login">
    
    </div>
</div>
</body>
</html>