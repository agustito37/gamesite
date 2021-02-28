<?php
require_once './database/games.php';
require_once './database/consoles.php';
require_once './database/comments.php';
require_once './database/genres.php';
require_once './config/smarty.php';
require_once './utils/helpers.php';

$gameId = filter_input(INPUT_GET, 'gameId');
if (!$gameId) {
    header('location:./index.php');
}

incrementGameVisits($gameId);

$game = getGame($gameId);
$consoles = getConsolesFromGame($gameId);
$comments = getCommentsFromGame($gameId);
$genres = getGenres();

$hasCommented = false;
$user = getUserFromSession();
if(isset($user)) {
    $hasCommented = hasCommented($gameId, $user['id']);
}

$smarty = getSmarty();
$smarty->assign('game', $game);
$smarty->assign('consoles', $consoles);
$smarty->assign('comments', $comments);
$smarty->assign('hasCommented', $hasCommented);
$smarty->assign('title', $game['nombre_juego']);
$smarty->assign('genres', $genres);
$smarty->assign('body', 'detail.tpl');
$smarty->display('structure/application.tpl');
