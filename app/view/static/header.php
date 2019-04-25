<?php
    echo '<br>';
    print_r($_SESSION);
 ?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mumuso Türkiye I Online Alışveriş Sitesi</title>

    <link rel="stylesheet" href="/app/assets/css/style.css">
    <link rel="stylesheet" href="/app/assets/css/fa/css/all.css">
</head>

<body>

    <!-- Header Start -->
    <div class="Header">
        <div style="background-color:#F0F0F0">
            <div class="pw">
                <div class="header-top">
                    <div class="header-links">
                        <ul class="link-list">
                            <li><a href="#">İletişim</a></li>
                            <li><a href="#">Mağazalarımız</a></li>
                            <li><a href="#">Kargom Nerede?</a></li>
                        </ul>
                    </div>
                    <div class="wp-number">
                        <i class="fab fa-whatsapp active" style="font-weight: 700"></i>
                        &nbsp;
                        Bize Ulaşın: &nbsp; <a href="#" class="active">0850 255 80 00</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-main pw">

            <div class="logo">
                <a href="/">
                    <img src="/app/assets/img/logo/logo.jpg" alt="logo">
                </a>
            </div>

            <div class="search">
                <div style="position: relative;">
                    <form action="/search/product">
                        <i class="fal fa-search"></i>
                        <input type="text" name="q" id="search" class="search-input" placeholder="Çok Sevdiğiniz Mumuso Ürünleri...">
                    </form>
                </div>
                <button class="search-button active">Ara</button>
            </div>

            <div class="login-signup">
                <div class="sign-content">

                    <?php if(!isset($_SESSION['Member'])) { ?>
                        <i class="fal fa-user" style="font-size: 24px"></i>
                        <strong><a href="<?php echo site_url("signup") ?>">Üye Ol</a></strong> veya
                        <strong><a href="<?php echo site_url("login") ?>">Üye Girişi</a></strong>
                    <?php } else{ ?>
                        <a href="/profile" style="font-size: 18px; color : #212121; font-weight : bold" >
                            <i class="fal fa-user" style="font-size: 25px;"></i>
                            <span  style="font-weight : 600">
                                    <?php echo $_SESSION['Member']['Name'] . ' ' . $_SESSION['Member']['Surname']  ?>
                            </span>
                        </a>
                    <?php } ?>

                </div>
                <div class="shopping-card">
                    <a href="#">
                        <i class="fal fa-shopping-cart" style="font-size: 36px;"></i>
                        <div class="y-product-count">
                            <span>
                                0
                            </span>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <div class="nav pw">
            <ul class="nav-bar-list">
                <li class="nav-bar-list-item"><a href="#">Güzellik &amp; Bakım</a>
                    <div class="sub-menu">
                        <div class="sub-menu-item">
                            <h4 class="active">Makyaj &amp; Parfüm</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Parfüm</a></li>
                                <li><a href="#">Göz Grubu</a></li>
                                <li><a href="#">Dudak Grubu</a></li>
                                <li><a href="#">Tırnak Grubu</a></li>
                                <li><a href="#">Makyaj Temizleme</a></li>
                                <li><a href="#">Makyaj Süngeri</a></li>
                                <li><a href="#">Makyaj Fırçası</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Temel Bakım</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Yüz Bakım</a></li>
                                <li><a href="#">Vücut Bakım</a></li>
                                <li><a href="#">Saç Bakım</a></li>
                                <li><a href="#">Ağız Bakım</a></li>
                                <li><a href="#">Maske</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Güzellik Malzemeleri</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Saç Grubu</a></li>
                                <li><a href="#">Tırnak Grubu</a></li>
                                <li><a href="#">Kaş</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Kağıt Ürünler</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Mendil</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item-image">
                            <img src="/app/assets/img/sub-menu/297.jpg" alt="">
                        </div>
                    </div>
                </li>
                <li class="nav-bar-list-item"><a href="#">Giyim &amp; Aksesuar</a>
                    <div class="sub-menu">
                        <div class="sub-menu-item">
                            <h4 class="active">Aksesuar</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Uyku Bandı</a></li>
                                <li><a href="#">Anahtarlık</a></li>
                                <li><a href="#">Toka</a></li>
                                <li><a href="#">Şemsiye</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Çorap</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Kadın Çorap</a></li>
                                <li><a href="#">Erkek Çorap</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">İç Çamaşırı</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Erkek İç Çamaşırı</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Terlik</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Erkek Terlik</a></li>
                                <li><a href="#">Kadın Terlik</a></li>
                                <li><a href="#">Çocuk Terlik</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item-image">
                            <img src="/app/assets/img/sub-menu/300.jpg" alt="">
                        </div>
                    </div>
                </li>
                <li class="nav-bar-list-item"><a href="#">Çanta</a>
                    <div class="sub-menu">
                        <div class="sub-menu-item">
                            <h4 class="active">Cüzdan</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Bozuk Para Çantası</a></li>
                                <li><a href="#">Klasik Cüzdan</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Saklama Çantası</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Kozmetik Çantası</a></li>
                                <li><a href="#">Yemek Çantası</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Omuz Çantası</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Telefon Omuz Çantası</a></li>
                                <li><a href="#">Günlük Omuz Çantası</a></li>
                                <li><a href="#">Klasik Omuz Çantası</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Sırt Çantası</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Çocuk Sırt Çantası</a></li>
                                <li><a href="#">Kumaş Sırt Çantası</a></li>
                                <li><a href="#">Klasik Sırt Çantası</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item-image">
                            <img src="/app/assets/img/sub-menu/304.jpg" alt="">
                        </div>  
                    </div>
                </li>
                <li class="nav-bar-list-item"><a href="#">Çocuk</a>
                    <div class="sub-menu">
                        <div class="sub-menu-item">
                            <h4 class="active">Bebek Ürünleri</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Bebek Tekstil</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item-image">
                            <img src="/app/assets/img/sub-menu/301.jpg" alt="">
                        </div>
                    </div>
                </li>
                <li class="nav-bar-list-item"><a href="#">Ev &amp; Yaşam</a>
                    <div class="sub-menu">
                        <div class="sub-menu-item">
                            <h4 class="active">Mutfak Gereçleri</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Kesici &amp; Soyucu</a></li>
                                <li><a href="#">Saklama Kabı</a></li>
                                <li><a href="#">Kalıp</a></li>
                                <li><a href="#">Bardak Termos</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Günlük Kullanım</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Çamaşır Yıkama Kurutma</a></li>
                                <li><a href="#">Temizlik Ürünü</a></li>
                                <li><a href="#">Askı</a></li>
                                <li><a href="#">Dikiş Ürünleri</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Banyo</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Havlu</a></li>
                                <li><a href="#">Banyo Aksesuarı</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Ev Aksesuarı</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Paspas</a></li>
                                <li><a href="#">Ayna</a></li>
                                <li><a href="#">Oda Kokusu</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item-image">
                            <img src="/app/assets/img/sub-menu/303.jpg" alt="">
                        </div>
                    </div>
                </li>
                <li class="nav-bar-list-item"><a href="#">Kırtasiye</a>
                    <div class="sub-menu">
                        <div class="sub-menu-item">
                            <h4 class="active">Araç ve Gereçler</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Yazı Araçları</a></li>
                                <li><a href="#">Kağıt Ürünler</a></li>
                                <li><a href="#">Kalem Kutusu</a></li>
                                <li><a href="#">Desenli Bant</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item-image">
                            <img src="/app/assets/img/sub-menu/298.jpg" alt="">
                        </div>
                    </div>
                </li>
                <li class="nav-bar-list-item"><a href="#">Elektronik</a>
                    <div class="sub-menu">
                        <div class="sub-menu-item">
                            <h4 class="active">Cep Telefonu Aksesuarı</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Fonksiyonel Ürünler</a></li>
                                <li><a href="#">Koruyucu Ürünler</a></li>
                                <li><a href="#">USB Kablo</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Bilgisayar Aksesuarı</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Klavye &amp; Mouse</a></li>
                                <li><a href="#">Dijital Temizlik Ürünleri</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Dijital Ürünler</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Saat</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item">
                            <h4 class="active">Aydınlatma</h4>
                            <div class="active-line"></div>
                            <ul class="sub-menu-list">
                                <li><a href="#">Lamba</a></li>
                            </ul>
                        </div>
                        <div class="sub-menu-item-image">
                            <img src="/app/assets/img/sub-menu/299.jpg" alt="">
                        </div>
                    </div>
                </li>
                <li class="nav-bar-list-item"><a href="#">Mağazalar</a></li>
                <li class="nav-bar-list-item"><a href="#">İletişim</a></li>
            </ul>
        </div>
        <div style="background-color:#FFCA00">
            <div class="pw">
                <div class="campaign">
                    75 TL ve Üzeri Alışverişlerinizde Ücretsiz Kargo
                </div>
            </div>
        </div>

    </div>
    <!-- Header End -->
