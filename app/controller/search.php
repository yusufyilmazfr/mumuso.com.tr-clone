<?php 

$var_is_empty = (!isset($_url[1]) || !get('q')) ? true : false;



$product_name = get('q');

if(!$var_is_empty){
    $query = "SELECT * FROM products WHERE UnitsInStock > 0 && Name Like '%$product_name%' OR Description Like '%$product_name%'";
}
else
    $query = "SELECT * FROM products";

$response =  mysqli_query($connect,$query);

$products = [];

while($row = mysqli_fetch_assoc($response)){
    $products[] = $row;
}

include view('search');