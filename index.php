<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require_once './data/games.php';
    require_once './data/categories.php';
    require_once './libs/Smarty.class.php';
    
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);
    
    if (isset($_GET['catId'])) {
        $category = getCategory($_GET['catId']);
    }
    $categories = getCategories();
    $games = getGames();
                        
    $smarty = new Smarty();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->comfig_dir = 'config';
    $smarty->cache_dir = 'cache';
    $smarty->plugins_dir = 'plugins';
    
    $smarty->assign('category', $category);
    $smarty->assign('categories', $categories);
    $smarty->assign('games', $games);
    
    $smarty->assign('title', 'Home');
    $smarty->assign('body', 'home.tpl');
    $smarty->display('structure/application.tpl');