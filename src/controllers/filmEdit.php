<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$filmView = (__DIR__ . '/../views/filmEdit.php');

$func = function () use ($filmView, $layout) {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());

    if($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['film'] = $filmManager->get($_GET['id']);
        if($GLOBALS['film'] != null) {
            $layout($filmView);
        }else{
            echo "error film non trouvé";
        }
    }else{
        echo "error";
    }
};
Route::add('/filmEdit', array($GLOBALS['isAdmin'],$func), 'get');


$filmEdit = function () {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $film = new Film(array('id'=>$_GET['id'],'nom' => $_POST['nom'], 'annee' =>  $_POST['annee'], 'score' =>  $_POST['score'], 'nbVotants' =>  $_POST['nb_vote']));

    $ajout = $filmManager->update($film);
    $filmManager->setImgSrc($film, $_FILES['imgsrc']);
    if($ajout){
        $GLOBALS['succes'] = "Modification réussie!";
    header('location: /film?id='. $film->getId());
    }else{
        echo $ajout;
    }

};


Route::add('/filmEdit', array($GLOBALS['isAdmin'],$filmEdit), 'post');
