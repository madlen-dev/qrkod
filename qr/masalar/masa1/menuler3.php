<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<title>QR KOD MENU SISTEMI</title>
	<meta charset="utf-8">
	<meta charset="ISO-8859-1">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="Description" content="QR kod sistemi">
	<meta name="Author" content="Test">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/qr-system.css">
	<link rel="stylesheet" type="text/css" href="../../css/hk-framework.css">
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
</head>
<body>	
	<main class="qr-system">
		<section class="box radius-std">
			<nav class="navmenu">
				<header class="header">
					<div class="menubtn" id="menubtn" onclick="showmenu()">
						<div class="menuline"></div>
						<div class="menuline"></div>
						<div class="menuline"></div>
					</div>
					<div class="title" style="text-align:center;text-indent: -30px;">
						Kurum Adı
					</div>
					<form method="post" action="../../siparisler/siparis-musteri.php">
					<div>
						<input type="text" name="toplam" id="ucret" value="0" readonly class="no-border width-half centered font-std"> &#8378;
					</div>
				</header>
				<div class="menu-body">
					<ol class="menu" id="menu">
						<li><a href="#">Ana Sayfa</a></li>
						<li><a href="#">Ana Yemekler</a></li>
						<li><a href="#">Hafif Yemekler</a></li>
						<li><a href="#">Salatalar</a></li>
						<li><a href="#">Tatlılar</a></li>
						<li><a href="#">İletişim</a></li>
						<li><a href="#">Hakkında</a></li>
					</ol>
				</div>
			</nav>
			<script type="text/javascript">
				var menu = document.querySelector("#menu");
				function showmenu() {
					$(".menu-body").slideToggle("medium");
					$(".navmenu").css("overflow","hidden");
				}
			</script>
				<input type="hidden" name="masa_id" value="1">
				<div class="margin-md padding-md font-small font-bold border-info radius-std bg-info color-std">* Yemekleri resmin üzerine tıklayarak veya ürün resminin altındaki boş kutucuğa basarak ekleyin.</div>
				<ul class="menu-list padding-md">
				<?php 
					require_once '../../config/localdb.php';
					$urunler = $root->query("SELECT * FROM urunler");
					foreach ($urunler as $urun) {
						$urun_ad = $urun["urun_ad"];
						$urun_resim = $urun['urun_resim'];
						$urun_fiyat = $urun['urun_fiyat'];
						$label = str_replace(" ", "_", $urun_ad);
						$id = str_replace("ı", "i", $label);
						$label = str_replace("ı", "i", $id);
				?>
					<li>
						<div class="urun-resim">
							<label for="<?php echo strtolower($label); ?>">
							<img src="../../images/<?php echo $urun_resim; ?>" class="radius-std">
							</label>
							<header class="urun-bilgi radius-bottom-left-std radius-bottom-right-std">
								<i class="urun-ad font-md font-normal disp-inline vertical-align-middle">
									<?php echo ucfirst($urun_ad);  ?>
								</i>
								<i class="urun-fiyat font-md font-normal disp-inline vertical-align-middle"><?php echo $urun_fiyat; ?> &#8378;</i>
								<input type="checkbox" name="urun" value="<?php echo strtolower($urun_ad); ?>" 
								onclick="updatePrice(this,<?php echo $urun_fiyat; ?>);" 
								id="<?php echo strtolower($label); ?>" 
								style="transform: scale(1.5);margin-top: 8px;" 
								data-price="<?php echo $urun_fiyat; ?>" 
								data-id="urun"
								data-ad="<?php echo $urun_ad; ?>">
							</header>
						</div>
					</li>
				<?php } ?>
				</ul>
				<div class="aciklamalar padding-md">
					<header class="font-std margin-bottom-md centered">
						<img src="../../images/edit.png" style="width: 20px;" class="disp-inline vertical-align-bottom">
						<p class="font-std disp-inline vertical-align-bottom margin-none">Siparişe eklemek istediğiniz bir şey var mı ?</p>
					</header>
					<textarea class="border-none border-std radius-std no-outline" placeholder="Ör; Salataya tuz eklenmesin vs." name="ek"></textarea>
					<textarea id="urunler" class="no-border no-outline" readonly name="urunler"></textarea>
					<textarea id="fiyatlar" class="no-border no-outline" readonly name="fiyatlar"></textarea>
				</div>
				<input type="submit" name="siparis-et" class="centered margin-std" id="siparis_btn" value="Siparişi ver">
			</form>
		</section>
		<script type="text/javascript">
			var toplam = 0;
			var urunler= [];
			var urun_fiyat = [];
			function updatePrice(seciliUrun,fiyat) {
				if (seciliUrun.checked == true) {
					toplam = toplam + fiyat;
					document.getElementById("ucret").value = toplam;
					urunler.push(seciliUrun.value);
					urun_fiyat.push(seciliUrun.getAttribute("data-price"));
					document.getElementById("urunler").innerHTML = urunler;
					document.getElementById("fiyatlar").innerHTML = urun_fiyat;
				}else if (seciliUrun.checked == false) {
					toplam = toplam - fiyat;
					for (var i = 0; i < urunler.length; i++) {
						var urun_ad = seciliUrun.value;
						var urun_ad_size = urun_ad.length;
						if(urunler[i] == urun_ad) {
							urunler.splice(i, 1);
							urun_fiyat.splice(i,1);
						}
						document.getElementById("fiyatlar").innerHTML = urun_fiyat;
						document.getElementById("urunler").innerHTML = urunler;
					}
					document.getElementById("ucret").value = toplam;
				}
			}
		</script>
	</main>
</body>
</html>