<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('utils.php');

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
