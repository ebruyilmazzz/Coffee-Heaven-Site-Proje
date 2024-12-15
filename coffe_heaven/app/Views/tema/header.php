<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Heaven</title>
    <link rel="stylesheet" href="<?=base_url()?>Assets/style.css"> <!-- CSS dosyası bağlantısı -->
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
                        <li><a href="<?=base_url("icecekler")?>">İçecekler</a></li>
                        <li><a href="<?=base_url("yiyecekler")?>">Yiyecekler</a></li>
                        
                    </ul>
                </li>
                <li><a href="<?=base_url("siparis")?>">Sipariş Oluştur</a></li>
                <li><a href="<?=base_url("admin")?>">Yönetici Girişi</a></li>
            </ul>
        </nav>
    </div>
</header>