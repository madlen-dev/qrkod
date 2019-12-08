<?php 
	$siparis_id = $_POST['siparis_id'];
	require '../config/db.php';
	$siparisi_guncelle = $root->prepare("UPDATE `siparisler` SET `siparis_durum`= ? WHERE siparis_id = ?");
	$siparisi_guncelle->execute(array(1,$siparis_id));
	if ($siparisi_guncelle) {
		header("Location:siparis-restoran.php");
	}else {
		echo "hata";
	}
?>