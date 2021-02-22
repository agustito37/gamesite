<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);
require_once './database/games.php';
require_once './database/genres.php';
require_once './config/smarty.php';

$gameId = filter_input(INPUT_GET, 'gameId');
if (!$gameId) {
    header('location:./index.php');
}

$game = getGame($gameId);
$consoles = getGameConsoles($gameId);
$genres = getGenres();

$smarty = getSmarty();
$smarty->assign('game', $game);
$smarty->assign('consoles', $consoles);
$smarty->assign('title', $game['nombre_juego']);
$smarty->assign('genres', $genres);
$smarty->assign('body', 'detail.tpl');
$smarty->display('structure/application.tpl');