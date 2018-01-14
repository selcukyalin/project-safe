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
	@session_start();
	if($_SESSION["logged"] != "true") {
		echo "<div style='text-align:center; margin-top: 100px; font-size: 24px;'>Bu sayfaya erişebilmek için yönetici yetkisiyle giriş yapmalısınız.<br /> Eğer önceden giriş yaptıysanız lisans sorunu yaşıyor olabilirsiniz. Yazılımı satın aldığınız yere başvurun.<br /> 10 saniye içinde yönetim giriş sayfasına yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='10;URL=../moderate.php'>";
		die();
	}
	else {
	
include "../functions.php";
$slnip = $_GET["ipk"];
			
			if(!file_exists("../kayit/$slnip.txt")) {
					$_SESSION["silinenip"] = $slnip;
					$_SESSION["ipekais"] = "ipsilzk";
			}

			else {
					unlink("../kayit/$slnip.txt");
					$_SESSION["silinenip"] = $slnip;
					$_SESSION["ipekais"] = "ipsil";
			}
			
		header("Location: ../eksonuc.php");
		die();
	}
?>	