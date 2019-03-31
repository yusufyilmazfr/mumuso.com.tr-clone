<?php include 'static/header.php' ?>


    <!-- User Profile Page Start -->

    <div class="pw">
        <div class="user-wellcome">
            <div class="user-logo">
                <i class="active fal fa-user" style="font-size: 18px; font-weight: bold"></i>
            </div>
            <div class="y-center user-text">
                <h3>
                    Merhaba
                    <?php echo $_SESSION['Member']['Name'] . ' ' . $_SESSION['Member']['Surname']  ?>
                </h3>
            </div>
        </div>

        <div class="user-transactions y-center">
            <div class="transaction-item">
                <a href="#">Siparişlerim</a>
            </div>
            <div class="transaction-item">
                <a href="#">Kişisel Bilgilerim</a>
            </div>
            <div class="transaction-item">
                <a href="#">Listelerim</a>
            </div>
            <div class="transaction-item">
                <a href="#">Hediye Çeklerim</a>
            </div>
            <div class="transaction-item">
                <a href="#">Puanlarım</a>
            </div>
            <div class="transaction-item">
                <a href="#">Adres Bilgilerim</a>
            </div>
            <div class="transaction-item">
                <a href="#">Mesajlarım</a>
            </div>
            <div class="transaction-item">
                <a href="#">Fiyat Alarm Listem</a>
            </div>
            <div class="transaction-item">
                <a href="#">Stok Alarm Listem</a>
            </div>
            <div class="transaction-item">
                <a href="#">Havale Bildirimi</a>
            </div>
            <div class="transaction-item">
                <a href="#">Şifremi Değiştir</a>
            </div>
            <div class="transaction-item">
                <a href="/logout">Çıkış Yap</a>
            </div>
        </div>
    </div>

<?php include 'static/footer.php' ?>

    <!-- User Profile Page End -->


