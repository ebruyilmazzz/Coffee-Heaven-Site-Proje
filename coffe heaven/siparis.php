<?php
// Veritabanı işlemleri için PHP kısmı
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Veritabanı bağlantı bilgileri
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "siparisler";

    // Veritabanı bağlantısı
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // Formdan gelen veriler
    $icecek = $_POST['icecek'];
    $adet = $_POST['adet'];
    $ad_soyad = $_POST['ad_soyad'];
    $telefon = $_POST['telefon'];
    $masa_numarasi = $_POST['masa_numarasi'];
    $notlar = $_POST['notlar'];

    // SQL Enjeksiyonuna karşı güvenli veri ekleme
    $stmt = $conn->prepare("INSERT INTO siparisler (ad_soyad, telefon, icecek, adet, masa_numarasi, notlar) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiis", $ad_soyad, $telefon, $icecek, $adet, $masa_numarasi, $notlar);

    // Veriyi veritabanına ekleme
    if ($stmt->execute()) {
        echo "Sipariş başarıyla alındı!";
    } else {
        echo "Hata: " . $stmt->error;
    }

    // Bağlantıyı kapatma
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Oluştur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="menu">
            <div id="logo">COFFE HEAVEN </div>
                <i><img src="image/WhatsApp Görsel 2024-05-31 saat 14.25.46_f9a883be.jpg" alt="" width="75px"></i>
                
               <nav>
                <a href="sogukicecek.php"><i class="fa-solid fa-mug-saucer"></i>Soğuk İçecekler</a>
                <a href="sicakicecekler.php"><i class="fa-solid fa-mug-hot"></i>Sıcak İçecekler</a>
                <a href="index.php"><i class="fa-solid fa-house"></i>ANA SAYFA</a>
                <a href="siparis.php"><i class="fa-solid fa-mug-saucer"></i>Sipariş Oluştur</a>
                <a href="kayit.php"><i class="fa-solid fa-user-plus"></i>ÜYE OL</a>
                <a href="cikis.php"><i class="fa-solid fa-user-plus"></i>GİRİS</a>
            </nav>
         </section>
         

    <section id="siparis-formu">
        <div class="container">
            <h1>Sipariş Ver</h1>
            <form method="POST">
                <!-- İçecek Seçimi -->
                <label for="icecek">İçecek Seçin:</label>
                <select id="icecek" name="icecek" required>
                    <option value="Sıcak Kahve">Sıcak Kahve</option>
                    <option value="Sıcak Çay">Sıcak Çay</option>
                    <option value="Soğuk Kahve">Soğuk Kahve</option>
                    <option value="Soğuk Çay">Soğuk Çay</option>
                    <option value="Buzlu Limonata">Buzlu Limonata</option>
                </select>

                <!-- Ad ve Soyad -->
                <label for="ad_soyad">Ad ve Soyad:</label>
                <input type="text" id="ad_soyad" name="ad_soyad" placeholder="Adınız ve Soyadınız" required>

                <!-- Telefon Numarası -->
                <label for="telefon">Telefon Numarası:</label>
                <input type="tel" id="telefon" name="telefon" placeholder="Telefon Numarası" required>

                <!-- Adet -->
                <label for="adet">Adet:</label>
                <input type="number" id="adet" name="adet" placeholder="Adet" required>

                <!-- Masa Numarası -->
                <label for="masa_numarasi">Masa Numarası:</label>
                <input type="number" id="masa_numarasi" name="masa_numarasi" placeholder="Masa Numarası" required>

                <!-- Mesaj veya Notlar -->
                <label for="notlar">Mesaj veya Notlar:</label>
                <textarea id="notlar" name="notlar" placeholder="Ekstra bir şey var mı?" rows="4"></textarea>

                <!-- Sipariş Butonu -->
                <button type="submit">Siparişi Ver</button>
            </form>
        </div>
    </section>

    <footer>
        <p>© 2024 Sipariş Sistemi</p>
    </footer>

</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    #siparis-formu {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        margin-top: 10px;
    }

    button:hover {
        background-color: #45a049;
    }

    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        width: 100%;
        bottom: 0;
    }
    #menu{
   height:80px;
   padding:0 20px;
   
}
#logo{
   font-size: 30px;
   line-height: 80px;
   color: rgb(82, 33, 33);
   float:left;
   
}
nav{
   float:right;
   line-height:80px ;
}
nav a:link{
   text-decoration: none;
   margin-right: 25px;
   color: rgba(12, 43, 6, 0.753);
}
nav a:visited{
   text-decoration: none;
   margin-right: 25px;
   color: rgba(12, 43, 6, 0.753);
}
.ikon{
   margin-right: 7px;
   font-size: 16px;
 
   
}
</style>

