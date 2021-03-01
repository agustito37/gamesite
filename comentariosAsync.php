<?php
require_once './database/comments.php';
require_once './config/smarty.php';

$gameId = filter_input(INPUT_GET, 'gameId');
$page = filter_input(INPUT_GET, 'page');

$comments = getPaginatedComments($page, $gameId);

$smarty = getSmarty();
$smarty->assign('page', $page);
$smarty->assign('gameId', $gameId);
$smarty->assign('comments', $comments);
$smarty->display('commentsAsync.tpl');
