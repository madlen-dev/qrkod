<?php
	session_start();
	if (isset($_POST['send'])) {
		if (($_POST['r_name'] != "" OR !empty($_POST['r_name'])) AND ($_POST['r_name'] != ""OR !empty($_POST['r_pass']))) {
			$con = new PDO("mysql:host=localhost;dbname=qr_kod_menu;charset=utf8","root","");
			$name = $con->prepare("SELECT root_name FROM rest_root WHERE root_name = :u");
			$pass = $con->prepare("SELECT root_pass FROM rest_root WHERE root_pass = :p");
			$username = trim($_POST['r_name']);
			$userpass = $_POST['r_pass'];
			$name->execute(array(":u" => $username));
			$res = $name->rowCount();
			if ($res > 0) {
				$pass->execute(array(":p" => $userpass));
				$res_p = $pass->rowCount();
				if ($res_p > 0) {
					print("<center>Doğrulandı. Yönlendiriliyorsunuz...</center>");
					$_SESSION['user_verified'] = true;
					echo "<script>setTimeout(function(){ window.location.href = 'comp_ai.php' }, 3000);</script>";
					die();
				}else {
					echo "Şifre hatalı";
				}
			}else {
				echo "Böyle bir kullanıcı bulunmuyor.";
			}
		}else {
			echo "Az çok demeyelim boş geçmeyelim!";
		}
	}else {

	}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>ROOT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="root.css">
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
	<div class="container">
		<div class="box">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="inputs">
				<input type="text" name="r_name" placeholder="KULLANICI ADI" id="r_id" autocomplete autofocus>
			</div>
			<div class="inputs">
				<input type="password" name="r_pass" placeholder="ŞİFRE" id="r_p" autocomplete>
			</div>
			<div class="inputs">
				<input type="submit" id="btn" name="send" value="Giriş yap">
			</div>
			</form>
		</div>
	</div>
</body>
</html>
