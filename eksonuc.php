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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow">
<title>Yönetim Paneli</title>
<link rel="stylesheet" type="text/css" href="panel.css" />
<script type="text/javascript" src="jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="inc/font-awesome.min.css" />
<link href="inc/mui.css" rel="stylesheet" type="text/css" />
<script src="inc/mui.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
jQuery(function($) {
  var $bodyEl = $('body'),
      $sidedrawerEl = $('#sidedrawer');
  function showSidedrawer() {
    var options = {
      onclose: function() {
        $sidedrawerEl
          .removeClass('active')
          .appendTo(document.body);
      }
    };
    var $overlayEl = $(mui.overlay('on', options));
    $sidedrawerEl.appendTo($overlayEl);
    setTimeout(function() {
      $sidedrawerEl.addClass('active');
    }, 20);
  }
  function hideSidedrawer() {
    $bodyEl.toggleClass('hide-sidedrawer');
  }
  $('.js-show-sidedrawer').on('click', showSidedrawer);
  $('.js-hide-sidedrawer').on('click', hideSidedrawer);
  var $titleEls = $('strong', $sidedrawerEl);
  $titleEls
    .next()
    .hide();
  $titleEls.on('click', function() {
    $(this).next().slideToggle(200);
  });
});
</script>
</head>

