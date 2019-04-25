<?php

function filterUrl($url){
    return htmlspecialchars(trim($url));
}

function get($name){
    if (isset($_GET[$name])) {
        if(is_array($_GET[$name])){
            array_map(function($item){
                return filterUrl($item);
            },$_GET[$name]);
        }
        return filterUrl($_GET[$name]);
    }
    return false;
}

function post($name){
    if (isset($_POST[$name])) {
        if(is_array($_POST[$name])){
            array_map(function($item){
                return filterUrl($item);
            },$_POST[$name]);
        }
        return filterUrl($_POST[$name]);
    }
    
    return false;
}

function url($index){
    global $_url;
    return isset($_url[$index]) ?  $_url[$index] : false;
}

function site_url($url = null){
    return url . '/' . $url;
}
