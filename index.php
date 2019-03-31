<?php

    include '/app/init.php';

    $_url = get('url');
    $_url = explode('/',$_url);

    
    if(!isset($_url[0])){
        $_url[0] = "index";
    }
    
    if(!file_exists(controller($_url[0]))){
        $_url[0] = 'index';
    }

    
    
    include controller($_url[0]);

    if(isset($request))
        mysqli_free_result($request);

    mysqli_close($connect);

?>