<?php 
    if(isset($_url[1]) && $_url[1] == "add"){
        
        $title = post('Title');
        $description = post('Description');
        $memberId = post('MemberId');
        $productId = post('ProductId');
        $parentId = post('ParentId') ? post('ParentId') : 0;

        $query = "INSERT INTO comments (Title,Description,MemberId,ProductId,ParentId) values('$title','$description',$memberId,$productId,$parentId)";

        if(mysqli_query($connect,$query)){
            $new_comment_id =  mysqli_insert_id($connect);

            $last_comment_query  = "SELECT C.Id, C.Title, C.Description, C.AddedDate, M.Name, M.Surname FROM comments as C INNER JOIN members as M ON C.MemberId = M.Id WHERE C.Id = $new_comment_id";
            
            $last_comment_request = mysqli_query($connect,$last_comment_query);

            $num_rows_count = mysqli_num_rows($last_comment_request);

            if($num_rows_count == 0){
                echo -1;
                exit();
            }

            $last_comment = mysqli_fetch_assoc($last_comment_request);
            
            echo json_encode($last_comment,JSON_UNESCAPED_UNICODE); //JSON_UNESCAPED_UNICODE JSON Türkçe karakter sorununa çözüm..
            
        }
        else{
            echo -1;
        }
        exit();
    }

    if(isset($_url[1]) && $_url[1] == "comment_like" && post('CommentId')){
        
        $member_id = $_SESSION['Member']['Id'];
        $comment_id = post('CommentId');

        echo add_or_remove_like($member_id,$comment_id);
    }

    if(isset($_url[1]) && $_url[1] == "show_liked_members" && post('commentId')){
        $comment_id = post('commentId');

        $query = "SELECT M.Name, M.Surname FROM comment_user_like as CUL INNER JOIN members as M ON M.Id = CUL.UserId WHERE CUL.CommentId = $comment_id";

        $request = mysqli_query($connect, $query);

        $liked_members = [];

        while($members = mysqli_fetch_assoc($request)){
            $liked_members[] = $members;
        }

        echo json_encode($liked_members,JSON_UNESCAPED_UNICODE); //JSON_UNESCAPED_UNICODE JSON Türkçe karakter sorununa çözüm..
    }
?>