<body>
<?php
	error_reporting(0);
	session_start();
	if($_SESSION["logged"] != "true") {
		echo "<div class='mui-appbar mui--appbar-line-height'><div class='mui-container-fluid'><a class='sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer'>☰</a><a class='sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer'>☰</a><span class='mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block'>Yönetim Paneli</span></div></div><div class='icrfr'><i class='fa fa-hand-paper-o' style='font-size:300%;' aria-hidden='true'></i><br /><br />Bu sayfaya erişebilmek için yönetici yetkisiyle giriş yapmalısınız.<br /> Eğer önceden giriş yaptıysanız lisans sorunu yaşıyor olabilirsiniz. Yazılımı satın aldığınız yere başvurun.<br /> 10 saniye içinde yönetim giriş sayfasına yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='10;URL=moderate.php'>";
		die();
	}
	else {
	include "inc/menu.php";
?>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
          <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block">Yönetim Paneli</span>
        </div>
      </div>
    </header>
    <div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
	  <div style="font-size: 200%; text-align:center; padding-top: 50px;">
<?php
@session_start();
if ($_SESSION["ipekais"] == "tumsil") {
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br />Kayıtlı tüm IP adresleri başarıyla silindi!";
	unset($_SESSION['ipekais']);
}

elseif ($_SESSION["ipekais"] == "ipekle") {
	$eklenenip = $_SESSION["eklenenip"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>$eklenenip</b> numaralı IP adresine Wordpress yönetim paneli giriş izni verme işlemi başarıyla tamamlandı!";
	unset($_SESSION['eklenenip']);
	unset($_SESSION['ipekais']);
}

elseif ($_SESSION["ipekais"] == "ipeklezk") {
	$eklenenip = $_SESSION["eklenenip"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br /><b>$eklenenip</b> numaralı IP adresinin Wordpress yönetim paneli giriş izni zaten mevcut. <br />Herhangi bir işlem yapılamadı.";
	unset($_SESSION['eklenenip']);
	unset($_SESSION['ipekais']);
}

elseif ($_SESSION["ipekais"] == "ipsil") {
	$silinenip = $_SESSION["silinenip"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>$silinenip</b> numaralı IP adresinin Wordpress yönetim paneline giriş izni başarıyla silindi!";
	unset($_SESSION['ipekais']);
	unset ($_SESSION["silinenip"]);
}

elseif ($_SESSION["ipekais"] == "ipsilzk") {
	$silinenip = $_SESSION["silinenip"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br /><b>$silinenip</b> numaralı IP adresi zaten kayıtlı değil. <br />Herhangi bir işlem yapılamadı.";
	unset($_SESSION['ipekais']);
	unset ($_SESSION["silinenip"]);
}

elseif ($_SESSION["ipekais"] == "selfip") {
	$ipadresim = $_SESSION["kendiip"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br />IP adresinize <b>($ipadresim)</b> Wordpress yönetim paneli giriş izni başarıyla verildi!";
	unset($_SESSION['ipekais']);
	unset($_SESSION['kendiip']);
}

elseif ($_SESSION["ipekais"] == "selfipzk") {
	$ipadresim = $_SESSION["kendiip"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br />IP adresinizin <b>($ipadresim)</b> Wordpress yönetim paneline giriş izni zaten bulunmakta. <br />Herhangi bir işlem yapılamadı.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['kendiip']);
}

elseif ($_SESSION["ipekais"] == "yonkzv") {
	$dkadi = $_SESSION["ekmodkadi"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br />Eklemeye çalıştığınız <b>\"$dkadi\"</b> kullanıcı adını taşıyan bir yönetici hesabı zaten mevcut. <br />Herhangi bir işlem yapılamadı.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['ekmodkadi']);
}

elseif ($_SESSION["ipekais"] == "yonk") {
	$modisim = $_SESSION["modisim"];
	$ekmodkadi = $_SESSION["ekmodkadi"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>$modisim</b> kişisine ait <b>\"$ekmodkadi\"</b> kullanıcı adlı yönetici hesabı oluşturuldu.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['modisim']);
	unset($_SESSION['ekmodkadi']);
}

elseif ($_SESSION["ipekais"] == "stzv") {
	$stkadi = $_SESSION["stkadi"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br />Eklemeye çalıştığınız <b>\"$stkadi\"</b> kullanıcı adını taşıyan bir standart hesap zaten mevcut. <br />Herhangi bir işlem yapılamadı.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['stkadi']);
}

elseif ($_SESSION["ipekais"] == "stkek") {
	$stkadi = $_SESSION["stkadi"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>\"$stkadi\"</b> kullanıcı adlı standart hesap oluşturuldu.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['stkadi']);
}

elseif ($_SESSION["ipekais"] == "ysilzy") {
	$silyon = $_SESSION["silinenkad"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br />Silmeye çalıştığınız <b>\"$silyon\"</b> kullanıcı adlı yönetici hesabı bulunamadı. <br />Daha önceden silinmiş olabilir.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['silinenkad']);
}

elseif ($_SESSION["ipekais"] == "ysil") {
	$silyon = $_SESSION["silinenkad"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>\"$silyon\"</b> kullanıcı adlı yönetici hesabı başarıyla silindi.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['silinenkad']);
}

elseif ($_SESSION["ipekais"] == "nsilzy") {
	$siln = $_SESSION["silinenn"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br />Silmeye çalıştığınız <b>\"$siln\"</b> kullanıcı adlı standart hesap bulunamadı. <br />Daha önceden silinmiş olabilir.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['silinenn']);
}

elseif ($_SESSION["ipekais"] == "nsil") {
	$siln = $_SESSION["silinenn"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>\"$siln\"</b> kullanıcı adlı standart hesap başarıyla silindi.";
	unset($_SESSION['ipekais']);
	unset($_SESSION['silinenn']);
}

elseif ($_SESSION["ipekais"] == "ayark") {
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br />Yaptığınız ayarlar başarıyla kaydedildi.";
	unset($_SESSION['ipekais']);
	$_SESSION["ipekais"] = "ayarf";
	echo "<meta http-equiv='refresh' content='0;URL=eksonuc.php'>";	
}

elseif ($_SESSION["ipekais"] == "ayarf") {
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br />Yaptığınız ayarlar başarıyla kaydedildi.";
	unset($_SESSION['ipekais']);
}

elseif ($_SESSION["ipekais"] == "ayarssloff") {
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br />Yaptığınız ayarlar başarıyla kaydedildi.";
	unset($_SESSION['ipekais']);
	$_SESSION["ipekais"] = "ayarf";
	$urly = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	echo "<meta http-equiv='refresh' content='0;URL=http://$urly'>";	
}

elseif ($_SESSION["ipekais"] == "sslon") {
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br />Yaptığınız ayarlar başarıyla kaydedildi.";
	unset($_SESSION['ipekais']);
	$_SESSION["ipekais"] = "ayarf";
	$urly = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	echo "<meta http-equiv='refresh' content='0;URL=https://$urly'>";	
}

elseif ($_SESSION["ipekais"] == "cikis") {
	$isim = $_SESSION["isim"];
	echo "<i class='fa fa-hand-paper-o' style='font-size:300%;' aria-hidden='true'></i><br /><br />Çıkış işleminiz gerçekleştiriliyor <b>$isim,</b><br /><br/> Wordpress yönetim paneline yönlendiriliyorsunuz...";
	unset($_SESSION['ipekais']);
	unset($_SESSION['logged']);
	unset($_SESSION['isim']);
	echo "<meta http-equiv='refresh' content='5;URL=../wp-admin'>";
	die();
}

elseif ($_SESSION["ipekais"] == "mckb") {
	$dmkad = $_SESSION["dmkad"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br /><b>$dmkad</b> kullanıcı adlı bir yönetici hesabı bulunamadı. ";
	unset($_SESSION['ipekais']);
	unset($_SESSION['dmkad']);
}

elseif ($_SESSION["ipekais"] == "mcpw") {
	$dmkad = $_SESSION["dmkad"];
	$ckisim = $_SESSION["ckisim"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>$ckisim</b> kişisine ait <b>$dmkad</b> kullanıcı adlı yönetici hesabının şifresi başarıyla değiştirildi. ";
	unset($_SESSION['ipekais']);
	unset($_SESSION['dmkad']);
	unset($_SESSION['ckisim']);
}

elseif ($_SESSION["ipekais"] == "sckb") {
	$dskad = $_SESSION["dskad"];
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br /><b>$dskad</b> kullanıcı adlı bir standart hesap bulunamadı. ";
	unset($_SESSION['ipekais']);
	unset($_SESSION['dskad']);
}

elseif ($_SESSION["ipekais"] == "scpw") {
	$dskad = $_SESSION["dskad"];
	echo "<img src='images/basarili.png' alt='işlem başarılı' /><br /><br /><b>$dskad</b> kullanıcı adlı standart hesabının şifresi başarıyla değiştirildi. ";
	unset($_SESSION['ipekais']);
	unset($_SESSION['dskad']);
}

else {
	echo "<img src='images/basarisiz.png' alt='işlem başarısız' /><br /><br /><b>Hata!</b><br /> Herhangi bir işlem gerçekleştirilmedi, lütfen tekrar deneyin.";
}
?>
</div>
</div>
</div>
<?php include "inc/cr.html"; ?>
</body>
</html>
<?php } ?>