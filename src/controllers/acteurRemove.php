<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$acteurRemoveView = (__DIR__ . '/../views/acteurRemove.php');

Route::add('/acteurRemove', array($GLOBALS['isAdmin'], $func), 'get');
Route::add('/acteurRemove', array($GLOBALS['isAdmin'], $acteurRemove), 'post');
$func = function () use ($acteurRemoveView, $layout) {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActeurManager($dbConnection->getPdo());

    if ($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['actor'] = $actorManager->get($_GET['id']);
        if ($GLOBALS['actor'] != null) {
            $layout($acteurRemoveView);
        } else {
            echo "error acteur non trouvé";
        }
    } else {
        echo "error";
    }
};



$acteurRemove = function () {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActeurManager($dbConnection->getPdo());
    $toRemove = $actorManager->get($_GET['id']);
    $castingManager = new CastingManager($dbConnection->getPdo());

    $castingManager->deleteActeur($toRemove);
    $ajout = $actorManager->delete($toRemove);
    if ($ajout) {
        $GLOBALS['succes'] = "Le chomage";
        header('location: /actors');
    } else {
        $GLOBALS['error'] = "La suppression n'a pas abouti";
        echo $ajout;
    }
};