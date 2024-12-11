<?php

include("baglanti.php");

function register() {
    global $baglanti;

    if (isset($_POST["kaydet"])) {
        $name = $_POST["kullaniciadi"];
        $email = $_POST["email"];
        $password = password_hash($_POST["parola"], PASSWORD_DEFAULT);
        $ekle = "INSERT INTO uyelik (kullanici_adi, email, parola) VALUES ('$name', '$email', '$password')";
        $calistirekle = mysqli_query($baglanti, $ekle);

        if ($calistirekle) {
            echo '<div class="alert alert-success" role="alert">KAYIT BAŞARIYLA KAYDEDİLMİŞTİR!</div>';
            echo "<a href='cikis.php' style='color:red;background-color:yellow;border:1px solid red;padding:5px 5px;'>GİRİŞ YAP</a>";
        } else {
            echo '<div class="alert alert-danger" role="alert">KAYIT EKLENİRKEN PROBLEM OLUŞTU</div>';
        }
    }

   
    $sorgu = "SELECT kullanici_adi, email FROM uyelik";
    $calistirsorgu = mysqli_query($baglanti, $sorgu);

    if (mysqli_num_rows($calistirsorgu) > 0) {
        echo '<div class="mt-5"><h2>Kayıtlı Kullanıcılar</h2><ul class="list-group">';
        while ($satir = mysqli_fetch_assoc($calistirsorgu)) {
            echo '<li class="list-group-item">' . htmlspecialchars($satir['kullanici_adi']) . ' - ' . htmlspecialchars($satir['email']) . '</li>';
        }
        echo '</ul></div>';
    } else {
        echo '<div class="mt-5"><h2>Kayıtlı Kullanıcı Bulunmamaktadır.</h2></div>';
    }

    mysqli_close($baglanti);
}

register();
?>

<!doctype html>
<html lang="en" dir="LTR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <title>ÜYE KAYIT İŞLEMİ</title>
</head>
<body>
<div class="container p-5">
    <div class="card p-5">
        <form action="kayit.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="kullaniciadi">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="parola">
            </div>
            <button type="submit" name="kaydet" class="btn btn-primary">KAYDET</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
