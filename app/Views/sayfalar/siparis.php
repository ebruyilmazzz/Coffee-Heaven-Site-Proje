<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Oluştur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
        }
        form label {
            display: block;
            margin: 10px 0 5px;
        }
        form input, form select, form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <!-- Sipariş Formu -->
    <main>
        <section class="form-container">
            <h2>Sipariş Oluştur</h2>
            <form action="" method="POST">
                <label for="name">Ad Soyad</label>
                <input type="text" id="name" name="name" required>

                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Telefon</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

                <label for="drink">İçecek Seçimi</label>
                <select id="drink" name="drink" required>
                    <option value="">Seçiniz</option>
                    <option value="kahve">Kahve</option>
                    <option value="çay">Çay</option>
                    <option value="latte">Latte</option>
                </select>

                <label for="food">Yiyecek Seçimi</label>
                <select id="food" name="food" required>
                    <option value="">Seçiniz</option>
                    <option value="kurabiye">Kurabiye</option>
                    <option value="kek">Kek</option>
                    <option value="sandviç">Sandviç</option>
                </select>

                <label for="note">Sipariş Notu</label>
                <textarea id="note" name="note" rows="4"></textarea>

                <button type="submit">Sipariş Ver</button>
            </form>
        </section>
    </main>

    <?php
    require 'vendor/autoload.php'; // Composer autoload dosyası

    use MongoDB\Client;

    // MongoDB bağlantısını oluştur
    $client = new Client("mongodb://localhost:27017");

    // Veri tabanı ve koleksiyon seç
    $database = $client->selectDatabase('siparis_db'); // Veri tabanı adı
    $collection = $database->selectCollection('siparisler'); // Koleksiyon adı

    // Form gönderildiğinde işlemleri gerçekleştir
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $drink = $_POST['drink'] ?? '';
        $food = $_POST['food'] ?? '';
        $note = $_POST['note'] ?? '';

        // Siparişi MongoDB'ye ekle
        $order = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'drink' => $drink,
            'food' => $food,
            'note' => $note,
            'created_at' => new MongoDB\BSON\UTCDateTime()
        ];

        try {
            $result = $collection->insertOne($order);

            if ($result->getInsertedCount() > 0) {
                echo "<p style='text-align: center; color: green;'>Sipariş başarıyla oluşturuldu! Sipariş ID: " . $result->getInsertedId() . "</p>";
            } else {
                echo "<p style='text-align: center; color: red;'>Sipariş eklenirken bir hata oluştu.</p>";
            }
        } catch (Exception $e) {
            echo "<p style='text-align: center; color: red;'>Bir hata oluştu: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>
</html>
