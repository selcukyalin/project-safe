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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow">
<title>IP Yönetim Sistemi</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<h1>IP YÖNETİM SİSTEMİ</h1>
<div class="admin"><a href="moderate.php">YÖNETİM</a></div>

<div class="icrfr">


<?php
		session_start();
		$id = $_POST['id'];
		$ppas = $_POST['passw'];
		include("users/normal/$id.php");
		include("users/mod/$id.php");
            if (md5($ppas) == $pass || md5($ppas) == $mpass && $_POST['check'] == $_SESSION['digit']) {
				if(file_exists($ipdosyasi)) {
					echo "<div style='sonuc'><img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br />IP adresiniz zaten kayıtlı.<br />5 saniye içinde Wordpress yönetim paneli giriş sayfasına yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='5;URL=../wp-admin'>";
					exit();
				}

				else {
					$kayit = fopen("kayit/$gercekip.txt", "w");
					fclose($kayit);
					echo "<div style='sonuc'><img src='images/basarili.png' alt='işlem başarılı' /><br /><br />IP adresi kayıt edildi!<br />5 saniye içinde Wordpress yönetim paneli giriş sayfasına yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='5;URL=../wp-admin'>";
				}
                
            } 
			else {		
				echo "<div style='sonuc'><img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br />ID numaranızı, şifrenizi veya güvenlik kodunu yanlış yazdınız. <br /> 5 saniye içinde IP kayıt sayfasına geri yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='5;URL=index.php'>"; 
            }
?>

</div>
</body>

</html>