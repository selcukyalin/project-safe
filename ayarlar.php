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
 
$page = "ayarlar";
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
	session_start();
	if($_SESSION["logged"] != "true") {
		echo "<div class='mui-appbar mui--appbar-line-height'><div class='mui-container-fluid'><a class='sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer'>☰</a><a class='sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer'>☰</a><span class='mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block'>Yönetim Paneli</span></div></div><div class='icrfr'><i class='fa fa-hand-paper-o' style='font-size:300%;' aria-hidden='true'></i><br /><br />Bu sayfaya erişebilmek için yönetici yetkisiyle giriş yapmalısınız.<br /> Eğer önceden giriş yaptıysanız lisans sorunu yaşıyor olabilirsiniz. Yazılımı satın aldığınız yere başvurun.<br /> 10 saniye içinde yönetim giriş sayfasına yönlendirileceksiniz.</div> <meta http-equiv='refresh' content='10;URL=moderate.php'>";
		die();
	}
	else {
	include "inc/menu.php";
	$url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'];
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
		<div class="ipeka">
		<div id="ekloginbaslikgreen" style="font-size: 350%; background-color: #4f5c62;"><i class="fa fa-cogs" aria-hidden="true"></i> Ayarlar</div>
		<form name="ipkon" action="func/ayar.php" method="POST" id="eklogin">
		<fieldset>
		<p style="font-size:110%;color:#1d8b02;"><b>Tek bir sekmede ayar değişikliği yaptıkan sonra "Kaydet" tuşuna basmayı unutmayın!</b></p>
 	<ul class="mui-tabs__bar mui-tabs__bar--justified">
		<li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Kontrol ve Yölendirme</a></li>
		<li><a data-mui-toggle="tab" data-mui-controls="pane-justified-2">Project Safe Adresi</a></li>
		<li><a data-mui-toggle="tab" data-mui-controls="pane-justified-3">SSL Ayarı</a></li>
	</ul>
	<div class="mui-tabs__pane mui--is-active" id="pane-justified-1"><br />
	<h2 style="text-align:center;font-size:150%;"><b>IP</b> adresi kaydı nerelerde kontrol edilsin:</h2></br />
			<select name="ipkonabir" style="font-size:140%;">
				<?php 
				if(file_exists("func/abir.txt")) {
					echo "<option value='iki'>Giriş ve WP-Admin içerisinde kontrol et</option><option value='bir'>Sadece giriş sayfasında kontrol et</option>";
				}
				else {
					echo "<option value='bir'>Sadece giriş sayfasında kontrol et</option><option value='iki'>Giriş ve WP-Admin içerisinde kontrol et</option>";
				}
				?>
		</select>
		<p style="margin-top:8px; color:#ff0000;">Daha yüksek güvenlik için "Giriş ve WP-Admin içerisinde kontrol et" seçeneği tavsiye edilir.<br /> Bu seçenek, eğer statik IP kullanıyorsanız, IP adresinizi daha sık kaydetmenizi gerektirebilir.</p>
		<hr>
				<h2 style="text-align:center;font-size:130%;"><b>WP-Admin</b> Dizininin ve <b>WP-Login</b> Dosyasının Yönlendireceği Adres</h2></br />
		<p><label for="text" style="font-size:140%;">IP adresi kayıtlı değilse: <?php if(file_exists("func/abir.txt")) { echo "(Wordpress girişi yapılı değil)"; } ?></label></p>
		<p><label for="text" style="font-size:140%;"><?php echo $url; ?>/</label><input style="font-size:150%; width:30%;" type="text" value="<?php include "func/iset.php"; echo "$isetdizin"; ?>" name="isyon" /></p>
		<?php if(file_exists("func/abir.txt")) {
			include "func/wpset.php";
			echo "
			<p><label for='text' style='font-size:175%;'>IP adresi kayıtlı değilse: (Wordpress girişi yapılı)</label></p>
			<p><label for='text' style='font-size:175%;'>".$url."/</label><input style='font-size:150%; width:30%;' type='text' value='$wpsetdizin' name='wpayon' /></p>
			<p style='margin-top:8px; color:#ff0000;'>Ana sayfaya yönlendirmek için boş bırakmak yerine <b style='font-size:120%;color:#28394d;'>//</b> yazın.</p>";
		} ?>
	</div>
	<div class="mui-tabs__pane" id="pane-justified-2"><br />
		<p><label for='text' style='font-size:175%;'>Project Safe Paneline Giriş Adresi:</label></p>
		<p><label for="text" style="font-size:140%;"><?php echo $url; ?>/</label><input style="font-size:150%; width:30%;" type="text" value="<?php include "../wp-content/plugins/project-safe/psa.php"; echo "$psa"; ?>" name="psa" /></p>
		<p style="margin-top:8px; color:#ff0000;">Varsayılan adresi değiştirmeniz güvenliğiniz için tavsiye edilir.</p>
		<p style="margin-top:8px; color:#ff0000;">Yeni dizin Türkçe ve özel karakter içeremez, boş bırakılamaz.</p>
	</div>
	<div class="mui-tabs__pane" id="pane-justified-3"><br />
		<p><label for="text" style="font-size:140%;"><input type="checkbox" name="ssl" <?php if (file_exists("func/ssl.txt")) { echo "checked"; } ?>/> SSL (https) kullanmaya zorla</label></p>
		<p style="margin-top:8px; color:#ff0000;">SSL kullanmayı bıraktığınızda veya SSL sertifikanızda bir sorun olduğunda eğer bu ayar açık kaldıysa:<br /> "ip" klasörü içindeki .htaccess dosyasını silmeniz, sonrasında buraya gelerek bu ayarı kapatmanız gerekir.</p>
	</div>
		<input type="submit" style="background-color: #4f5c62;" value="Kaydet">
		</form>
		</fieldset>				
		</div>
      </div>
    </div>
<?php include "inc/cr.html"; ?>
  </body>

</html>

<?php } ?>