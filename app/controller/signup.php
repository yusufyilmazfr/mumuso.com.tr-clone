<?php 

if (session_status() == PHP_SESSION_NONE)
session_start();

if(isset($_SESSION['Member'])){
header('Location: ' . site_url('profile'));
exit();
}


if(url(1) && url(1) == 'create'){

    foreach($_POST as $key => $value){
        if(!post($key)){
            echo 0;
            exit();
        }
    }
    
    $tc = post('TC');
    $name = post('Name');
    $surname = post('Surname');
    $email = post('Email');
    $address = post('Address');
    
    
    $year  = strlen(post('Year')) < 2 ? '0' . post('Year') : post('Year');
    $month   = strlen(post('Month')) < 2 ? '0' . post('Month') : post('Month');
    $day   = strlen(post('Day')) < 2 ? '0' . post('Day') : post('Day');


    $birthDate  = $year .  '-' . $month . '-' . $day . ' 00:00:00';
    $password = md5(post('Password'));



    $query = "INSERT INTO members (TC,Name,Surname,BirhDate,Email,Password,Address) values('$tc','$name','$surname','$birthDate','$email','$password','$address')";

    if (mysqli_query($connect,$query)) {
        
        $_SESSION['Member'] = [
            'Id' => mysqli_insert_id($connect),
            'Name' => $name,
            'Surname' => $surname
        ];  

        echo 1;
    }
    else{
        echo "0";
    }
    
    mysqli_close($connect);

    exit();
}

include view('signup');