🏢 Apartman Ziyaretçi Yönetim Sistemi (PHP)

Modern, hızlı ve güvenli PHP & MySQL tabanlı apartman ve site ziyaretçi kayıt ve yönetim sistemidir. Bu proje; binalara giriş-çıkış yapan ziyaretçilerin takibini kolaylaştırmak, güvenlik süreçlerini dijitalleştirmek ve site yönetiminin daire/ziyaretçi kayıtlarını pratik bir şekilde raporlamasını sağlamak amacıyla geliştirilmiştir.

📋 Proje Özellikleri

Ziyaretçi Yönetimi:

Anlık ziyaretçi kayıt oluşturma (Ad-Soyad, T.C. Kimlik / İletişim bilgileri, Araç Plakası, Giriş Zamanı).

Ziyaretçi çıkış kaydı alma ve otomatik kalış süresi hesaplama.

Geçmiş ziyaretçi kayıtlarını tarih, isim ve plakaya göre filtreleme ve arama.

Daire ve Sakin Yönetimi:

Daire bazlı sakin ve ev sahibi bilgileri tanımlama.

Ziyaret edilen daireye ve kişiye göre hızlı eşleştirme.

Kullanıcı & Yetkilendirme:

Güvenlik Görevlisi: Ziyaretçi ekleme, çıkış yapma ve anlık durum takibi.

Yönetici (Admin): Tüm daire, sakin, güvenlik personeli ve sistem ayarlarını yönetme.

Güvenli giriş ve oturum (session) yönetimi.

Raporlama ve Arayüz:

Günlük, haftalık ve aylık ziyaretçi raporları (PDF / Excel çıktı imkanı).

Mobil uyumlu (Responsive), Bootstrap / Tailwind destekli modern arayüz tasarımı.

📸 Sayfa Görüntüleri

Projenin temel ekranlarına ait görüntüler aşağıda yer almaktadır. (Görsellerin düzgün görünmesi için proje dizininde Sayfa Görüntüleri/ klasörünün bulunduğundan ve görsel isimlerinin doğru olduğundan emin olun.)

1. Ana Sayfa / Kontrol Paneli (Dashboard)

2. Ziyaretçi Kayıt Ekranı

3. Ziyaretçi Listesi ve Arama

4. Daire ve Sakin Yönetimi

🛠️ Teknolojiler

Backend: PHP (v7.4 veya üstü) / PDO

Veritabanı: MySQL / MariaDB

Frontend: HTML5, CSS3, JavaScript (Bootstrap 5 / Tailwind CSS)

Sunucu: Apache veya Nginx (XAMPP / WAMP / Wsl / MAMP destekli)

🚀 Kurulum ve Çalıştırma

Projeyi yerel ortamınızda (Localhost) çalıştırmak için aşağıdaki adımları takip edebilirsiniz:

1. Gereksinimler

XAMPP, WAMP veya PHP/MySQL destekli herhangi bir yerel sunucu.

PHP >= 7.4

MySQL Database

2. Projeyi Klonlayın veya İndirin

Projeyi htdocs (XAMPP) veya www (WAMP) klasörüne indirin:

git clone https://github.com/kullanici-adi/apartman-ziyaretci-php.git
Dosyaları yerel sunucunuzun kök dizinine taşıyın (örneğin XAMPP için htdocs/apartman-ziyaretci).

3. Veritabanı Yapılandırması
phpMyAdmin veya tercih ettiğiniz SQL istemcisini açın.

apartman_ziyaretci adında yeni bir veritabanı oluşturun.

Proje dizininde yer alan database.sql (veya schema.sql) dosyasını bu veritabanına içe aktarın (Import).

4. Bağlantı Ayarları
Projenin veritabanı bağlantı dosyasını (config/db.php veya baglan.php) açın ve veritabanı bilgilerinizi güncelleyin:

PHP
<?php
$host = "localhost";
$dbname = "apartman_ziyaretci";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
}
?>
5. Uygulamayı Başlatın
Tarayıcınızı açın ve adres çubuğuna şu adresi yazın:

Plaintext
http://localhost/apartman-ziyaretci


---

## 🔑 Varsayılan Giriş Bilgileri

Sisteme ilk defa giriş yapmak için aşağıdaki varsayılan hesap bilgilerini kullanabilirsiniz:

- **E-posta / Kullanıcı Adı:** `admin@apartman.com`
- **Şifre:** `admin123`

*(Sisteme giriş yaptıktan sonra güvenlik amacıyla şifrenizi değiştirmeniz önerilir.)*

---

## 📄 Lisans

Bu proje **MIT Lisansı** ile lisanslanmıştır. Detaylar için `LICENSE` dosyasına göz atabilirsiniz.
