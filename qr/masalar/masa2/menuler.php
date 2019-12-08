<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<title>QR KOD MENU SISTEMI</title>
	<meta charset="utf-8">
	<meta name="Description" content="QR kod sistemi">
	<meta name="Author" content="Test">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/qr-system.css">
</head>
<body>	
	<main class="qr-system">
		<section class="box md-pd-bottom">
			<header class="main-title">Masa 2 menü sayfası</header>
			<ul class="menu-list">
				<li>
					<div class="menu-details">
						<div class="menu-head">
							<img src="../../images/list-icon.png">
							<header class="menu-title">Menu</header>
						</div>
						<form action="../../siparisler/siparis-musteri.php" method="post">
							<input type="hidden" name="masa_id" value="2">
							<table>
								<tbody>
									<tr>
										<td>
											<input type="checkbox" name="salata" value="Salata" id="salata">
										</td>
										<td>
											<label for="salata">Salata</label>
										</td>
									</tr>
									<tr>
										<td>
											<input type="checkbox" name="pilav" value="Pilav" id="pilav">
										</td>
										<td>
											<label for="pilav">Pilav</label>
										</td>
									</tr>
									<tr>
										<td>
											<input type="checkbox" name="kuru-fasulye" value="Kuru Fasulye" id="kuru_fasulye">
										</td>
										<td>
											<label for="kuru_fasulye">Kuru Fasulye</label>
										</td>
									</tr>
									<tr>
										<td>
											<input type="checkbox" name="cacık" value="Cacık" id="cacık">
										</td>
										<td>
											<label for="cacık">Cacık</label>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											Toplam : <input type="number" name="toplam_ucret" id="toplam_ucret" readonly value="0" style="border:none;width:50px;text-align: center;outline: none;">Lira
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="submit" name="siparis-et" value="Gönder">
										</td>
									</tr>
								</tbody>
							</table>
							<script type="text/javascript">
								var salata = document.getElementById("salata");
								var kuru_fasulye = document.getElementById("kuru_fasulye");
								var cacık = document.getElementById("cacık");
								var pilav = document.getElementById("pilav");

								var salata_fiyat = 5;
								var kuru_fasulye_fiyat = 10;
								var cacık_fiyat = 6;
								var pilav_fiyat = 10;

								var toplam_ucret = 0;


								salata.addEventListener("click", function() {
									if (salata.checked == true) {
										toplam_ucret = toplam_ucret+salata_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (salata.checked == false) {
										toplam_ucret = toplam_ucret-salata_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								pilav.addEventListener("click", function() {
									if (pilav.checked == true) {
										toplam_ucret += pilav_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (pilav.checked == false) {
										toplam_ucret -= pilav_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								kuru_fasulye.addEventListener("click", function() {
									if (kuru_fasulye.checked == true) {
										toplam_ucret += kuru_fasulye_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (kuru_fasulye.checked == false) {
										toplam_ucret -= kuru_fasulye_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								cacık.addEventListener("click", function() {
									if (cacık.checked == true) {
										toplam_ucret += cacık_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (cacık.checked == false) {
										toplam_ucret -= cacık_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});
							</script>
						</form>
					</div>
				</li>
			</ul>
		</section>
	</main>
</body>
</html>