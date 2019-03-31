<?php


if (session_status() == PHP_SESSION_NONE)
    session_start();

if(!isset($_SESSION['Member'])){
    header('Location: ' . site_url('login'));
    exit();
}

include view('profile');


