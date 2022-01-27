<?php


/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$filmsView = (__DIR__ . '/../views/films.php');



$func = function () use ($filmsView, $layout) {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $GLOBALS['films'] = $filmManager->getList();
    $layout($filmsView);
};


Route::add('/films', $func, 'get');
