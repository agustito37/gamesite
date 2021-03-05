<?php
require_once dirname(__FILE__).'/../utils/checkAdmin.php';
require_once dirname(__FILE__).'/../database/comments.php';
require_once dirname(__FILE__).'/../database/games.php';
require_once dirname(__FILE__).'/../libs/Valitron.php';

// input
$id = filter_input(INPUT_GET, 'id');

// validations
$v = new Valitron\Validator($_GET);
$v->rule('required', ['id']);
$v->rule('integer', 'id');
if($v->validate()) {
    $gameId = getCommentGameId($id);
    deleteComment($id);
    adjustGameScore($gameId);
    header('location:../revision.php');
} else {
    header('location:../ingresar.php');
}
