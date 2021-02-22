<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);
require_once dirname(__FILE__).'/../utils/checkAdmin.php';
require_once dirname(__FILE__).'/../database/games.php';
require_once dirname(__FILE__).'/../libs/Valitron.php';

// input
$image = $_FILES["image"];
$name = filter_input(INPUT_POST, 'name');
$genre = filter_input(INPUT_POST, 'genre');
$consoles = $_POST['consoles'];
$date = filter_input(INPUT_POST, 'date');
$company = filter_input(INPUT_POST, 'company');

// validations
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'genre', 'consoles', 'date', 'company']);
$v->rule('array', 'consoles');
$v->rule('date', 'date');
$v->rule('numeric', 'genre');
$v->labels(array(
    'name' => 'Nombre',
    'email' => 'Email',
    'genre' => 'Categoría',
    'consoles' => 'Consolas',
    'date' => 'Fecha lanzamiento',
    'company' => 'Compañía'
));
if($v->validate()) {
    // storage
    $file = createGame($name, $genre, $consoles, $date, $company, $image['name']);
    if ($file && is_uploaded_file($image["tmp_name"])) {
        move_uploaded_file($image["tmp_name"], '../public/imgs/'.$file);
    }

    header('location:../index.php');
} else {
    $firstError = array_values($v->errors())[0][0];
    header('location:../nuevo.php?error='.$firstError);
}
