<?php 

    if(!isset($_url[1]) || empty($_url[1]))
        exit();

    $product_id = $_url[1];
    
    $query = "SELECT * FROM products WHERE Id = $product_id";

    $response = mysqli_query($connect, $query);

    $product = mysqli_fetch_assoc($response);

    if($product == null){
        echo "product not found!";
        exit();
    }

    include view('product');
?>