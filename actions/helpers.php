<?php
require_once dirname(__FILE__).'/../database/users.php';

function loginAction($email, $password) {
    $userData = login($email, $password);
    if ($userData) {
        session_destroy();
        session_start();
        $_SESSION['user'] = $userData;
        header('location:../index.php');
    } else {
        header('location:../ingresar.php?error=1');
    }
}
