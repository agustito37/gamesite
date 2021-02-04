<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('datos.php');

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$logueado = login($usuario, $password);

if ($logueado) {
    session_start();
    $_SESSION['logueado'] = $logueado;
    header('location:index.php');
} else {
    header('location:login.php?err=1');
}