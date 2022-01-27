<?php

$layout = require(__DIR__ . '/../views/layout/default.php');
$acteurView = (__DIR__ . '/../views/acteurAdd.php');


Route::add('/acteurAdd', $func, 'get');

Route::add('/acteurAdd', $acteurAdd, 'post');
$func = function () use ($acteurView, $layout) {


    $layout($acteurView);
};



$acteurAdd = function () {

    $dbConnection = new DBConnectionManager();
    $acteurManager = new ActeurManager($dbConnection->getPdo());

    $acteur = new Acteur(array('nom' => $_POST['nom'], 'prenom' =>  $_POST['prenom'], 'img_src' => $_POST['img_src']));

    $ajout = $acteurManager->add($acteur);
    $acteur->setId($dbConnection->getPdo()->lastInsertId());
    $acteurManager->setImgSrc($acteur, $_FILES['imgsrc']);

    if (!is_string($ajout)) {
        $GLOBALS['succes'] = "L'ajout a réussi!";
        header('location: /acteur?id=' . $acteur->getId());
    } else {
        echo $ajout;
    }

    if ($ajout) {
        $GLOBALS['succes'] = "L'ajout a réussi!";
        header('location: /acteur?id=' . $acteur->getId());
    } else {
        echo $ajout;
    }
};