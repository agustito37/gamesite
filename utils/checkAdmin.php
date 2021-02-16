<?php

session_start();
if (!isset($_SESSION['user']) || !$_SESSION['user']['es_admin']) {
    header('location:./ingresar.php');
}
