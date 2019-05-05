<?php include 'static/header.php' ?>

    <?php if(count($products) > 0 ){?>
        <div class="pw">
            <div class="basket-card">
                <table class="card-table">
                    <thead>
                        <tr>
                            <th>Kod</th>
                            <th>Ürün Fotoğrafı</th>
                            <th>Ürün Adı</th>
                            <th>Ürün Birim Fiyatı</th>
                            <th>Ürün Adeti</th>
                            <th>Ürün İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0; ?>
                    <?php foreach($products as $key => $value){ ?>
                        <tr>
                            <td><?php echo $value['Id']?></td>
                            <td><img width="40" src="<?php echo site_url("app/assets/img/products/") . $value['ImagePath'] ?>" alt="#"></td>
                            <td><?php echo $value['Name']?></td>
                            <td><?php echo $value['Price'] . ' TL'?></td>
                            <td><?php echo $_SESSION['Card'][$value['Id']] ?></td>
                            <td>
                                <button class="increase-count btn-card"><i class="fal fa-plus"></i></button>
                                <button class="decrease-count btn-card"><i class="fal fa-minus"></i></button>
                                <button class="trash-product btn-card"><i class="fal fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php $total += $value['Price'] * $_SESSION['Card'][$value['Id']]; ?>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">Toplam Fiyat <?php echo $total . ' TL' ?></td>
                            <td colspan="1"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    <?php } else{ ?>
        <div class="pw y-center" style="margin-top:30px; margin-bottom: 30px; flex-direction: column !important">
            <i style="font-size: 70px; font-weigth: normal; color:#008e66;" class="fal fa-shopping-cart"></i>
            <br>
            <h1 style="font-size: 50px; font-weigth: normal; color:#008e66;">Kanka sepet boş!</h1>
        </div>
    <?php }?>
<?php include 'static/footer.php' ?>
