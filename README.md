# Coffee Heaven Site Proje

Bu proje, bir kahve sipariş yönetim sistemi sunan bir web uygulamasıdır. Aşağıda projenin front-end, back-end ve MongoDB kullanımına ilişkin detaylı bilgiler bulunmaktadır.

---

## Front-End

Projenin ön yüzü (front-end), kullanıcıların kahve siparişlerini kolaylıkla yönetebilmesi için tasarlanmıştır. 

- **Kullanılan Teknolojiler**: HTML, CSS, JavaScript.
- **Ana Özellikler**:
  - Şık ve kullanıcı dostu bir tasarım.
  - Dinamik içerik güncellemeleri için JavaScript.
  - Mobil cihazlarla uyumlu tasarım (responsive design).
- **Yapı**:
  - Tüm statik dosyalar `public` dizininde yer almaktadır.
  - CSS ve JavaScript dosyaları, HTML dosyalarına bağlanarak kullanıcı arayüzü oluşturulmuştur.

---

## Back-End

Projenin arka yüzü (back-end), kahve siparişlerini işlemek ve veritabanı ile iletişim kurmak için geliştirilmiştir.

- **Kullanılan Teknolojiler**: PHP, CodeIgniter Framework.
- **Ana Özellikler**:
  - RESTful API desteği.
  - Siparişlerin CRUD (Create, Read, Update, Delete) işlemleri.
  - Güvenli veri işleme ve doğrulama mekanizmaları.
- **Yapı**:
  - Back-end kodları `app` dizininde yer almaktadır.
  - İş mantığı ve veritabanı işlemleri, kontrolörler ve modeller aracılığıyla gerçekleştirilmiştir.
  - Framework tarafından sağlanan sistem dosyaları `system` dizininde bulunmaktadır.

---

## MongoDB

Proje, veri depolama için MongoDB kullanmaktadır. MongoDB, sipariş verilerinin esnek ve ölçeklenebilir bir şekilde saklanmasını sağlar.

- **Kullanılan Dosyalar**:
  - `siparisler_db.siparisler.json`: Örnek sipariş verilerini içeren JSON dosyası.
- **Ana Özellikler**:
  - NoSQL yapısı sayesinde hızlı sorgulama ve veri işleme.
  - JSON formatındaki belgelerle doğal uyum.
- **Yapı**:
  - Veritabanı, sipariş bilgilerini saklamak ve işlemek için kullanılır.
  - Uygulama, MongoDB'ye bağlanarak siparişleri okur ve günceller.

---

Bu bilgiler, projenin teknik bileşenleri hakkında genel bir anlayış sunmaktadır. Ek detaylar veya açıklamalar için geliştirici dokümantasyonunu inceleyebilirsiniz.

