<?php
/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$loginView = (__DIR__ . '/../views/login.php');


$func = function () use ($loginView, $layout) {

    $layout($loginView);
};


Route::add('/login', array($GLOBALS['isNotAuth'] ,$func), 'get');


$login = function () use ($loginView, $layout) {

    $dbConnection = new DBConnectionManager();
    $userManager = new UserManager($dbConnection->getPdo());

    $user = new User(array('username' => $_POST['username'], 'password' =>  $_POST['password']));

    $connexion = $userManager->login($user);
    if(!is_string($connexion)){
        $_SESSION['user'] = $connexion;
        header('Location: /');
        exit();
    }else{
        $layout($loginView);
    }
};

Route::add('/login', array($GLOBALS['isNotAuth'], $login), 'post');

Route::add('/logout', function(){
    $_SESSION['user'] = null;
    $_SESSION['vote'] = null;
    header('Location: /');
}, 'get');

