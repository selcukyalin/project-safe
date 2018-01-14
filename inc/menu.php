	<div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height"><i class="fa fa-lock" aria-hidden="true"></i> Yönetim Paneli</div>
      <div class="mui-divider"></div>
      <ul>
			<li><strong><a href="panel.php" <?php if($page != "home") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-home" aria-hidden="true"></i> Ana Sayfa</a></strong></li>
			<li>
			<?php if($page == "mlog" or $page == "ipek" or $page == "ipka") {echo "<strong style='color:#00bcd4;'><i class='fa fa-tasks' aria-hidden='true'></i>  Kayıtlı IP Adresi İşlemleri"; } else { echo "<strong><i class='fa fa-tasks' aria-hidden='true'></i>  Kayıtlı IP Adresi İşlemleri"; } ?></strong>
				<ul style="display: none;" >
					<li><a href="mlog.php" <?php if($page != "mlog") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-eye" aria-hidden="true"></i> Görüntüle</a></li>
					<li><a href="ipek.php" <?php if($page != "ipek") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a></li>
					<li><a href="ipka.php" <?php if($page != "ipka") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-times" aria-hidden="true"></i> Kaldır</a></li>
				</ul>
			</li>
			<li>
			<?php if($page == "ygor" or $page == "yonek" or $page == "yonsil" or $page == "ngor" or $page == "usek" or $page == "stsil" or $page == "mpwc" or $page == "spwc") { echo "<strong style='color:#00bcd4;'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Kullanıcıları Yönet"; } else { echo "<strong><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Kullanıcıları Yönet"; } ?></strong>
				<ul>
					<li <?php if($page == "ygor" or $page == "yonek" or $page == "yonsil" or $page == "mpwc") { echo " style='color:#00bcd4;'";} ?>><i class="fa fa-user-secret" aria-hidden="true"></i> Yönetici</li>
						<ul>
							<li><a href="ygor.php" <?php if($page != "ygor") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-eye" aria-hidden="true"></i> Görüntüle</a></li>
							<li><a href="yonek.php" <?php if($page != "yonek") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a></li>
							<li><a href="yonsil.php" <?php if($page != "yonsil") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-times" aria-hidden="true"></i> Kaldır</a></li>
							<li><a href="mpwc.php" <?php if($page != "mpwc") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-key" aria-hidden="true"></i> Şifre Değiştir</a></li>
						</ul>
					<li <?php if($page == "ngor" or $page == "usek" or $page == "stsil" or $page == "spwc") { echo " style='color:#00bcd4;'";} ?>><i class="fa fa-user" aria-hidden="true"></i> Standart</li>
						<ul>
							<li><a href="ngor.php" <?php if($page != "ngor") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-eye" aria-hidden="true"></i> Görüntüle</a></li>
							<li><a href="usek.php" <?php if($page != "usek") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a></li>
							<li><a href="stsil.php" <?php if($page != "stsil") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-times" aria-hidden="true"></i> Kaldır</a></li>
							<li><a href="spwc.php" <?php if($page != "spwc") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-key" aria-hidden="true"></i> Şifre Değiştir</a></li>
						</ul>
				</ul>
			</li>
			<li><strong><a href="ayarlar.php" <?php if($page != "ayarlar") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-wrench" aria-hidden="true"></i> Ayarlar</a></strong></li>
			<li><strong><a href="update.php" <?php if($page != "update") {echo " style='color:rgba(0,0,0,.87);'"; } ?>><i class="fa fa-cog" aria-hidden="true"></i> Güncelleme</a></strong></li>
			<li><strong><a href="cikis.php" style='color:rgba(0,0,0,.87);'><i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış</a></strong></li>
      </ul>
    </div>