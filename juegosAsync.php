<?php
require_once 'smarty.php';
require_once './database/games.php';
require_once './database/genres.php';
require_once './libs/Valitron.php';

$genreId = filter_input(INPUT_GET, 'genreId');
$consoleId = filter_input(INPUT_GET, 'consoleId');
$query = filter_input(INPUT_GET, 'query');
$page = filter_input(INPUT_GET, 'page');
$sort = filter_input(INPUT_GET, 'sort');
$isDescending = filter_input(INPUT_GET, 'isDescending');

if ($genreId) {
   $genre = getGenre($genreId);
}

if ($isDescending) {
    $isDescending = $isDescending == 'true';
}

// validate
$v = new Valitron\Validator($_GET);
$v->rule('required', 'page');
$v->rule('optional', 'genreId', 'query', 'genre', 'console', 'sort');
$v->rule('in', 'sort', Array('puntuacion', 'fecha_lanzamiento', 'visualizaciones'));
$v->rule('numeric', 'page', 'genreId', 'consoleId');
if($v->validate()) {
    $games = getPaginatedGames($genreId, $consoleId, $query, $sort, $isDescending, $page);
} else {
    $games = Array();
}

$smarty = getSmarty();
$smarty->assign('genre', $genre);
$smarty->assign('games', $games);
$smarty->assign('page', $page);
$smarty->assign('query', $query);
$smarty->assign('sort', $sort);
$smarty->assign('isDescending', $isDescending);
$smarty->display('gamesAsync.tpl');
