<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$filmRemoveView = (__DIR__ . '/../views/filmRemove.php');

$func = function () use ($filmRemoveView, $layout) {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());

    if($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['film'] = $filmManager->get($_GET['id']);
        if($GLOBALS['film'] != null) {
            $layout($filmRemoveView);
        }else{
            echo "error film non trouvé";
        }
    }else{
        echo "error";
    }
};
Route::add('/filmRemove', array($GLOBALS['isAdmin'],$func), 'get');


$filmRemove = function () {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $toRemove = $filmManager->get($_GET['id']);
    $castingManager = new CastingManager($dbConnection->getPdo());

    $castingManager->deleteFilm($toRemove);
    $ajout = $filmManager->delete($toRemove);
    if(!is_string($ajout)){
     header('location: /films');
    }else{
        echo $ajout;
    }

};


Route::add('/filmRemove', array($GLOBALS['isAdmin'],$filmRemove), 'post');
