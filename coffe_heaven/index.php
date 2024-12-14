<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Heaven</title>
    <link rel="stylesheet" href="style.css"> <!-- CSS dosyası bağlantısı -->
</head>
<body>
    <!-- Navbar -->
    <!-- Navbar -->
<header>
    <div class="navbar">
        <div class="logo">☕ Coffee Heaven</div>
        <nav>
            <ul>
                <li><a href="index.php">Anasayfa</a></li>
                <li class="dropdown">
                    <a href="menu.php" class="dropbtn">Menüler</a>
                    <ul class="dropdown-content">
                        <li><a href="icecekler.php">İçecekler</a></li>
                        <li><a href="yiyecekler.php">Yiyecekler</a></li>
                        
                    </ul>
                </li>
                <li><a href="siparis.php">Sipariş Oluştur</a></li>
                <li><a href="admin.php">Yönetici Girişi</a></li>
            </ul>
        </nav>
    </div>
</header>


    <!-- Ana İçerik -->
    <main>
        <section class="hero">
            <h1>Coffee Heaven'a Hoş Geldiniz</h1>
            <p>En kaliteli kahve çeşitleri ve lezzetli atıştırmalıklar ile hizmetinizdeyiz.</p>
            <button onclick="window.location.href='siparis.php'">Sipariş Oluştur</button>
        </section>

        <!-- Features Bölümü -->
        <section class="features">
            <div class="container">
                <div class="feature">
                    <img src="https://img.icons8.com/ios/50/coffee.png" alt="Özel Kahveler">
                    <h2>Özel Kahveler</h2>
                    <p>Uzman baristalarımız tarafından hazırlanan özel kahve çeşitleri</p>
                </div>
                <div class="feature">
                    <img src="https://img.icons8.com/ios/50/cookie.png" alt="Taze Atıştırmalıklar">
                    <h2>Taze Atıştırmalıklar</h2>
                    <p>Her gün taze pişen lezzetli atıştırmalıklar</p>
                </div>
                <div class="feature">
                    <img src="https://img.icons8.com/ios/50/clock.png" alt="Hızlı Servis">
                    <h2>Hızlı Servis</h2>
                    <p>Siparişiniz en kısa sürede hazırlanır</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <!-- Footer -->
<footer>
    <div class="footer-container">
        <!-- İletişim Bölümü -->
        <div class="footer-section">
            <h4>İletişim</h4>
            <p>📞 +90 555 123 4567</p>
            <p>📧 <a href="mailto:info@coffeeheaven.com">info@coffeeheaven.com</a></p>
        </div>

        <!-- Çalışma Saatleri Bölümü -->
        <div class="footer-section">
            <h4>Çalışma Saatleri</h4>
            <p>Hafta içi: 08:00 - 22:00</p>
            <p>Hafta sonu: 09:00 - 23:00</p>
        </div>

        <!-- Sosyal Medya Bölümü -->
        <div class="footer-section">
            <h4>Takip Edin</h4>
            <div class="social-icons">
                <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
                <a href="#"><img src="instagram-icon.png" alt="Instagram"></a>
                <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
            </div>
        </div>
    </div>

    <!-- Alt Bilgi -->
    <div class="footer-bottom">
        <p>&copy; 2024 Coffee Heaven. Tüm hakları saklıdır.</p>
    </div>
</footer>

