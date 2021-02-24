<?php
require_once './database/genres.php';
require_once './config/smarty.php';

$genres = getGenres();

$smarty = getSmarty();
$smarty->assign('genres', $genres);
$smarty->assign('title', 'Home');
$smarty->assign('scripts', array('games.js'));
$smarty->display('structure/application.tpl');
