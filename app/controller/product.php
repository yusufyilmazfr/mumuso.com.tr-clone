<?php 

    if(!isset($_url[1]) || empty($_url[1]))
        exit();
        
    $product_id = $_url[1];
    
    $query = "SELECT * FROM products WHERE Id = $product_id";
    $product_comments = "SELECT C.Id, C.Title, C.Description, M.Name, M.Surname, C.AddedDate, C.ParentId FROM comments as C INNER JOIN members as M ON C.MemberId = M.Id INNER JOIN Products as P ON P.Id = C.ProductId  WHERE  P.Id = $product_id ORDER BY C.Id DESC";

    $response_product = mysqli_query($connect, $query);
    $response_comments = mysqli_query($connect, $product_comments);

    $product = mysqli_fetch_assoc($response_product);

    $comments = [];

    if(isset($_SESSION['Member'])){
        while($comment =  mysqli_fetch_assoc($response_comments)){
            $comment['like_count'] = get_comment_like_count($comment['Id']);
            $comment['is_liked']  =  member_is_liked($_SESSION['Member']['Id'],$comment['Id']);
            $comments[] = $comment;
        }
    }
    else{
        while($comment =  mysqli_fetch_assoc($response_comments)){
            $comment['like_count'] = get_comment_like_count($comment['Id']);
            $comments[] = $comment;
        }
    }

        
    if($product == null){
        echo "product not found!";
        exit();
    }

    include view('product');
?>