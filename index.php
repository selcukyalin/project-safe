<?php
/*
	____                           __     _____       ____          
   / __ \_________    (_)__  _____/ /_   / ___/____ _/ __/__ 
  / /_/ / ___/ __ \  / / _ \/ ___/ __/   \__ \/ __ `/ /_/ _ \
 / ____/ /  / /_/ / / /  __/ /__/ /_    ___/ / /_/ / __/  __/
/_/   /_/   \____/_/ /\___/\___/\__/   /____/\__,_/_/  \___/ 
                /___/                                        
				
 * Wpress.TOP
 * Webellek.com
 * Copyright 2015-2017
 *
 * @dosya-surumu 1.0
 */
 
include "functions.php";
error_reporting(0);
session_start();
if($_SESSION["logged"] == "true") {
	header('Location: panel.php');
	die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow">
<title>IP Yönetim Sistemi</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="inc/font-awesome.min.css" />
</head>

<body>
<h1>IP YÖNETİM SİSTEMİ</h1>
<div class="admin"><a href="moderate.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> YÖNETİM GİRİŞİ</a></div>

<div class="icr">
		
	<div id="login">
		<h2><i class="fa fa-sign-in" aria-hidden="true"></i> Giriş</h2>
		<form name="giris" action="login.php" method="POST">
			<fieldset>
				<p><label for="text">Kullanıcı Adı</label></p>
				<p><input type="text" name="id" required /></p> 
				<p><label for="password">Şifre</label></p>
				<p><input type="password" name="passw" required /></p>
				<p><img src="check.php" width="120" height="35" border="1" />  <img onclick="yenile()" src="images/yenile.png" alt="yenile" /> 
				<p><input type="text" name="check" required /></p>
				<p><input type="submit" value="IP Adresini Ekle"></p>
			</fieldset>
		</form>
	</div>
		
</div>

<script>
function yenile() {
    location.reload();
}
</script>
</body>

</html>
