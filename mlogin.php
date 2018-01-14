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
<h1 class="h1lel">IP YÖNETİM SİSTEMİ</h1>

<?php
		session_start();
		$mid = $_POST['mid'];
		$mppas = $_POST['mpassw'];
		include("users/mod/$mid.php");
            if (md5($mppas) == $mpass && $_POST['mcheck'] == $_SESSION['digit']) {
				$_SESSION["logged"] = "true";
				$_SESSION["isim"] = $isim;
				echo "<div style='font-size:40px; text-align:center; margin-top: 140px; color: #fff;'><img src='images/loading.png' alt='yükleniyor' /><br /><br />Sayfa yükleniyor lütfen bekleyin...</div>";
				echo "<meta http-equiv='refresh' content='0;URL=panel.php'>";
			}
			else {
				unset($_SESSION["logged"]);
				unset($_SESSION["isim"]);
				echo "<div class='icrfr'><br /><br />ID numaranızı, şifrenizi veya güvenlik kodunu yanlış yazdınız. <br /> 5 saniye içinde yönetim giriş sayfasına yönlendirileceksiniz. <meta http-equiv='refresh' content='5;URL=moderate.php'></div>"; 
			}
?>

</body>

</html>