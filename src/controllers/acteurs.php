<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$acteursView = (__DIR__ . '/../views/acteurs.php');

Route::add('/acteurs', $func, 'get');

$func = function () use ($acteursView, $layout) {

    $dbConnection = new DBConnectionManager();
    $acteursManager = new ActorManager($dbConnection->getPdo());
    $GLOBALS['acteurs'] = $acteursManager->getList();
    $layout($acteursView);
};