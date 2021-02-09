<?php
    require_once './config/smarty.php';
    
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);
    
    $error = NULL;
    if ($_GET['error']) {
        $error = 'Usuario / Password inválidos';
    }
    
    $smarty = getSmarty();
    $smarty->assign('error', $error);
    $smarty->assign('title', 'Ingresar');
    $smarty->assign('body', 'signin.tpl');
    $smarty->display('structure/authentication.tpl');
    