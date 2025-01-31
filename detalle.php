<?php
require_once 'smarty.php';
require_once './database/games.php';
require_once './database/consoles.php';
require_once './database/comments.php';
require_once './database/genres.php';
require_once './utils/helpers.php';

$gameId = filter_input(INPUT_GET, 'gameId');
if (!$gameId) {
    header('location:./index.php');
}

incrementGameVisits($gameId);

$game = getGame($gameId);
$gameConsoles = getConsolesFromGame($gameId);
$commentsCount = getCommentsFromGameCount($gameId);
$genres = getGenres();
$consoles = getConsoles();
$topGame = getTopGame();

$hasCommented = false;
$user = getUserFromSession();
if(isset($user)) {
    $hasCommented = hasCommented($gameId, $user['id']);
}

$smarty = getSmarty();
$smarty->assign('game', $game);
$smarty->assign('gameConsoles', $gameConsoles);
$smarty->assign('commentsCount', $commentsCount);
$smarty->assign('hasCommented', $hasCommented);
$smarty->assign('title', $game['nombre_juego']);
$smarty->assign('genres', $genres);
$smarty->assign('consoles', $consoles);
$smarty->assign('topGame', $topGame);
$smarty->assign('body', 'detail.tpl');
$smarty->assign('scripts', array('bootstrap4-rating-input.min', 'comments.js'));
$smarty->display('structure/application.tpl');
