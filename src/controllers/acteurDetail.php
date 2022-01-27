<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$actorView = (__DIR__ . '/../views/acteurDetail.php');

Route::add('/acteur', $func, 'get');
$func = function () use ($actorView, $layout) {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActeurManager($dbConnection->getPdo());
    $castingManager = new CastingManager($dbConnection->getPdo());


    if ($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['actor'] = $actorManager->get($_GET['id']);
        $GLOBALS['casting']['films'] = $castingManager->castingByActeur($GLOBALS['actor']);
        if ($GLOBALS['actor'] != null) {
            $layout($actorView);
        } else {
            echo "error actor non trouvé";
        }
    } else {
        echo "error";
    }
};