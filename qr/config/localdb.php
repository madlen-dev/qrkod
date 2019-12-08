<?php
	if (empty(PDO::getAvailableDrivers()))
    {
        throw new PDOException ("Tarayıcı desteklenmiyor. Lütfen daha gelimiş bir tarayıcı deneyin.");
    }
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
   		echo 'Tarayıcı desteklenmiyor. Lütfen daha gelimiş bir tarayıcı deneyin.';
   		die();
   	}
	try {
		$root = new PDO("mysql:host=localhost;dbname=qr_kod_menu;charset=utf8","root","");
    header('Content-Type: text/html; charset=utf-8');
	} catch (Exception $e) {
		$e->getMessage();
	}
?>