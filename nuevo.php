<?php
    require_once './utils/checkAuthentication.php';
    require_once './config/smarty.php';
    
    $smarty = getSmarty();
    $smarty->assign('error', $_GET['error']);
    $smarty->assign('title', 'Nuevo juego');
    $smarty->assign('body', 'new.tpl');
    $smarty->display('structure/forms.tpl');