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
 * @dosya-surumu 2.0
 */
	error_reporting(0);
	@session_start();
 	if($_SESSION["logged"] != "true") {
		echo "<div style='text-align:center; margin-top: 100px; font-size: 24px;'>Bu sayfaya erişebilmek için yönetici yetkisiyle giriş yapmalısınız.<br /> Eğer önceden giriş yaptıysanız lisans sorunu yaşıyor olabilirsiniz. Yazılımı satın aldığınız yere başvurun.<br /> 10 saniye içinde yönetim giriş sayfasına yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='10;URL=../moderate.php'>";
		die();
	}
	else {
		
	$ipkona = $_POST["ipkonabir"];
	$isyon = $_POST["isyon"];
	$wpayon = $_POST["wpayon"];
	$psap = $_POST["psa"];
	$destekp = $_POST["destek"];
	include "iset.php";
	include "wpset.php";
	include "../../wp-content/plugins/project-safe/psa.php";
	
	if ($psa != $psap && !empty($psa)) {
		$psakk = fopen('../../wp-content/plugins/project-safe/psa.php', 'w');
		fwrite($psakk, "<?php \$psa = '$psap'; ?>");
		fclose($psakk);
		rename("../../$psa", "../../$psap");
		$_SESSION["ipekais"] = "ayark";
		header("Location: ../../$psap/eksonuc.php");
		die();
	}
	
	if (!file_exists("../../wp-content/plugins/project-safe/destek.txt") && isset($destekp)) {
		$dkayit = fopen("../../wp-content/plugins/project-safe/destek.txt", "w");
		fclose($dkayit);
		$_SESSION["ipekais"] = "ayark";
		header("Location: ../eksonuc.php");
		die();
	}
	
	if ($wpayon != $wpsetdizin && $ipkona == "iki" && $wpayon != "//") {
		$wpayonk = fopen('wpset.php', 'w');
		fwrite($wpayonk, "<?php \$wpsetdizin = \"$wpayon\"; ?>");
		fclose($wpayonk);
	}
	if ($wpayon != $wpsetdizin && $wpayon == '//') {
		$wpayonk = fopen('wpset.php', 'w');
		fwrite($wpayonk, "<?php \$wpsetdizin = ''; ?>");
		fclose($wpayonk);
	}
	
	if ($isyon != $isetdizin && $isyon != "//") {
		$isyonk = fopen('iset.php', 'w');
		fwrite($isyonk, "<?php \$isetdizin = \"$isyon\"; ?>");
		fclose($isyonk);
	}
	if ($isyon != $isetdizin && $isyon == "//") {
		$isyonk = fopen('iset.php', 'w');
		fwrite($isyonk, "<?php \$isetdizin = ''; ?>");
		fclose($isyonk);
	}
	
	if ($ipkona == "iki" && !file_exists("abir.txt")) {
				$akayit = fopen("abir.txt", "w");
				fclose($akayit);
				unset($_POST["wpayon"]);
				unset($_POST["isyon"]);
				unset($_POST["ipkonabir"]);
				header("Location: ../ayarlar.php");
				die();
	}
	if (file_exists("abir.txt") && $ipkona == "bir") {
		unlink("abir.txt");
		unset($_POST["wpayon"]);
		unset($_POST["isyon"]);
		unset($_POST["ipkonabir"]);
		header("Location: ../ayarlar.php");
		die();
	}
	if (isset($_POST["ssl"]) && !file_exists("ssl.txt")) {
		$ssli = "RewriteEngine On" . PHP_EOL . "RewriteCond %{SERVER_PORT} 80" . PHP_EOL . "RewriteRule ^(.*)$ https://" . $_SERVER['HTTP_HOST'] . "/$1 [R,L]";
		$sslik = fopen('../.htaccess', 'w');
		fwrite($sslik, $ssli);
		fclose($sslik);
		$skayit = fopen("ssl.txt", "w");
		fclose($skayit);
		$_SESSION["ipekais"] = "sslon";
		header("Location: ../eksonuc.php");
		die();
	}
	if (!isset($_POST["ssl"]) && file_exists("ssl.txt")) {
	unlink ("../.htaccess");
	unlink("ssl.txt");
	$_SESSION["ipekais"] = "ayarssloff";
	header("Location: ../eksonuc.php");
	die();
	}
	
	unset($_POST["wpayon"]);
	unset($_POST["isyon"]);
	unset($_POST["ipkonabir"]);
	$_SESSION["ipekais"] = "ayark";
	header("Location: ../eksonuc.php");
	die();
	}
?>	