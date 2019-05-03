<?php include '/static/header.php' ?>

<div id="liked-members" style="display:none; position: absolute; left: 50%; background: #008e66; color: #fff; padding: 40px 60px; z-index: 2; text-align:center">
    <p>
        <b style="cursor: pointer; color:#e3d4d4;" id="closeLikedMembersList">Ekranı Kapat</b>
    </p>
    <div>
        <ul id="liked-members-list">
        </ul>
    </div>
</div>

<div class="product-details pw">
        <div class="product-image">
            <img src="<?php echo site_url('/app/assets/img/products/') . $product['ImagePath'] ?>" alt="product">
        </div>
        <div class="product-information">
            <h5 style="margin-top: 5px; margin-bottom: 5px">MUMUSO</h5>
            <h2 class="product-name"><?php echo $product['Name'] ?></h1>
                <h5 class="product-number"><?php echo "ÜRÜN KODU : " . $product['Id'] ?></h5>
                <h1 class="product-price"><?php echo $product['Price'] . ' TL' ?></h1>

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
                            <?php echo $product['Description'] ?> 
                            </p>
                        </div>
                    </div>
                    <div class="product-comments">
                        <span onclick="showComments()">
                            <b>Yorumlar (<?php echo count($comments) ?>)</b>
                        </span>
                         <div class="sub-comment" id="comments_base">
                            <div>
                                <div class="comment-description">
                                    <p style="font-weight: normal">
                                        Bu ürün için toplam <b> <?php echo count($comments) ?> </b> yorum yapılmıştır. <a href="javascript:void(0)"
                                            id="showCommentBase" style="font-weight: bold ;color:#212121">Yorum Yaz</a>
                                    </p>

                                    <div class="new-comment">
                                        <div class="comment-block">
                                            <div class="comment-header">
                                                <input required type="text" class="header" id="header" placeholder="Yorum Başlığı">
                                            </div>
                                        </div>

                                        <div class="comment-block">
                                            <div class="comment-description">
                                                <textarea required placeholder="Yorum" name="description" id="description" cols="10" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="productId" id="productId" value="<?php echo $product['Id'] ?>">
                                    <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION['Member']['Id'] ?>">

                                    <div class="new-comment">
                                        <div class="comment-block"></div>
                                        <div class="comment-block">
                                            <button id="send-comment" class="send-comment">
                                                Gönder
                                            </button>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>

                            <div class="comments" id="comments">
                                    <?php foreach($comments as $key => $value) { ?>
                                        
                                        <div style="border: 1px solid #ddd; padding: 15px 0; margin: 10px 0;">
                                            <div class="comment">
                                                <div class="comment-member-info">
                                                    <div class="comment-added-date">
                                                        <b> <?php echo $value['Name'] . ' ' . $value['Surname'] ?> </b>
                                                        <span> <?php echo date("m j, Y, g:i",strtotime($value['AddedDate'])) ?> </span>
                                                    </div>
                                                    <div class="comment-like-cont">
                                                        Beğeni sayısı:
                                                        <b>
                                                            <?php echo $value['like_count'] ?>
                                                        </b>
                                                        <i style="font-size: 20px; color:#008e66;" class="fal fa-eye showLikedMembers" duygu="<?php echo $value['Id'] ?>"></i>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <span>Yorumu onaylıyor musunuz?</span>
                                                        <?php if(!isset($_SESSION['Member'])){ ?>
                                                            <div>
                                                                <button id="like-comment" duygu="<?php echo $value['Id'] ?>" class="like-comment-btn bg-success">Beğen</button>
                                                            </div>
                                                        <?php } else{ ?>
                                                            <div>
                                                                <?php if($value['is_liked'] > 0){ ?>
                                                                        <button id="unlike-comment" duygu="<?php echo $value['Id'] ?>"  class="like-comment-btn bg-error">Beğenmekten Vazgeç</button>
                                                                    <?php } else{?>
                                                                        <button id="like-comment" duygu="<?php echo $value['Id'] ?>" class="like-comment-btn bg-success">Beğen</button>
                                                                <?php }?>
                                                            </div>
                                                        <?php } ?>
                                                        <!-- <br> -->
                                                        <!-- <button>Yanıtla</button> -->
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="comment-info">
                                                    <div class="comment-title">
                                                        <span><?php echo  $value['Title'] ?></span>
                                                    </div>
                                                    <div class="comment-description">
                                                    <span> <?php echo  $value['Description']  ?> </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <!-- <div class="comment-response">
                                                <div class="comment-member-info">
                                                    <div class="comment-added-date">
                                                        <b> Gülizar Yılmaz </b>
                                                        <span> 05 3, 2019, 2:31 </span>
                                                    </div>
                                                    <div class="comment-like-cont">
                                                        Beğeni sayısı:
                                                        <b>2</b>
                                                        <i style="font-size: 20px; color:#008e66;" class="fal fa-eye showLikedMembers" duygu="110"></i>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <span>Yorumu onaylıyor musunuz?</span>
                                                        <div>
                                                            <button id="unlike-comment" duygu="110" class="like-comment-btn bg-error">Beğenmekten Vazgeç</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="comment-info">
                                                    <div class="comment-title">
                                                        <span>Başarısız!</span>
                                                    </div>
                                                    <div class="comment-description">
                                                    <span> Maalesef </span>
                                                    </div>
                                                </div>
                                            </div>





                                            <div>
                                                <div class="new-subcomment" style="width:90%; margin-left:auto">
                                                    <div class="comment-block">
                                                        <div class="comment-description">
                                                            <textarea required="" placeholder="Yorum" name="description" id="description" cols="10" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                        <br>
                                                    <div class="comment-block">
                                                        <button id="send-comment" class="send-comment">
                                                            Gönder
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                     -->
                                        </div>
                                    <?php } ?>
                            </div>

                            <script>    
                                let sessionControl = <?php echo isset($_SESSION['Member']) ? 1 : 0  ?> ;

                                document.getElementById('showCommentBase').addEventListener('click',function(e){
                                    
                                    if(sessionControl){
                                        var list = document.querySelectorAll('.comment-description .new-comment');
                                        list.forEach(function(key, value){
                                            if(key.style.display === 'flex')
                                            key.style.display = 'none';
                                            else
                                            key.style.display = 'flex';
                                        });
                                    }
                                    else{
                                        alert('Lütfen yorum yapmak için giriş yapınız..');
                                    }
                                })
                                
                                
                                if(document.getElementById('like-comment')){
                                    document.getElementById('like-comment').addEventListener('click',function(e){
                                        
                                        if(sessionControl){
                                            var btn = document.getElementById('like-comment');
                                        }
                                        else{
                                            alert('Yorumu beğenmek için lütfen giriş yapınız.');
                                        }
                                    });
                                }
                            </script>
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
                            <img src="/app/assets/img/products/alo-v.jpg" alt="ürün resim">
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
                            <img src="/app/assets/img/products/product-1.jpg" alt="ürün resim">
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
                            <img src="/app/assets/img/products/product2.jpg" alt="ürün resim">
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
                            <img src="/app/assets/img/products/product-3.jpg" alt="ürün resim">
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
                    <img src="/app/assets/img/images/guvenli.png" alt="güvenli">
                    <span>%100 Güvenli Alışveriş</span>
                </a>
            </div>
            <div class="order-info-item">
                <a href="#">
                    <img src="/app/assets/img/images/kargo.png" alt="güvenli">
                    <span>50 TL ve Üzeri Ücretsiz Kargo</span>
                </a>
            </div>
            <div class="order-info-item">
                <a href="#">
                    <img src="/app/assets/img/images/iade.png" alt="güvenli">
                    <span>Koşulsuz İade İmkanı</span>
                </a>
            </div>
            <div class="order-info-item">
                <a href="#">
                    <img src="/app/assets/img/images/taksit.png" alt="güvenli">
                    <span>Kredi Kartına Taksit</span>
                </a>
            </div>
        </div>
    </div>



<?php include '/static/footer.php' ?>