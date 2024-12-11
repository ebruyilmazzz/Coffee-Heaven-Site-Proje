<?php

session_start();

function kullaniciBilgileriniYazdir() {
    if(isset($_SESSION["kullanici_adi"])) {
        echo "<h3>" . $_SESSION["kullanici_adi"] . " HOŞGELDİN</h3>";
        echo "<h3>" . $_SESSION["email"] . "</h3>";
        echo "<a href='index.php' style='color:red;background-color:yellow;border:1px solid red;padding:5px 5px;'>ÇIKIŞ YAP</a>";
    } else {
        echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
    }
}

function tumOturumDegiskenleriniYazdir() {
    foreach ($_SESSION as $anahtar => $deger) {
        echo "<p>$anahtar: $deger</p>";
    }
}

kullaniciBilgileriniYazdir();


echo "<h4>Oturum Değişkenleri:</h4>";
tumOturumDegiskenleriniYazdir();

?>
