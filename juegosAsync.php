<?php
require_once './database/games.php';
require_once './database/genres.php';
require_once './config/smarty.php';

$genreId = filter_input(INPUT_GET, 'genreId');
$query = filter_input(INPUT_GET, 'query');
$page = filter_input(INPUT_GET, 'page');

if ($genreId) {
    $genre = getGenre($genreId);
}

$games = getPaginatedGames($genreId, $query, $page);

$smarty = getSmarty();
$smarty->assign('genre', $genre);
$smarty->assign('games', $games);
$smarty->assign('page', $page);
$smarty->assign('query', $query);
$smarty->display('games.tpl');
