<?php


/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$filmView = (__DIR__ . '/../views/filmDetail.php');


$func = function () use ($filmView, $layout) {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $castingManager = new CastingManager($dbConnection->getPdo());


    if($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['film'] = $filmManager->get($_GET['id']);
        $GLOBALS['casting']['actors'] = $castingManager->castingByFilm($GLOBALS['film']);
        if($GLOBALS['film'] != null) {
            $layout($filmView);
        }else{
            echo "error film non trouvé";
        }
    }else{
        echo "error";
    }
};
Route::add('/film', $func, 'get');

$vote = function () use ($filmView, $layout) {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $film = $filmManager->get($_GET['id']);
    $film->addVote();
    $filmManager->update($film);
    $_SESSION['vote'][$film->getId()] = true;
    header('Location: /film?id=' . $film->getId());

};

Route::add('/film', $vote, 'post');
