<?php include 'static/header.php' ?>

<!-- User Signup Start -->

<div class="UserSignUp pw">

    <div class="login-text">
        <i class="fas fa-user active"></i>
        <h3 style="color:#545454">ÜYE KAYIT/DÜZENLEME</h3>
    </div>

    <div style="height: 1px; margin-top: 10px; margin-bottom: 10px; background-color: #545454"></div>


    <form action="/signup/create" method="POST">
        <div class="sign-up-form">
            <div class="membership-information">
                <div class="login-text">
                    <i class="fas fa-user active" style="font-size: 14px"></i>
                    <h6 style="margin-left: 10px">ÜYELİK BİLGİLERİ</h6>
                </div>

                <div class="y-sign-up-input">
                    <input type="text" required name="Name" maxlength="25" id="Name" placeholder="Ad">
                </div>


                <div class="y-sign-up-input">
                    <input type="text" required name="Surname" maxlength="25" id="Surname" placeholder="Soyad">
                </div>


                <div class="y-sign-up-input">
                    <input type="text" required name="TC" maxlength="11" id="TC" placeholder="TC Kimlik No">
                </div>

                <div style="margin-top: 20px; margin-bottom: 20px;"></div>

                <div class="login-text">
                    <i class="fas fa-phone active" style="font-size: 14px"></i>
                    <h6 style="margin-left: 10px">İLETİŞİM BİLGİLERİ</h6>
                </div>

                <div class="y-sign-up-input">
                    <input type="email" required maxlength="50" name="Email" id="Email" placeholder="E-Mail">
                </div>


                <div class="y-sign-up-input">
                    <textarea name="Address" maxlength="500" id="Address" cols="30" rows="10" placeholder="Adres"></textarea>
                </div>
                <div class="birth-date">
                    <div class="person-birth-day cmb-list">
                        <select name="Day" id="Day">
                            <option value="-1">GÜN</option>
                            <?php for($i = 1 ; $i<=31; $i++){ ?>
                                <?php echo "<option value='$i'>$i</option>\n"?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="person-birth-month cmb-list">
                        <select name="Month" id="Month">
                            <option value="-1">AY</option>
                            <option value="1">Ocak</option>
                            <option value="2">Şubat</option>
                            <option value="3">Mart</option>
                            <option value="4">Nisan</option>
                            <option value="5">Mayıs</option>
                            <option value="6">Haziran</option>
                            <option value="7">Temmuz</option>
                            <option value="8">Ağustos</option>
                            <option value="9">Eylül</option>
                            <option value="10">Ekim</option>
                            <option value="11">Kasım</option>
                            <option value="12">Aralık</option>
                        </select>
                    </div>
                    <div class="person-birth-year cmb-list">
                        <select name="Year" id="Year">
                            <option value="-1">Yıl</option>
                            <?php for($i = date('Y') ; $i>= date('Y',time() - 60*60*24*360*70); $i--){ ?>
                                <?php echo "<option value='$i'>  $i </option>\n"?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="password-information">
                <div class="login-text">
                    <i class="fas fa-user active" style="font-size: 14px"></i>
                    <h6 style="margin-left: 10px">ŞİFRE BİLGİLERİ</h6>
                </div>


                <div class="y-sign-up-input">
                    <input type="password" id="Password" required placeholder="Şifre">
                </div>

                <div class="y-sign-up-input">
                    <input type="password" id="rePassword" required placeholder="Şifre Tekrar">
                </div>
                <div class="y-sign-up-input">
                    <div class="y-sign-up-button">
                        <button id="saveUser" type="submit">
                            KAYDET
                        </button>
                    </div>
                </div>


            </div>

        </div>
    </form>

</div>
    <div class="pw"
    style="display: flex; justify-content: flex-start; align-items: center; border: 1px solid rgb(169, 169, 169); padding:5px 4px; margin-right: auto; margin-left: auto;">
    Firmamız hiçbir şekilde e-mailinizi ve kişisel bilgilerinizi ticari amaç uğruna kullanmaz.
    </div>
<!-- User Signup End -->




<?php include 'static/footer.php' ?>