<?php 

function get_comment_like_count($commentId){
    global $connect;

    $comment_likes_query = "SELECT COUNT(*) as Count FROM comment_user_like WHERE CommentId = $commentId";


    $comment_like_count_request = mysqli_query($connect, $comment_likes_query);

    $comment_like_count_response = mysqli_fetch_assoc($comment_like_count_request);
    
    return $comment_like_count_response['Count'];
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

function SortComments(){

}

SortComments();