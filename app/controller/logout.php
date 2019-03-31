<?php 
    session_start();
    session_destroy();

    $url = site_url();
    header('Location:' . $url . 'login');


?>  