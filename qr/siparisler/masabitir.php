<?php
	$masa_id = $_POST['masa_id'];
	require '../config/db.php';
	$masayi_bitir = $root->prepare("UPDATE `siparisler` SET `oturum_son`= ? WHERE `masa_id` = ?");
	$masayi_bitir->execute(array(1,$masa_id));
	if ($masayi_bitir) {
		header("Location:siparis-restoran.php");
	}else {
		echo "hata";
	}
?>