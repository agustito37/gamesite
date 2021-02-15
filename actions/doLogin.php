<?php
require_once('../utils/database.php');

$email = $_POST['email'];
$password = $_POST['password'];

$userData = login($email, $password);
if ($userData) {
    session_start();
    $_SESSION['user'] = $userData;
    header('location:../index.php');
} else {
    header('location:../ingresar.php?error=1');
}
