<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İçecekler - Coffee Heaven</title>
    <link rel="stylesheet" href="style.css"> <!-- CSS dosyası bağlantısı -->
</head>
<body>
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

   

        <!-- İçecekler Bölümü -->
        <section class="features">
            <div class="container">
                <div class="feature">
                    <img src="https://img.icons8.com/ios/50/coffee.png" alt="Kahve">
                    <h2>Kahve</h2>
                    <p>Farklı kahve çeşitlerimiz ile sizi bekliyoruz.</p>
                </div>
                <div class="feature">
                    <img src="https://img.icons8.com/ios/50/tea.png" alt="Çay">
                    <h2>Çay</h2>
                    <p>Doğal çaylarımız ile ferahlayın.</p>
                </div>
                <div class="feature">
                    <img src="https://img.icons8.com/ios/50/cocktail.png" alt="Soğuk İçecekler">
                    <h2>Soğuk İçecekler</h2>
                    <p>Yazın serinletici soğuk içeceklerimiz.</p>
                </div>
            </div>
        </section>
    </main>

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
</body>
</html>
