<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$acteurView = (__DIR__ . '/../views/acteurEdit.php');
Route::add('/acteurEdit', array($GLOBALS['isAdmin'], $acteurEdit), 'post');
Route::add('/acteurEdit', array($GLOBALS['isAdmin'], $func), 'get');
$func = function () use ($acteurView, $layout) {

    $dbConnection = new DBConnectionManager();
    $acteurManager = new ActeurManager($dbConnection->getPdo());

    if ($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['acteur'] = $acteurManager->get($_GET['id']);
        if ($GLOBALS['acteur'] != null) {
            $layout($acteurView);
        } else {
            echo "error acteur non trouvé";
        }
    } else {
        echo "error";
    }
};
Route::add('/acteurEdit', array($GLOBALS['isAdmin'], $func), 'get');


$acteurEdit = function () {

    $dbConnection = new DBConnectionManager();
    $acteurManager = new ActeurManager($dbConnection->getPdo());
    $acteur = new Acteur(array('id' => $_GET['id'], 'nom' => $_POST['nom'], 'prenom' =>  $_POST['prenom']));

    $ajout = $acteurManager->update($acteur);
    $acteurManager->setImgSrc($acteur, $_FILES['imgsrc']);
    if (!is_string($ajout)) {
        $GLOBALS['succes'] = "Modification réussie!";
        header('location: /acteur?id=' . $acteur->getId());
    } else {
        echo $ajout;
    }
};