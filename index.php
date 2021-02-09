<?php
    require_once './data/games.php';
    require_once './data/categories.php';
    require_once './config/smarty.php';
    
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);
    
    if ($_GET['catId']) {
        $category = getCategory($_GET['catId']);
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
    