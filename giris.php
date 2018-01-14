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

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IP Kayıt</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h1>IP Kayıt Sistemi</h1>
<div id="wrap">
<div class="msg">

        <?php
		session_start();
		$ppas = $_POST['passw'];
            if (md5($ppas) == "$pass" && $_POST['kontrol'] == $_SESSION['digit']) {
				if(file_exists($gercekip)) {
echo "<div class='bilgimsj'><br /><br />IP adresiniz zaten kayıtlı. 5 saniye içinde yönetim paneli giriş sayfasına yönlendirileceksiniz. <meta http-equiv='refresh' content='5;URL=../wp-admin'></div>";
exit();
}

else {
$kayit = fopen("kayit/$gercekip.txt", "w");
fclose($kayit);
echo "<div class='bilgimsj'><br /><br />IP adresi kayıt edildi! 5 saniye içinde yönetim paneli giriş sayfasına yönlendirileceksiniz. <meta http-equiv='refresh' content='5;URL=../wp-admin'></div>";
}
                
            } else {
				
echo "<div class='bilgimsj'><br /><br />Şifreyi veya güvenlik kodunu yanlış yazdınız. <br /> 5 saniye içinde giriş sayfasına yönlendirileceksiniz. <meta http-equiv='refresh' content='5;URL=index.php'></div>";
               
            }
        ?>
		
<h2><strong>

</strong></h2></div></div></body></html>