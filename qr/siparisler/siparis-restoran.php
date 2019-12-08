<?php require '../config/date.region.settings.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>QR KOD RESTORAN SİPARİŞ SAYFASI</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="restoran sipariş görüntüleme sayfası">
	<meta name="author" content="test">
	<link rel="stylesheet" type="text/css" href="../css/qr-system.css">
	<link rel="stylesheet" type="text/css" href="../css/hk-framework.css">
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</head>
<body onload="startTime();siparisleriAl();">
	<main class="qr-system">
		<section class="box border-std radius-top-left-std radius-top-right-std shadow-std">
			<div class="font-md padding-md centered">
				Restoran | Sipariş Görüntüleme Sayfası
			</div>
		</section>
		<section class="box fit-size-500px border-right-std  border-left-std">	
			<div class="padding-md">
		<?php
			require '../config/db.php';
			$siparis_al = $root->query("SELECT * FROM siparisler ORDER BY siparis_id DESC");
			$kontrol = $siparis_al->rowCount();
			if ($kontrol !== 0) { ?>
				<table class="std-font" style="border:1px solid #ddd;border-collapse:collapse;border-color: #eee; width: 100%;">
					<thead class="border-bottom-std">
						<th class="font-std font-light padding-std">
							<img src='../images/table.png' class="table-icon">
							<p class="margin-none">Masa No</p>
						</th>
						<th class="font-std font-light padding-std">
							<img src='../images/siparis.png' class="table-icon">
							<p class="margin-none">Sipariş No</p>
						</th>
						<th class="font-std font-light padding-std">
							<img src='../images/orders.png' class="table-icon">
							<p class="margin-none">Siparişler</p>
						</th>
						<th class="font-std font-light padding-std">
							<p class="margin-none">Ek açıklama</p>
						</th>
						<th class="font-std font-light padding-std">Sipariş Durumu</th>
						<th class="font-std font-light padding-std">
							<img src='../images/clock.png' class="table-icon">
							<p class="margin-none">Sipariş Tarih</p>
						</th>
						<th class="font-std font-light padding-std">
							<img src='../images/receipt.png' class="table-icon">
							<p class="margin-none">Toplam</p>
						</th>
						<th class="font-std font-light padding-std">Masa Durumu</th>
					</thead>
					<tbody id="siparisler"></tbody>
				</table>
			<?php 
			}else {
			echo "<p class='bg-info border-info color-std padding-md radius-std'>Henüz Sipariş Yok.</p>";
			}?>
			</div>
		</section>
		<section class="box border-std radius-bottom-left-std radius-bottom-right-std">
			<div id="txt" class="std-font padding-md centered"></div>
			<script type="text/javascript">
				function startTime() {
				  var today = new Date();
				  var h = today.getHours();
				  var m = today.getMinutes();
				  var s = today.getSeconds();
				  m = checkTime(m);
				  s = checkTime(s);
				  document.getElementById('txt').innerHTML =
				  h + ":" + m + ":" + s;
				  var t = setTimeout(startTime, 500);
				}
				function checkTime(i) {
				  if (i < 10) {
				  	i = "0" + i
				  };  // add zero in front of numbers < 10
				  return i;
				}
				function siparisleriAl() {
					$.ajax({
						type:'GET',
						url:'siparisler.php',
						success:function(data) {
							$("#siparisler").html(data);
						}
					});
				}
				setInterval(function(){ siparisleriAl(); }, 10000);
			</script>
		</section>
	</main>
</body>
</html>