<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
