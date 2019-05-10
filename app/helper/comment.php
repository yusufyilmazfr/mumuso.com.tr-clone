<?php 

function get_comment_like_count($commentId){
    global $connect;

    $comment_likes_query = "SELECT COUNT(*) as Count FROM comment_user_like WHERE CommentId = $commentId";


    $comment_like_count_request = mysqli_query($connect, $comment_likes_query);

    $comment_like_count_response = mysqli_fetch_assoc($comment_like_count_request);
    
    return $comment_like_count_response['Count'];
}

function who_liked_comment($comment_id){
    global $connect;

    $liked_person_list = "SELECT M.Name, M.Surname FROM comments as C INNER JOIN comment_user_like AS CUL ON C.Id = CUL.CommentId INNER JOIN members AS M ON CUL.UserId = M.Id WHERE C.Id = $comment_id LIMIT 2";

    $request = mysqli_query($connect, $liked_person_list);
    $list = [];

    while($person = mysqli_fetch_assoc($request)){
        $list[] = $person;
    }
    
    return $list;
}

function member_is_liked($member_id, $comment_id){
    
    global $connect;

    $query = "SELECT COUNT(*) as is_liked FROM comment_user_like WHERE UserId = $member_id && CommentId = $comment_id";

    $response = mysqli_query($connect, $query);

    $result = mysqli_fetch_assoc($response);
 
    return $result['is_liked'];
}

function find_like_id($member_id, $comment_id){
    
    global $connect;

    $query = "SELECT Id as is_liked FROM comment_user_like WHERE UserId = $member_id && CommentId = $comment_id";

    $response = mysqli_query($connect, $query);

    $result = mysqli_fetch_assoc($response);
 
    return $result['is_liked'];
}

function add_or_remove_like($member_id, $comment_id){
    global $connect;
    
    $result = member_is_liked($member_id, $comment_id);

    $query;
    $result;

    if($result){
        $query = "DELETE FROM comment_user_like WHERE Id = " . find_like_id($member_id, $comment_id);
        $result = 0;
    }
    else{
        $query = "INSERT INTO comment_user_like (UserId, CommentId) values ($member_id, $comment_id)";
        $result = 1;
    }

    if(mysqli_query($connect,$query)){
        return $result;
    }
    else{
        return -1;
    }

}

function smooth_comment_list($arr){
    $temp = '';

    foreach($arr as $key => $value){
        $temp .= $value['Name'] . ', ';
    }

    return substr($temp,0, strlen($temp) -2);
}

function sort_comments($arr, $parentId = 0){
}

