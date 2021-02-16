<?php
    require_once './config/smarty.php';
    
    $error = NULL;
    if (filter_input(INPUT_GET, 'error')) {
        $error = 'Usuario / Password inválidos';
    }
    
    $smarty = getSmarty();
    $smarty->assign('error', $error);
    $smarty->assign('title', 'Ingresar');
    $smarty->assign('body', 'signin.tpl');
    $smarty->display('structure/forms.tpl');
    