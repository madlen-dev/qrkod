<?php
	$masa_id = $_POST['masa_id'];
	require '../config/db.php';
	$masayi_bitir = $root->prepare("DELETE FROM `siparisler` WHERE `masa_id` = ?");
	$masayi_bitir->execute(array($masa_id));
	if ($masayi_bitir) {
		header("Location:siparis-restoran.php");
	}else {
		echo "<p class='bg-error color-std font-md'>Hata! Lütfen web yöneticinize danışın.</p>";
	}
?>