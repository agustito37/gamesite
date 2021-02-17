<?php
require_once './utils/checkAdmin.php';
require_once './config/smarty.php';
require_once './database/genres.php';
require_once './database/consoles.php';

$genres = getGenres();
$consoles = getConsoles();

$smarty = getSmarty();
$smarty->assign('error', filter_input(INPUT_GET, 'error'));
$smarty->assign('title', 'Nuevo juego');
$smarty->assign('genres', $genres);
$smarty->assign('consoles', $consoles);
$smarty->assign('body', 'new.tpl');
$smarty->display('structure/forms.tpl');