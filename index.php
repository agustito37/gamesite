<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);
require_once './database/games.php';
require_once './database/genres.php';
require_once './config/smarty.php';

$genreId = filter_input(INPUT_GET, 'genreId');
if ($genreId) {
    $genre = getGenre($genreId);
    $games = getGamesOfCategory($genreId);
} else {
    $games = getGames();
}
$genres = getGenres();

$smarty = getSmarty();
$smarty->assign('genre', $genre);
$smarty->assign('genres', $genres);
$smarty->assign('games', $games);
$smarty->assign('title', 'Home');
$smarty->assign('body', 'home.tpl');
$smarty->display('structure/application.tpl');
