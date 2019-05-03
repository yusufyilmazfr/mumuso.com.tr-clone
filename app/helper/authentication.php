<?php 

function cookie_control(){
    global $connect;


    if(!isset($_SESSION['Member'])  && isset($_COOKIE['Id'])){

        $member_id = $_COOKIE['Id'];

        $response = mysqli_query($connect, "SELECT * FROM members WHERE Id = $member_id");

        $member =  mysqli_fetch_assoc($response);
        
        if(!isset($member)){
            exit();
        }

        $_SESSION['Member'] = [
            'Id' => $member['Id'],
            'Name' => $member['Name'],
            'Surname' => $member['Surname']
        ];

    }
}

