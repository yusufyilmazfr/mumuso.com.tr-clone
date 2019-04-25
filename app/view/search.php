<?php include 'static/header.php' ?>

    
    <div class="pw products">
       
        <div class="search-content">
            <div class="search-filter">
                <div class="product-sort search-f">
                    <select name="sort" id="sort">
                        <option value="-1">Varsayılan Sıralama</option>
                        <option value="1">Alfabetik A-Z</option>
                        <option value="2">Alfabetik Z-A</option>
                        <option value="3">Yeniden Eskiye </option>
                        <option value="4">Eskiden Yeniye</option>
                        <option value="5">Fiyat Artan</option>
                        <option value="6">Fiyat Azalan</option>
                        <option value="7">Rastgele</option>
                        <option value="8">Puana Göre</option>
                    </select>
                </div>
                <div class="show-continued search-f y-center">
                    <label>
                        <input type="checkbox" name="continued" id="continued" disabled checked>
                        <span>Tükenenler Gösterme</span>
                    </label>
                </div>
            </div>


            <div class="b-products">

                <?php  foreach($products as $product) { ?>


                <div class="b-product x-search">
                    <div class="b-product-image">
                        <a href="<?php echo "/product/" . $product['Id'] ?>">
                            <img src="<?php echo site_url('/app/assets/img/products/') . $product['ImagePath'] ?>" alt="product">
                        </a>
                    </div>
                    <div class="b-product-text">
                        <a href="<?php echo "/product/" . $product['Id'] ?>">
                            <div class="company-name">
                                <span>Mumuso</span>
                            </div>
                            <div class="b-product-name">
                                <span><?php echo $product['Name'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="b-product-price">
                        <span>
                            <?php  echo $product['Price'] . ' TL' ?>
                        </span>
                    </div>
                </div>

            <?php }?>

            </div>
        </div>
    </div>



<?php include 'static/footer.php' ?>
