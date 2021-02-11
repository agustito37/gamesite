<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);

require_once './libs/Smarty.class.php';

session_start();

function getSmarty() {
    $smarty = new Smarty();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';
    $smarty->comfig_dir = 'config';
    $smarty->cache_dir = 'cache';
    $smarty->plugins_dir = 'plugins';
    
    return $smarty;
}
