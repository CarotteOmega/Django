<?php


/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$filmView = (__DIR__ . '/../views/castingAdd.php');

Route::add('/castingAdd', $func, 'get');

Route::add('/castingAdd', $castingAdd, 'post');

$func = function () use ($filmView, $layout) {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $acteursManager = new ActeurManager($dbConnection->getPdo());
    $castingManager = new CastingManager($dbConnection->getPdo());
    $GLOBALS['acteurs'] = $acteursManager->getList();


    if ($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['film'] = $filmManager->get($_GET['id']);
        if ($GLOBALS['film'] != null) {
            $layout($filmView);
        } else {
            echo "tu peux encore chercher";
        }
    } else {
        echo "error mdr nop";
    }
};


$castingAdd = function () use ($filmView, $layout) {





    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $castingManager = new CastingManager($dbConnection->getPdo());

    $film = $filmManager->get($_GET['id']);
    foreach ($_POST['acteur'] as $acteur) {

        $acteur = new Acteur(array('id' => $acteur));

        $castingManager->add($acteur, $film);
    }
    header('Location: /film?id=' . $film->getId());
};