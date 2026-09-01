# 🏢 Apartman Ziyaretçi Yönetim Sistemi

Apartman, site veya bina girişlerinde ziyaretçi kayıtlarını yönetmek
için hazırlanmış web tabanlı bir **Apartman Ziyaretçi Yönetim Sistemi**.

Proje; yöneticinin apartman/daire bilgilerini yönetmesini, ziyaretçi
giriş ve çıkışlarını kaydetmesini, kayıtları görüntülemesini ve
raporlamasını sağlayan klasik bir PHP + MySQL yapısına sahiptir. Yönetim
arayüzünde **AdminLTE** tabanlı responsive bir panel kullanılmaktadır.

> **Not:** Proje mevcut dosya yapısı ve bağımlılıklarıyla birlikte
> eski/legacy bir PHP sürümünü hedeflemektedir. Canlı kullanımdan önce
> güvenlik ve uyumluluk açısından güncellenmesi önerilir.

## ✨ Özellikler

-   🔐 Yönetici giriş sistemi
-   📊 Gösterge paneli
    -   Toplam ziyaretçi sayısı
    -   Günlük ziyaretçi sayısı
    -   Dolu apartman sayısı
    -   Boş apartman sayısı
-   🏢 Apartman/daire yönetimi
-   ➕ Yeni ziyaretçi kaydı oluşturma
-   🚪 Ziyaretçi çıkışı kaydetme
-   👥 Ziyaretçi kayıtlarını listeleme ve detaylarını görüntüleme
-   🔎 İsim veya iletişim bilgisine göre ziyaretçi arama
-   📄 Ziyaretçi raporları
-   👤 Yönetici profil bilgileri
-   🔑 Şifre değiştirme ve şifre kurtarma sayfaları
-   📱 Responsive yönetim paneli

## 🛠️ Kullanılan Teknolojiler

-   **PHP**
-   **MySQL / MariaDB**
-   **HTML5 / CSS3**
-   **JavaScript / jQuery**
-   **Bootstrap 3**
-   **AdminLTE**
-   **DataTables**
-   **Font Awesome**
-   **Ionicons**
-   **Morris.js**

## 📁 Proje Yapısı

``` text
.
├── Apartman Ziyaretçi/
│   ├── index.php
│   ├── dashboard.php
│   ├── visitor-entry.php
│   ├── checkout_visitor.php
│   ├── visitor-mgmt.php
│   ├── manage-apartment.php
│   ├── report.php
│   ├── profile.php
│   ├── includes/
│   ├── counters/
│   ├── DATABASE FILE/
│   │   └── apartment-visitor-nb.sql
│   ├── dist/
│   ├── plugins/
│   └── bower_components/
│
└── Sayfa Görüntüleri/
    ├── index.png
    ├── dashboard.png
    ├── visitor-entry.png
    ├── checkout_visiton.png
    ├── visitor-mgmt.png
    ├── action-visitor.png
    ├── manage-apartment.png
    ├── add-apartment.png
    ├── edit-apartment.png
    ├── report.png
    ├── view-report.png
    ├── search-result.png
    ├── profile.png
    ├── change-password.png
    ├── forgotpw.png
    ├── password-recovery.png
    └── layout-ayarlari.png
```

## 🚀 Kurulum

### 1. Projeyi web sunucusuna yerleştirin

Projeyi Apache/XAMPP gibi bir PHP web sunucusunun web dizinine
kopyalayın.

Örnek:

``` text
htdocs/
└── Apartman Ziyaretçi/
```

### 2. Veritabanını oluşturun

MySQL veya MariaDB üzerinde:

``` text
DATABASE FILE/apartment-visitor-nb.sql
```

dosyasını içe aktarın.

Veritabanının adı:

``` text
apartment-visitor-nb
```

### 3. Veritabanı bağlantısını kontrol edin

Bağlantı ayarları:

``` text
includes/dbconn.php
```

dosyasında bulunmaktadır.

Varsayılan yapı:

``` text
Host: localhost
User: root
Password: boş
Database: apartment-visitor-nb
```

Kendi sunucunuzun MySQL bilgilerine göre bu değerleri değiştirin.

### 4. Sistemi açın

Tarayıcıdan proje klasörüne giderek giriş sayfasını açabilirsiniz:

``` text
http://localhost/Apartman%20Ziyaretçi/
```

## 🖼️ Sayfa Görüntüleri

Aşağıdaki ekran görüntüleri `Sayfa Görüntüleri` klasöründen yüklenir.
Böylece GitHub reposuna giren kişiler kaynak dosyalarını açmadan arayüzü
doğrudan inceleyebilir.

### 🔐 Giriş

  --------------------------------------------------------------------------------------
  Giriş Sayfası
  --------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/index.png" alt="Giriş Sayfası" width="700">`{=html}

  --------------------------------------------------------------------------------------

