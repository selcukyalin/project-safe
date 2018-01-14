# project-safe
Project Safe - Wordpress Güvenlik Eklentisi

Adım 1:
eklenti.zip dosyasını arşivden dışarı çıkardıktan sonra WordPress yönetim panelindeki “Eklentiler -> Yeni Ekle” kısmından Eklenti Yükle’ye gelin ve “eklenti.zip” dosyasını seçip yükleyin.

Adım 2:
Wordpress yönetim panelinden “Eklentiler -> Yüklü eklentiler” kısmına gelin, Project Safe isimli eklentiyi bulun ve “Etkinleştir” butonuna tıklayın.

Adım 3:
http://siteniz.com/ip/moderate.php (siteniz.com kısmını değiştirin) adresine gidin, sağ üstteki “Yönetim’e Git” tuşuna tıkalyın. Kullanıcı adı: 1 ve Şifre: 123 şeklinde giriş yapın. Önce kendinize yeni bir yönetici hesabı oluşturun sonra giriş yaptığınız “1” kullanıcı adına sahip olan hesabı silin ve daha sonrasında menüden ayarlara giderek eklentiyi kullanımınıza uygun olacak şekilde yapılandırın.

Adım 4:
Güvenlik nedenleriyle "Options -Indexes" kodunu içeren bir .htaccess dosyasını aşağıdaki dizinlere aktarmanız gerekmekte:

/func

/images

/inc

/kayit

/users

/users/mod

/users/normal

