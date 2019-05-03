<?php


function Load()
{
    $helperDir =  realpath('.') . '/app/helper';

    if ($dh = opendir($helperDir)) {
        while($file = readdir($dh)){
            if(is_file($helperDir . '/' . $file)){
                include $helperDir . '/' . $file;
            }
        }
    }
}


Load();

if (session_status() == PHP_SESSION_NONE)
session_start();

include 'system/config.php';

$connect = mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['password'],$config['db']['name']);
mysqli_set_charset($connect,"utf8");

cookie_control();

?>