### 📊 Yönetim Paneli

  -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Gösterge Paneli                                                                              Ziyaretçi Yönetimi
  -------------------------------------------------------------------------------------------- --------------------------------------------------------------------------------------------------
  `<img src="./Sayfa Görüntüleri/dashboard.png" alt="Gösterge Paneli" width="500">`{=html}   `<img src="./Sayfa%20Görüntüleri/visitor-mgmt.png" alt="Ziyaretçi Yönetimi" width="500">`{=html}

  -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### 👥 Ziyaretçi İşlemleri

  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Ziyaretçi Girişi                                                                                  Ziyaretçi Çıkışı
  ------------------------------------------------------------------------------------------------- ----------------------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/visitor-entry.png" alt="Ziyaretçi Girişi" width="500">`{=html}   `<img src="./Sayfa%20Görüntüleri/checkout_visiton.png" alt="Ziyaretçi Çıkışı" width="500">`{=html}

  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Ziyaretçi Detayı                                                                                   Ziyaretçi Detay İşlemleri
  -------------------------------------------------------------------------------------------------- -------------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/action-visitor.png" alt="Ziyaretçi Detayı" width="500">`{=html}   `<img src="./Sayfa%20Görüntüleri/view-report.png" alt="Rapor Detayı" width="500">`{=html}

  ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### 🏢 Apartman Yönetimi

  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Apartman Yönetimi                                                                                     Apartman Ekleme
  ----------------------------------------------------------------------------------------------------- ------------------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/manage-apartment.png" alt="Apartman Yönetimi" width="500">`{=html}   `<img src="./Sayfa%20Görüntüleri/add-apartment.png" alt="Apartman Ekleme" width="500">`{=html}

  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  ----------------------------------------------------------------------------------------------------
  Apartman Düzenleme
  ----------------------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/edit-apartment.png" alt="Apartman Düzenleme" width="700">`{=html}

  ----------------------------------------------------------------------------------------------------

### 📄 Raporlar ve Arama

  -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Raporlar                                                                           Arama Sonuçları
  ---------------------------------------------------------------------------------- ------------------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/report.png" alt="Raporlar" width="500">`{=html}   `<img src="./Sayfa%20Görüntüleri/search-result.png" alt="Arama Sonuçları" width="500">`{=html}

  -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### 👤 Profil ve Hesap İşlemleri

  -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Profil                                                                            Şifre Değiştirme
  --------------------------------------------------------------------------------- ---------------------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/profile.png" alt="Profil" width="500">`{=html}   `<img src="./Sayfa%20Görüntüleri/change-password.png" alt="Şifre Değiştirme" width="500">`{=html}

  -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  Şifremi Unuttum                                                                             Şifre Kurtarma
  ------------------------------------------------------------------------------------------- ---------------------------------------------------------------------------------------------------
  `<img src="./Sayfa%20Görüntüleri/forgotpw.png" alt="Şifremi Unuttum" width="500">`{=html}   `<img src="./Sayfa%20Görüntüleri/password-recovery.png" alt="Şifre Kurtarma" width="500">`{=html}

  -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### ⚙️ Arayüz Ayarları

`<img src="./Sayfa%20Görüntüleri/layout-ayarlari.png" alt="Layout Ayarları" width="700">`{=html}

## 🗄️ Veritabanı

Proje içerisinde hazır bir SQL dump bulunmaktadır:

``` text
DATABASE FILE/apartment-visitor-nb.sql
```

Temel tablolar:

-   `tbladmin` --- yönetici hesapları
-   `apartment` --- apartman/daire bilgileri
-   `tblvisitor` --- ziyaretçi kayıtları

SQL dosyası örnek/demo kayıtları da içermektedir.

## ⚠️ Güvenlik Notu

Bu proje eğitim, geliştirme veya yerel kullanım amacıyla
değerlendirilmelidir. İnternete açık bir sunucuda kullanmadan önce
özellikle:

-   Varsayılan yönetici hesabını ve parolasını değiştirin.
-   Veritabanı kimlik bilgilerini güvenli şekilde yapılandırın.
-   Eski parola hashleme yöntemini daha güvenli bir yönteme taşıyın.
-   SQL sorgularını prepared statement yapısına geçirin.
-   Kullanıcı girdilerini doğrulama ve filtreleme mekanizmalarını
    güçlendirin.
-   Hata mesajlarının üretim ortamında dışarıya gösterilmesini
    engelleyin.
-   Projede bulunan örnek kişisel/demo kayıtlarını canlı ortamdan
    kaldırın.

## 📌 Proje Bilgileri

-   Veritabanı: `apartment-visitor-nb`
-   Önerilen PHP sürümü: **5.6 ve üzeri**
-   Arayüz: **AdminLTE**
-   Veritabanı: **MySQL / MariaDB**

## 🙌 Kaynak

Proje dosyalarında yer alan bilgilere göre temel proje **Naseeb
Bajracharya** tarafından geliştirilmiştir. Proje içerisinde kullanılan
üçüncü taraf kütüphanelerin kendi lisanslarına da uyulmalıdır.

------------------------------------------------------------------------

⭐ Projeyi faydalı bulduysanız repository'ye bir yıldız
bırakabilirsiniz.
