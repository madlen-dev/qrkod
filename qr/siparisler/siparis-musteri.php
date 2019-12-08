<?php require '../config/date.region.settings.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sipariş sayfası</title>
	<meta charset="utf-8">
	<meta name="Description" content="Sipariş görüntüleme sayfası">
	<meta name="Author" content="test">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/qr-system.css">
	<link rel="stylesheet" type="text/css" href="../css/hk-framework.css">
</head>
<body>
	<main class="qr-system">
		<section class="box font-std radius-std" style="box-shadow: 0px 0px 3px rgba(0,0,0, 0.2);">
	<?php if (isset($_POST['siparis-et'])){  ?>
				<h2 class="font-md font-normal padding-std centered border-bottom-std">Sipariş detayı</h2>
			<div class="padding-md">
	<?php
		$masa_id = $_POST['masa_id'];
		$siparis_tarih = date("d/m/Y H:i:s");
		$toplam_ucret = $_POST['toplam'];
		$urunler = $_POST['urunler'];
		$fiyatlar = $_POST['fiyatlar'];
		$products = explode(",", $urunler);
		$prices = explode(",", $fiyatlar);
		$dizi_birlestir = array_combine($products, $prices);
		$ek = $_POST['ek'];
		$toplam_siparis = count($products);
		if (strlen($urunler) == 0 OR empty($urunler)) {
			echo "<p class='std-bold-header fail radius-std padding-md '>Lütfen en az bir seçim yapınız.</p>";
			die();
		}else{
			echo "<table>";
			echo "<thead>";
			echo "<th>Ad</th>";
			echo "<th>Fiyat</th>";
			echo "</thead>";
			foreach ($dizi_birlestir as $prices => $product) {
				echo "<tr>";
					echo "<td>".$prices."</td>";
					echo "<td>".$product."</td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "<p class='font-std'>Ek olarak, ".$ek."</p>";
			echo "Toplam : ".$toplam_ucret." Lira";
			$implode = implode(",", $products);
			try {
				require '../config/db.php';
			$addOrders = $root->prepare("INSERT INTO `siparisler`(`masa_id`,`siparis_tarih`,`siparisler`,`ek`,`toplam_ucret`) VALUES (?,?,?,?,?)");
			$addOrders->execute(array($masa_id,$siparis_tarih,$implode,$ek,$toplam_ucret));
			} catch (Exception $e) {
				$e->getMessage();
			}
		}
	} else if (!isset($_POST['siparis-et'])) {
		echo "<h2 class='font-md font-normal centered bg-red color-std padding-std radius-std'>Lütfen masanızdaki karekodu okutarak menü seçiniz!</h2>";
	}
	?>
</div>
		</section>
	</main>
</body>
</html>