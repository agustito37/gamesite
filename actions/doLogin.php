<?php
require_once('../utils/database.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

$userData = login($email, $password);
if ($userData) {
    session_start();
    $_SESSION['user'] = $userData;
    header('location:../index.php');
} else {
    header('location:../ingresar.php?error=1');
}
