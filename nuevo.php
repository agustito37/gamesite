<?php
require_once './utils/checkAdmin.php';
require_once './config/smarty.php';
require_once './utils/database.php';

$categories = getCategories();
$consoles = getConsoles();

$smarty = getSmarty();
$smarty->assign('error', filter_input(INPUT_GET, 'error'));
$smarty->assign('title', 'Nuevo juego');
$smarty->assign('categories', $categories);
$smarty->assign('consoles', $consoles);
$smarty->assign('body', 'new.tpl');
$smarty->display('structure/forms.tpl');