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
 
$page = "update";
$version = 2;
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
	
	$newversion = $version+1;
	$contents = file_get_contents("http://wpress.top/update/$newversion.html");
$search   = <<<EOF
mui
EOF;

	if (strpos($contents, $search) === FALSE) {
		$update = "guncel";
	}
	else {
		$update = "gunceldegil";
		$gunic = file_get_contents("http://wpress.top/update/$newversion.html");
	}
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
        <br />
       <h1 class="baslik"><i class="fa fa-wrench" aria-hidden="true"></i> Güncelleme Kontrolü</h1><br />
	   <div class="mui-panel" style="width: 47%; float: left;">
	   <div class="mui--text-dark-secondary mui--text-display2">Project Safe Durumu:<?php if($update == "guncel") { echo "<div style='color:#4CAF50; margin-top:10px;'>Sürüm: $version.0<br /><i class='fa fa-check-circle' aria-hidden='true'></i> Güncel</div>"; } elseif ($update == "gunceldegil") { echo "<div style='color:#F44336; margin-top:10px;'>Yüklü Sürüm: $version.0<br />Güncel Sürüm: $newversion.0<br /> Güncelleme Mevcut!</div>"; } ?></div>
		</div>
		<?php if ($update == "gunceldegil") {
		echo "<div class='mui-panel' style='width: 47%; float: right;'><div class='mui--text-dark-secondary mui--text-display2' style='margin-bottom:10px;'>Güncelleme İçeriği:</div> $gunic</div>";
		} ?>
      </div>
    </div>
<?php include "inc/cr.html"; ?>
  </body>

</html>

<?php } ?>