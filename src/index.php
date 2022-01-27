<?php
//import du routeur
include_once (__DIR__.'/core/Route.php');

//import des middlewares
foreach (glob(__DIR__.'/middleware/*.php') as $filename)
{
    include $filename;
}

//import des controlleurs
foreach (glob(__DIR__.'/controllers/*.php') as $filename)
{
    include $filename;
}

//import des models
foreach (glob(__DIR__.'/models/*.php') as $filename)
{
    include $filename;
}
//import des utils
include_once (__DIR__.'/utils/environment.php');
addDotEnv(".env");


//start session
session_start();

//route de test
Route::add('/test',function(){
    echo 'Welcome :-)';
});

Route::add('/session',function(){
    $_SESSION['debug'] = 'test';
    print_r('session status' .session_status());
    print_r($_SESSION);
});
Route::add('/post',function(){
    print_r($_POST);
});
Route::add('/get',function(){
    print_r($_GET);
});

//TITRE
$GLOBALS['title'] = "MetaCriticDeux";



Route::run('/');

?>

