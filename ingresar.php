<?php
require_once 'smarty.php';
require_once './database/genres.php';
require_once './database/consoles.php';

$error = NULL;
if (filter_input(INPUT_GET, 'error')) {
    $error = 'Usuario / Password inválidos';
}

$genres = getGenres();
$consoles = getConsoles();


$smarty = getSmarty();
$smarty->assign('error', $error);
$smarty->assign('genres', $genres);
$smarty->assign('consoles', $consoles);
$smarty->assign('title', 'Ingresar');
$smarty->assign('body', 'signin.tpl');
$smarty->display('structure/forms.tpl');
    