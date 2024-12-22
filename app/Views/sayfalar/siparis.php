
    <!-- Sipariş Formu -->
    <main>
        <section class="form-container">
            <h2>Sipariş Oluştur</h2>
            <form action="submit_order.php" method="POST">
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

