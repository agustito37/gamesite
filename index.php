<?php
require_once 'smarty.php';
require_once './database/genres.php';
require_once './database/consoles.php';
require_once './database/games.php';

$genres = getGenres();
$consoles = getConsoles();
$topGame = getTopGame();

$smarty = getSmarty();
$smarty->assign('genres', $genres);
$smarty->assign('consoles', $consoles);
$smarty->assign('topGame', $topGame);
$smarty->assign('title', 'Home');
$smarty->assign('scripts', array('games.js'));
$smarty->display('structure/application.tpl');
