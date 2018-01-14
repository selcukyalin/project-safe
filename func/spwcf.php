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
	error_reporting(0);
	session_start();
	if($_SESSION["logged"] != "true") {
		echo "<div class='mui-appbar mui--appbar-line-height'><div class='mui-container-fluid'><a class='sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer'>?</a><a class='sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer'>?</a><span class='mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block'>Yönetim Paneli</span></div></div><div class='icrfr'><i class='fa fa-hand-paper-o' style='font-size:300%;' aria-hidden='true'></i><br /><br />Bu sayfaya erişebilmek için yönetici yetkisiyle giriş yapmalısınız.<br /> Eğer önceden giriş yaptıysanız lisans sorunu yaşıyor olabilirsiniz. Yazılımı satın aldığınız yere başvurun.<br /> 10 saniye içinde yönetim giriş sayfasına yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='10;URL=moderate.php'>";
		die();
	}
	else {
	include "inc/menu.php";
	$sckad = $_POST["sckad"];
	$sckaddir = "../users/normal/$sckad.php";
	$_SESSION["dskad"] = $sckad;
	if (file_exists($sckaddir)) {
		include $sckaddir;
		$snpw = md5($_POST["snpw"]);
		$kayit = fopen($sckaddir, "w");
		fwrite($kayit, "<?php\n \$mpass = '$snpw';\n ?>");
		fclose($kayit);
		$_SESSION["ipekais"] = "scpw";
		header("Location: ../eksonuc.php");
		die();
	}
	elseif (!empty($sckad)) {
		$_SESSION["ipekais"] = "sckb";
		header("Location: ../eksonuc.php");
		die();
	}
	}
?>