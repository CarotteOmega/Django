<?php
/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$registerView = (__DIR__ . '/../views/register.php');

$func = function () use ($registerView, $layout) {
    $layout($registerView);
};


Route::add('/register', array($GLOBALS['isNotAuth'],$func), 'get');


$register = function () use ($registerView, $layout) {

    $dbConnection = new DBConnectionManager();
    $userManager = new UserManager($dbConnection->getPdo());

    $user = new User(array('username' => $_POST['username'], 'password' =>  $_POST['password'], 'email' =>  $_POST['email']));

    $register = $userManager->add($user);
    if(!is_string($register)){
        $_SESSION['user'] = $register;
        header('Location: /');
    }else{
        $layout($registerView);
    }

};


Route::add('/register', $register, 'post');
