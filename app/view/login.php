<?php include 'static/header.php'  ?>

<div class="Userlogin">

<div class="login-text">
    <i class="fas fa-user active"></i>
    <h3>ÜYE GİRİŞİ</h3>
</div>

<div style="height: 1px; background-color: #868585"></div>

<div class="user-login-input">
    <form action="#" method="POST">
    <input type="hidden" name="user_login" value="1">
        <div class="y-input">
            <input required type="email" name="email" id="email" placeholder="E-mail">
        </div>
        <div class="y-input">
            <input required type="password" name="password" id="password" placeholder="Parola">
        </div>
        <div class="login-remember-me" id="remember_me" style="margin-top: 10px; margin-bottom: 10px;">
            <label>
                <input type="checkbox" name="remember_me"> 
                Remember me
            </label>
        </div>
        <div class="login-button">
            <div class="user-sign-up-button">
                <a href="<?php echo site_url("signup")?>">ÜYE OL</a>
            </div>

            <div class="user-login-button active">
                <button id="login" type="submit">GİRİŞ YAP</button>
            </div>
        </div>
    </form>
</div>

</div>


<?php include 'static/footer.php'  ?>