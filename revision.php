<?php
require_once './utils/checkAdmin.php';
require_once './database/comments.php';
require_once './config/smarty.php';

$commentsCount = getCommentsFromGameCount();

$smarty = getSmarty();
$smarty->assign('commentsCount', $commentsCount);
$smarty->assign('body', 'revision.tpl');
$smarty->assign('scripts', array('bootstrap4-rating-input.min', 'comments.js'));
$smarty->display('structure/admin.tpl');
