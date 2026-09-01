# 🏢 Apartman Ziyaretçi Yönetim Sistemi

Apartman, site veya bina girişlerindeki ziyaretçi kayıtlarını yönetmek için hazırlanmış web tabanlı bir **Apartman Ziyaretçi Yönetim Sistemi**.

Sistem; ziyaretçi giriş/çıkışlarının kaydedilmesi, apartman ve daire bilgilerinin yönetilmesi, ziyaretçi kayıtlarının incelenmesi, arama yapılması ve raporların görüntülenmesi gibi işlemleri tek bir yönetim paneli üzerinden gerçekleştirmeyi amaçlar.

## ✨ Özellikler

- 🔐 Yönetici giriş sistemi
- 📊 Yönetim paneli
- 👥 Ziyaretçi giriş kaydı oluşturma
- 🚪 Ziyaretçi çıkış işlemleri
- 🔎 Ziyaretçi arama
- 📄 Ziyaretçi raporları ve detayları
- 🏢 Apartman/daire yönetimi
- ➕ Apartman ekleme
- ✏️ Apartman bilgilerini düzenleme
- 👤 Yönetici profil yönetimi
- 🔑 Şifre değiştirme
- 🔄 Şifre kurtarma
- 📱 Responsive yönetim arayüzü

## 🛠️ Kullanılan Teknolojiler

- **PHP**
- **MySQL / MariaDB**
- **HTML5**
- **CSS3**
- **JavaScript / jQuery**
- **Bootstrap**
- **AdminLTE**
- **DataTables**
- **Font Awesome**
- **Ionicons**
- **Morris.js**

## 📁 Proje Yapısı

```text
.
├── Apartman Ziyaretçi/
│   ├── index.php
│   ├── dashboard.php
│   ├── visitor-entry.php
│   ├── checkout_visitor.php
│   ├── visitor-mgmt.php
│   ├── manage-apartment.php
│   ├── add-apartment.php
│   ├── edit-apartment.php
│   ├── action-visitor.php
│   ├── report.php
│   ├── view-report.php
│   ├── profile.php
│   ├── change-password.php
│   ├── forgotpw.php
│   ├── password-recovery.php
│   ├── includes/
│   ├── counters/
│   ├── dist/
│   ├── plugins/
│   ├── bower_components/
│   └── DATABASE FILE/
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

> **Önemli:** `Sayfa Görüntüleri` klasörü README.md ile aynı seviyede bulunmalıdır. Aşağıdaki görseller GitHub üzerinde bu klasördeki dosyalardan otomatik olarak gösterilir.

---

# 🖼️ Sayfa Görüntüleri

## 🔐 Giriş Sayfası

![Giriş Sayfası](<Sayfa Görüntüleri/index.png>)

---

## 📊 Dashboard

![Dashboard](<Sayfa Görüntüleri/dashboard.png>)

---

## 👥 Ziyaretçi Yönetimi

![Ziyaretçi Yönetimi](<Sayfa Görüntüleri/visitor-mgmt.png>)

### Ziyaretçi Girişi

![Ziyaretçi Girişi](<Sayfa Görüntüleri/visitor-entry.png>)

### Ziyaretçi Çıkışı

![Ziyaretçi Çıkışı](<Sayfa Görüntüleri/checkout_visitor.png>)

### Ziyaretçi İşlemleri

![Ziyaretçi İşlemleri](<Sayfa Görüntüleri/action-visitor.png>)

---

## 🏢 Apartman Yönetimi

### Apartman Yönetimi

![Apartman Yönetimi](<Sayfa Görüntüleri/manage-apartment.png>)

### Apartman Ekleme

![Apartman Ekleme](<Sayfa Görüntüleri/add-apartment.png>)

### Apartman Düzenleme

![Apartman Düzenleme](<Sayfa Görüntüleri/edit-apartment.png>)

---

## 📄 Raporlama

### Raporlar

![Raporlar](<Sayfa Görüntüleri/report.png>)

### Rapor Detayı

![Rapor Detayı](<Sayfa Görüntüleri/view-report.png>)

### Arama Sonuçları

![Arama Sonuçları](<Sayfa Görüntüleri/search-result.png>)

---

## 👤 Profil ve Hesap İşlemleri

### Profil

![Profil](<Sayfa Görüntüleri/profile.png>)

### Şifre Değiştirme

![Şifre Değiştirme](<Sayfa Görüntüleri/change-password.png>)

### Şifremi Unuttum

![Şifremi Unuttum](<Sayfa Görüntüleri/forgotpw.png>)

### Şifre Kurtarma

![Şifre Kurtarma](<Sayfa Görüntüleri/password-recovery.png>)

---

## ⚙️ Layout Ayarları

![Layout Ayarları](<Sayfa Görüntüleri/layout-ayarlari.png>)

---

# 🚀 Kurulum

### 1. Projeyi web sunucusuna yerleştirin

Projeyi Apache/XAMPP gibi bir PHP web sunucusunun web dizinine kopyalayın.

Örneğin:

```text
htdocs/
└── Apartman Ziyaretçi/
```

### 2. Veritabanını içe aktarın

Proje içerisindeki SQL dosyasını MySQL veya MariaDB'ye aktarın:

```text
Apartman Ziyaretçi/DATABASE FILE/apartment-visitor-nb.sql
```

### 3. Veritabanı bağlantısını yapılandırın

Veritabanı bağlantısı:

```text
Apartman Ziyaretçi/includes/dbconn.php
```

ve proje içerisindeki ilgili bağlantı yapılandırma dosyalarından yapılmaktadır.

Kendi MySQL kullanıcı adı, parola ve veritabanı bilgilerinizi sunucunuza göre ayarlayın.

### 4. Projeyi çalıştırın

Apache ve MySQL servislerini başlattıktan sonra tarayıcıdan proje klasörünü açabilirsiniz:

```text
http://localhost/Apartman%20Ziyaretçi/
```

---

# 🗄️ Veritabanı

Projede hazır bir SQL veritabanı dosyası bulunmaktadır:

```text
DATABASE FILE/apartment-visitor-nb.sql
```

Bu veritabanında yönetici, apartman/daire ve ziyaretçi kayıtları için gerekli tablolar bulunmaktadır.

---

# ⚠️ Güvenlik

Bu proje yerel geliştirme/eğitim amacıyla kullanılacak şekilde değerlendirilmelidir.

Canlı bir sunucuya yüklemeden önce:

- Varsayılan yönetici bilgilerini değiştirin.
- Veritabanı bilgilerini güvenli şekilde yapılandırın.
- Kullanıcı girdilerini daha sıkı doğrulayın.
- SQL sorgularını prepared statement yapısına taşıyın.
- Parola saklama yöntemlerini güncel ve güvenli bir yönteme taşıyın.
- Demo/test verilerini canlı ortamdan kaldırın.

---

## 📌 Proje

**Apartman Ziyaretçi Yönetim Sistemi**

Ziyaretçi giriş ve çıkışlarının, apartman bilgilerinin ve raporların merkezi bir yönetim panelinden takip edilmesini sağlayan web tabanlı bir sistem.

⭐ Projeyi faydalı bulduysanız repository'ye yıldız bırakabilirsiniz.
