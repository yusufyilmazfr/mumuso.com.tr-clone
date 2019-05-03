<?php 
    session_start();
    session_destroy();

    $url = site_url();
    setcookie('Id','',time() - 6666, '/');
    header('Location:' . $url . 'login');


?>  