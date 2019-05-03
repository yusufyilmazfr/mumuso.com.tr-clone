<?php


if(isset($_SESSION['Member'])){
    header('Location: ' . site_url('profile'));
    exit();
}


if(url(1) && url(1) === 'control')
{
    $email = post('email');
    $password = md5(post('password'));
    $remember_me = post('remember_me');

    if(!$email || !$password){
        echo "0";    
        exit();   
    }

    $query = "SELECT * FROM members WHERE Email='$email' AND Password='$password'";


    $request = mysqli_query($connect,$query);

    $member = mysqli_fetch_assoc($request);

    if(!isset($member)){
        echo "-1";
        exit();
    }

    $_SESSION['Member'] = [
        'Id' => $member['Id'],
        'Name' => $member['Name'],
        'Surname' => $member['Surname']
    ];  
    
    if($remember_me){
        setcookie('Id',$member['Id'],time() + 60 * 60 * 24 * 365, '/');
    }

    echo "başarılı bir şekilde giriş yaptınız, yönlendiriliyorsunuz...";

    exit();
}



include view('login');