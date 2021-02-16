<?php
require_once './utils/games.php';
require_once './utils/database.php';
require_once './config/smarty.php';

$catiId = filter_input(INPUT_GET, 'catId');
if ($catiId) {
    $category = getCategory($catiId);
}
$categories = getCategories();
$games = getGames();

$smarty = getSmarty();
$smarty->assign('category', $category);
$smarty->assign('categories', $categories);
$smarty->assign('games', $games);
$smarty->assign('title', 'Home');
$smarty->assign('body', 'home.tpl');
$smarty->display('structure/application.tpl');
