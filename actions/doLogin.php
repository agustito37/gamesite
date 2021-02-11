<?php
require_once('./helpers.php');

$user = $_POST['user'];
$password = $_POST['password'];

$userData = login($user, $password);
if ($userData) {
    session_start();
    $_SESSION['user'] = $userData;
    header('location:../index.php');
} else {
    header('location:../ingresar.php?error=1');
}
