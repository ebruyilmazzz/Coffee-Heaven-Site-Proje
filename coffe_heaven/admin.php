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

    <!-- Yönetici Giriş Formu Bölümü -->
    <main>
        <section class="form-container">
            <h2>Yönetici Girişi</h2>
            <form action="admin_login.php" method="POST">
                <label for="username">Kullanıcı Adı</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Giriş Yap</button>
            </form>
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
