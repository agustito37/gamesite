<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);

require_once dirname(__FILE__).'/../actions/helpers.php';
require_once dirname(__FILE__).'/../database/users.php';
require_once dirname(__FILE__).'/../libs/Valitron.php';

// input
$email = filter_input(INPUT_POST, 'email');
$alias = filter_input(INPUT_POST, 'alias');
$password = filter_input(INPUT_POST, 'password');
$passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm');

// validations
$v = new Valitron\Validator($_POST);
$v->rule('required', ['email', 'alias', 'password', 'passwordConfirm']);
$v->rule('equals', 'password', 'passwordConfirm');
$v->labels(array(
    'email' => 'Email',
    'alias' => 'Alias',
    'password' => 'Contraseña',
    'passwordConfirm' => 'Confirmación contraseña'
));
if($v->validate()) {
    // storage
    register($email, $alias, $password);
    loginAction($email, $password);
} else {
    $firstError = array_values($v->errors())[0][0];
    header('location:../registro.php?error='.$firstError);
}
