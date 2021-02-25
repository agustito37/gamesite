<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);
require_once dirname(__FILE__).'/../utils/checkAuthenticated.php';
require_once dirname(__FILE__).'/../database/comments.php';
require_once dirname(__FILE__).'/../libs/Valitron.php';
require_once dirname(__FILE__).'/../utils/helpers.php';

// input
$comment = filter_input(INPUT_POST, 'comment');
$rating = filter_input(INPUT_POST, 'rating');
$game = filter_input(INPUT_POST, 'game');

// validations
$v = new Valitron\Validator($_POST);
$v->rule('required', ['comment', 'rating', 'game']);
$v->rule('integer', 'rating');
$v->rule('min', 'rating', 1);
$v->rule('max', 'rating', 5);
$v->labels(array(
    'comment' => 'Comentario',
    'game' => 'Id de juego'
));
if($v->validate()) {
    // storage
    $user = getUserFromSession();
    if (hasCommented($game, $user['id'])) {
        $error = 'Ya has comentado';
        header('location:../detalle.php?gameId='.$game.'&error='.$error);
    } else {
        createComment($comment, $rating, $game, $user["id"]);
        header('location:../detalle.php?gameId='.$game);
    }
} else {
    $firstError = array_values($v->errors())[0][0];
    header('location:../detalle.php?gameId='.$game.'&error='.$firstError);
}
