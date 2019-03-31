<?php include '/static/header.php' ?>

<div class="product-details pw">
        <div class="product-image">
            <img src="app/assets/img/products/alo-v.jpg" alt="ürün resimi">
        </div>
        <div class="product-information">
            <h5 style="margin-top: 5px; margin-bottom: 5px">MUMUSO</h5>
            <h2 class="product-name">Aloe Vera Nemlendirici Jel Suyu Tonik</h1>
                <h5 class="product-number">ÜRÜN KODU : 4001003001</h5>
                <h1 class="product-price">17,95 TL</h1>

                <div class="product-wrapper">
                    <div class="product-count-input">
                        <div class="add-to-card-count">
                            <div class="decrease-product">
                                -
                            </div>
                            <div class="duygu">
                                <input readonly type="text" value="0" name="productCount" id="productCount">
                            </div>
                            <div class="increase-product">
                                +
                            </div>
                        </div>
                    </div>

                    <div class="add-to-card">
                        <a href="#">
                            SEPETE EKLE
                            <i class="fal fa-shopping-cart" style="font-size: 16px; font-weight: 500"></i>
                        </a>
                    </div>
                    <div class="take-now add-to-card">
                        <a href="#">
                            HEMEN AL
                        </a>
                    </div>

                </div>

                <div class="product-transaction">
                    <div class="product-description">
                        <span onclick="showDescription()">
                            Ürün Bilgileri
                        </span>
                        <div id="temp" class="sub-product-description">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt modi accusantium quod
                            </p>
                        </div>
                    </div>
                    <div class="product-comments">
                        <span>
                            Yorumlar (0)
                        </span>
                        <div class="sub-comment">

                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Top Sellers Start -->
    <div class="pw" id="temp2">
        <div class="top-sellers-text">
            En Çok Satılanlar
            <div
                style="width:100px; height: 3px; border-top: 1px solid #008e66; border-bottom: 1px solid #008e66; margin: 0 auto;">
            </div>
        </div>

        <div class="top-sellers">

            <div class="product-item">
                <div class="y-card">
                    <a href="/product-details.html">
                        <div class="y-card-image">
                            <img src="app/assets/img/products/alo-v.jpg" alt="ürün resim">
                        </div>
                    </a>
                    <div class="y-card-text">
                        <h6>MUMUSO</h6>
                        <a href="/product-details.html">
                            <p>
                                Lorem ipsum dolor sit amet. Animi, dignissimos.
                            </p>
                        </a>
                        <span class="price">
                            19,95 TL
                        </span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <div class="y-card">
                    <a href="/product-details.html">
                        <div class="y-card-image">
                            <img src="app/assets/img/products/product-1.jpg" alt="ürün resim">
                        </div>
                    </a>
                    <div class="y-card-text">
                        <h6>MUMUSO</h6>
                        <a href="/product-details.html">
                            <p>
                                Aloe Vera Nemlendirici Jel Suyu Tonik
                            </p>
                        </a>
                        <span class="price">
                            19,95 TL
                        </span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <div class="y-card">
                    <a href="/product-details.html">
                        <div class="y-card-image">
                            <img src="app/assets/img/products/product2.jpg" alt="ürün resim">
                        </div>
                    </a>
                    <div class="y-card-text">
                        <h6>MUMUSO</h6>
                        <a href="/product-details.html">
                            <p>
                                Bambu Fiber Dokulu Sıkıştırılmış Kağıt Maske - 30 Adet
                            </p>
                        </a>
                        <span class="price">
                            19,95 TL
                        </span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <div class="y-card">
                    <a href="/product-details.html">
                        <div class="y-card-image">
                            <img src="app/assets/img/products/product-3.jpg" alt="ürün resim">
                        </div>
                    </a>
                    <div class="y-card-text">
                        <h6>MUMUSO</h6>
                        <a href="/product-details.html">
                            <p>
                                Aloe Vera Nemlendirici Jel Suyu Tonik
                            </p>
                        </a>
                        <span class="price">
                            19,95 TL
                        </span>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Top Sellers End -->

    <div class="pw">
        <div class="product-order-info">
            <div class="order-info-item">
                <a href="#">
                    <img src="app/assets/img/images/guvenli.png" alt="güvenli">
                    <span>%100 Güvenli Alışveriş</span>
                </a>
            </div>
            <div class="order-info-item">
                <a href="#">
                    <img src="app/assets/img/images/kargo.png" alt="güvenli">
                    <span>50 TL ve Üzeri Ücretsiz Kargo</span>
                </a>
            </div>
            <div class="order-info-item">
                <a href="#">
                    <img src="app/assets/img/images/iade.png" alt="güvenli">
                    <span>Koşulsuz İade İmkanı</span>
                </a>
            </div>
            <div class="order-info-item">
                <a href="#">
                    <img src="app/assets/img/images/taksit.png" alt="güvenli">
                    <span>Kredi Kartına Taksit</span>
                </a>
            </div>
        </div>
    </div>



<?php include '/static/footer.php' ?>