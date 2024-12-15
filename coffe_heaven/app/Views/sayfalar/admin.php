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
