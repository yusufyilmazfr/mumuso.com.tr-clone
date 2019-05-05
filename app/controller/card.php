<?php 

if(!isset($_SESSION['Card'])){
    $_SESSION['Card'] = [];
}

if(isset($_url[1]) && $_url[1] == "add"){

    $product_id = post('productId');
    $product_count = post('productCount');

    $data = [];

    if(!product_exists_in_card($product_id)){

        $_SESSION['Card'][$product_id] = $product_count;

        $data = [
            'message' =>  'Ürün başarıyla eklenmiştir.',
            'productCount' =>  array_sum($_SESSION['Card'])
        ];
    }
    else{
        $product = get_product($product_id);

        $current_product_card_count = $_SESSION['Card'][$product_id];

        if($product['UnitsInStock'] >= ($current_product_card_count + $product_count)){
            $_SESSION['Card'][$product_id] += $product_count;
            $data = [
                'message' =>  'Ürün başarıyla eklenmiştir.',
                'productCount' =>  array_sum($_SESSION['Card'])
            ];  
        }
        else{
            $data = [
                'message' =>  "Maalesef stokta " .  $product['UnitsInStock'] . " adet ürün vardır, toplam olarak bu sayıdan daha fazlasını alamazsınız..",
                'productCount' =>  array_sum($_SESSION['Card'])
            ];
        }
    }
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    exit();
}

function product_exists_in_card($product_id){
    return isset($_SESSION['Card'][$product_id]) ? 1 : 0;
}   

function get_product($product_id){
    global $connect;

    $query = "SELECT * FROM products WHERE Id = $product_id";
    $request = mysqli_query($connect,$query);
    if(mysqli_num_rows($request) == 0)
        return false;
    $product = mysqli_fetch_assoc($request);

    return $product;
}

$product_id_list = "(" . implode(",",array_keys($_SESSION['Card'])) . ")"; 

$query = "SELECT Id, Name, ImagePath, Price FROM products WHERE Id IN $product_id_list";

$response  = mysqli_query($connect,$query);

$products = [];

while($product = mysqli_fetch_assoc($response)){
    $products[] = $product;
}

include View('card');