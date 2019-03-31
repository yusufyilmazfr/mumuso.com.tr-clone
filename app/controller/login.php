<?php



if(isset($_SESSION['Member'])){
    header('Location: ' . site_url('profile'));
    exit();
}


if(url(1) && url(1) === 'control')
{
    $email = post('email');
    $password = md5(post('password'));
    
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
    
    echo "başarılı bir şekilde giriş yaptınız, yönlendiriliyorsunuz...";


    //veriler alındıktan sonra bellekten temizlendi..
    exit();
}



include view('login');