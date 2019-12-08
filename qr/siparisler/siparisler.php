<?php
	require '../config/db.php';
	$siparis_al = $root->query("SELECT * FROM siparisler ORDER BY siparis_id DESC");
	$siparis_al->setFetchMode(PDO::FETCH_ASSOC);
	foreach ($siparis_al as $siparis_key => $siparis) { 
		echo "<tr>";
		echo "<td class='centered'>".$siparis['masa_id']."</td>";
		echo "<td class='centered'>".$siparis['siparis_id']."</td>";
		echo "<td><textarea class='no-border no-outline' readonly>".$siparis['siparisler']."</textarea></td>";
		echo "<td><textarea class='no-border no-outline' readonly>".$siparis['ek']."</textarea></td>";
		echo "<td class='centered'>";
		if ($siparis['siparis_durum'] == true) {
			echo '<input type="button" value="Servis edildi!" disabled>';
		}else {
			echo '<form id="siparis_form" method="post" action="serviset.php">';
			echo '<input type="hidden" name="siparis_id" value="'.$siparis["siparis_id"].'">';
			echo '<input type="submit" value="Servis Bekliyor">';
			echo '</form>';
		}
		echo "</td>";
		echo "<td class='centered'>".substr($siparis['siparis_tarih'], 10)."</td>";
		echo "<td class='centered'>".$siparis['toplam_ucret']." &#x20BA;</td>";
		echo "<td style='text-align:center;'>";
		if ($siparis['oturum_son'] == true) {
			echo '<form id="siparis_form" method="post" action="masayenile.php">';
			echo '<input type="hidden" name="masa_id" value="'.$siparis["masa_id"].'">';
			echo '<input type="submit" value="Masayı Yenile">';
			echo '</form>';
		}else {
			echo '<form id="siparis_form" method="post" action="masabitir.php">';
			echo '<input type="hidden" name="masa_id" value="'.$siparis['masa_id'].'">';
			echo '<input type="submit" value="Bitir">';
			echo '</form>';
		}
		echo "</td>";
		echo "</tr>";
	}
?>