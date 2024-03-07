<?php

//autoload
require '../vendor/autoload.php' ;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//gérer le routage des requêtes HTTP
$router= new AltoRouter();



$router->map('GET', '/', function() {
    require 'C:\Users\imenm\Desktop\WAMP\www\imen.blog\app\views/index.view.php';
}, 'index');

$router->map('GET', '/404', function() {
    require 'C:\Users\imenm\Desktop\WAMP\www\imen.blog\app\views/404.view.php';
}, '404');


$router->map('GET', '/contact', function() {
    require 'C:\Users\imenm\Desktop\WAMP\www\imen.blog\app\views/contact.view.php';
}, 'contact');

$router->map('GET', '/categoris', function() {
    require 'C:\Users\imenm\Desktop\WAMP\www\imen.blog\app\views/categories.view.php';
}, 'categories');



$match = $router->match();

if (is_array($match)){

    if( is_callable( $match['target'] ) ) {
	    call_user_func_array( $match['target'], $match['params'] );
    } else {
        ob_start(); //tampon
        $params=$match['params'];
        include"../app/views/{$match['target']}.view.php";
        $pageContent=ob_get_clean();
    }
	
	
} else{
    include "../app/views/404.view.php";
    $pageContent=ob_get_clean();
};

// choisir le layout

include '../app/views/layout/default.view.php';

