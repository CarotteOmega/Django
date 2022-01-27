<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$homeView = (__DIR__ . '/../views/home.php');



$func = function () use ($homeView, $layout) {

    
    $layout($homeView);
};


Route::add('/', $func, 'get');
