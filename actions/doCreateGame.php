<?php
require_once dirname(__FILE__).'/../utils/checkAdmin.php';
require_once dirname(__FILE__).'/../utils/database.php';

// input
$image = $_FILES["image"];
$name = filter_input(INPUT_POST, 'name');
$genre = filter_input(INPUT_POST, 'genre');
$consoles = $_POST['consoles'];
$date = filter_input(INPUT_POST, 'date');
$company = filter_input(INPUT_POST, 'company');

// validations
if (strlen($name) == 0) {
    header('location:../nuevo.php?error=El nombre no puede estar vacío');
    return;
}

// storage
$file = createGame($name, $genre, $consoles, $date, $company, $image);
if (is_uploaded_file($image["tmp_name"])) {
    move_uploaded_file($image["tmp_name"], '../public/imgs/'.$file);
}

header('location:../index.php');
