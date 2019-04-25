<?php

    $config = [];

    $config['db'] = [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'name' => 'mumuso'
    ];

    define('dir',realpath('.'));


    define('controller',dir . '/app/controller');
    define('view',dir . '/app/view');
    define('url', 'http://' . $_SERVER['HTTP_HOST']);
    // define('assets', dir . '/app/assets');

?>