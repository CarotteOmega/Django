<?php
$GLOBALS['isAuth'] = function(): bool
{

    if(isset($_SESSION['user'])){
        return true;
    }else{
        header('Location: /register');
        exit();
        return false;
    }
};

$GLOBALS['isNotAuth'] = function(): bool
{
    if(isset($_SESSION['user'])){
        header('Location: /');
        exit();
        return false;
    }else{
        return true;
    }
};
