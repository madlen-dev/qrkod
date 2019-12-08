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
		$root = new PDO("mysql:host=127.0.0.1;dbname=maldiaso_medya;charset=utf8","maldiaso_medya","ascx2344+");
	} catch (Exception $e) {
		$e->getMessage();
	}
?>