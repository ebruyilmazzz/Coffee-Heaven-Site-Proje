<?php

include("baglanti.php");

ini_set('session.gc_maxlifetime', 300);
session_set_cookie_params(300);

if (isset($_POST["giris"])) 
{
    $username = $_POST["kullaniciadi"];
    $parola = $_POST["parola"];
    
    if(isset($username) && isset($parola)) 
    {  
        $secim = "SELECT * FROM uyelik WHERE kullanici_adi = '$username'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir);

        if($kayitsayisi > 0) 
        {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashlisifre = $ilgilikayit["parola"];

            if(password_verify($parola, $hashlisifre)) 
            {
                session_start(); 
                $_SESSION["kullanici_adi"] = $ilgilikayit["kullanici_adi"];
                $_SESSION["email"] = $ilgilikayit["email"];

                header("Location: profile.php");
                exit();
            } 
            else 
            {
                echo '<div class="alert alert-danger" role="alert">Parola yanlış</div>';
            }
        } 
        else 
        {
            echo '<div class="alert alert-danger" role="alert">Kullanıcı adı yanlış</div>';
        }
    }

    mysqli_close($baglanti);
}
?>

<!doctype html>
<html lang="en" dir="LTR">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>ÜYE GİRİŞ İŞLEMİ</title>
</head>
<body>
    
    <div class="container p-5">
        <div class="card p-5">
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="kullaniciadi" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Parola</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="parola" required>
                </div>

                <button type="submit" name="giris" class="btn btn-primary">GİRİŞ YAP</button>
            </form>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
