<?php
require_once 'smarty.php';
require_once './database/genres.php';
require_once './database/consoles.php';

$genres = getGenres();
$consoles = getConsoles();

$smarty = getSmarty();
$smarty->assign('error', filter_input(INPUT_GET, 'error'));
$smarty->assign('genres', $genres);
$smarty->assign('consoles', $consoles);
$smarty->assign('title', 'Registro');
$smarty->assign('scripts', array('register.js'));
$smarty->assign('body', 'signup.tpl');
$smarty->display('structure/forms.tpl');
