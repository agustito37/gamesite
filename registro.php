<?php
require_once './config/smarty.php';

$smarty = getSmarty();
$smarty->assign('error', filter_input(INPUT_GET, 'error'));
$smarty->assign('title', 'Registro');
$smarty->assign('body', 'signup.tpl');
$smarty->display('structure/forms.tpl');
