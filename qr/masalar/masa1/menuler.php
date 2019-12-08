<!DOCTYPE html>
<html lang="tr-TR">
<head>
	<title>QR KOD MENU SISTEMI</title>
	<meta charset="utf-8">
	<meta name="Description" content="QR kod sistemi">
	<meta name="Author" content="Test">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/qr-system.css">
	<link rel="stylesheet" type="text/css" href="../../css/hk-framework.css">

</head>
<body>	
	<main class="qr-system">
		<section class="box md-pd-bottom">
			<ul class="menu-list">
				<li>
					<div class="menu-details">
						<!-- <div class="menu-head">
							<img src="../../images/list-icon.png">
							<header class="menu-title">Menü</header>
						</div> -->
						<form action="../../siparisler/siparis-musteri.php" method="post">
							<input type="hidden" name="masa_id" value="1">
							<table class="width-full">
								<tbody>
									<tr>
										<td class="padding-md">
											<input type="checkbox" name="salata" value="Salata" id="salata">
										</td>
										<td>
											<label for="salata" class="padding-left-md">Salata</label>
										</td>
										
									</tr>
									<tr>
										<td class="padding-md">
											<input type="checkbox" name="pilav" value="Pilav" id="pilav">
										</td>
										<td>
											<label for="pilav" class="padding-left-md">Pilav</label>
										</td>
										
									</tr>
									<tr>
										<td class="padding-md">
											<input type="checkbox" name="kuru-fasulye" value="Kuru Fasulye" id="kuru_fasulye">
										</td>
										<td>
											<label for="kuru_fasulye" class="padding-left-md">Kuru Fasulye</label>
										</td>
										
									</tr>
									<tr>
										<td class="padding-md">
											<input type="checkbox" name="cacık" value="Cacık" id="cacık">
										</td>
										<td>
											<label for="cacık" class="padding-left-md">Cacık</label>
										</td>
										
									</tr>
									<tr>
										<td class="padding-md">
											<input type="radio" name="cift" value="1" id="cift">
										</td>
										<td>
											<label for="cift" id="cift_label">Çift kişilik olsun</label>
										</td>
										<script type="text/javascript">
											document.getElementById("cift_label").onclick= function() {
												document.getElementById("cift").value = 2;
											}
										</script>
									</tr>
									<tr>
										<td colspan="2" class="padding-md">
											Toplam : <input type="number" name="toplam_ucret" id="toplam_ucret" readonly value="0" style="border:none;width:50px;text-align: center;outline: none;font:lighter 20px/16px 'Arial',sans-serif;vertical-align: center; ">Lira
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
								var orman_kebabı = document.getElementById("orman_kebabı");
								var hashas_kebabı = document.getElementById("hashas_kebabı");
								var mantı = document.getElementById("mantı");
								var kuzu_tandır = document.getElementById("kuzu_tandır");
								var lahmacun = document.getElementById("lahmacun");
								var dolma = document.getElementById("dolma");

								var orman_kebabi_fiyat = 30;
								var hashas_kebabi_fiyat = 25;
								var manti_fiyat = 15;
								var kuzu_tandır_fiyat = 25;
								var lahmacun_fiyat = 10;
								var dolma_fiyat = 18;
								var salata_fiyat = 5;
								var kuru_fasulye_fiyat = 10;
								var cacik_fiyat = 6;
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
										toplam_ucret += cacik_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (cacık.checked == false) {
										toplam_ucret -= cacik_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								orman_kebabı.addEventListener("click", function() {
									if (orman_kebabı.checked == true) {
										toplam_ucret += orman_kebabi_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (orman_kebabı.checked == false) {
										toplam_ucret -= orman_kebabi_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								hashas_kebabı.addEventListener("click", function() {
									if (hashas_kebabı.checked == true) {
										toplam_ucret += hashas_kebabi_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (hashas_kebabı.checked == false) {
										toplam_ucret -= hashas_kebabi_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								mantı.addEventListener("click", function() {
									if (mantı.checked == true) {
										toplam_ucret += manti_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (mantı.checked == false) {
										toplam_ucret -= manti_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								kuzu_tandır.addEventListener("click", function() {
									if (kuzu_tandır.checked == true) {
										toplam_ucret += kuzu_tandır_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (kuzu_tandır.checked == false) {
										toplam_ucret -= kuzu_tandır_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								lahmacun.addEventListener("click", function() {
									if (lahmacun.checked == true) {
										toplam_ucret += lahmacun_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (lahmacun.checked == false) {
										toplam_ucret -= lahmacun_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}
								});

								dolma.addEventListener("click", function() {
									if (dolma.checked == true) {
										toplam_ucret += dolma_fiyat;
										document.getElementById("toplam_ucret").value = toplam_ucret;
									}else if (dolma.checked == false) {
										toplam_ucret -= dolma_fiyat;
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