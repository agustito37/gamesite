<?php
require_once './database/genres.php';
require_once './config/smarty.php';
require_once './database/genres.php';
require_once './database/consoles.php';

$genres = getGenres();
$consoles = getConsoles();

$smarty = getSmarty();
$smarty->assign('genres', $genres);
$smarty->assign('consoles', $consoles);
$smarty->assign('title', 'Home');
$smarty->assign('scripts', array('games.js'));
$smarty->display('structure/application.tpl');
