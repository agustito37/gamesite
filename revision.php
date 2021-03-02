<?php
require_once './utils/checkAdmin.php';
require_once './database/comments.php';
require_once './config/smarty.php';
require_once './database/genres.php';
require_once './database/consoles.php';

$genres = getGenres();
$consoles = getConsoles();
$commentsCount = getCommentsFromGameCount();

$smarty = getSmarty();
$smarty->assign('commentsCount', $commentsCount);
$smarty->assign('genres', $genres);
$smarty->assign('consoles', $consoles);
$smarty->assign('body', 'revision.tpl');
$smarty->assign('scripts', array('bootstrap4-rating-input.min', 'comments.js'));
$smarty->display('structure/admin.tpl');
