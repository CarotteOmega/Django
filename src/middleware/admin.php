<?php
$GLOBALS['isAdmin'] = function(): bool
{

    if (isset($_SESSION['user'])){


        if ($_SESSION['user']->getIsAdmin() == true) {
            return true;
        } else {
            header('Location: /');
            exit();
            return false;
        }
    }else{
        header('Location: /');
        exit();
        return false;
    }
};

$GLOBALS['isNotAdmin'] = function(): bool
{
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']->getIsAdmin() == true) {
            header('Location: /');
            exit();
            return false;
        } else {
            return true;
        }
    }else{
        return true;
    }
};
