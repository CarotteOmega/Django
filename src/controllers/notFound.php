<?php


/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$NotFoundView = (__DIR__ . '/../views/notFound.php');

$func = function () use ($NotFoundView, $layout) {

    $layout($NotFoundView);
};

Route::add('/404', $func, 'get');
Route::pathNotFound($func);
