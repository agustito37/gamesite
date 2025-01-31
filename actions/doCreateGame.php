<?php
require_once dirname(__FILE__).'/../utils/checkAdmin.php';
require_once dirname(__FILE__).'/../database/games.php';
require_once dirname(__FILE__).'/../libs/Valitron.php';
require_once dirname(__FILE__).'/../config/configuration.php';

global $PUBLIC_PATH;

// input
$image = $_FILES['image'];
$name = filter_input(INPUT_POST, 'name');
$genre = filter_input(INPUT_POST, 'genre');
$consoles = $_POST['consoles'];
$date = filter_input(INPUT_POST, 'date');
$company = filter_input(INPUT_POST, 'company');
$video = filter_input(INPUT_POST, 'video');
$summary = filter_input(INPUT_POST, 'summary');

// validations
$v = new Valitron\Validator($_POST);
$v->rule('required', ['name', 'genre', 'consoles', 'date', 'company', 'summary']);
$v->rule('array', 'consoles');
$v->rule('date', 'date');
$v->rule('numeric', 'genre');
$v->rule('url', 'video');
$v->labels(array(
    'name' => 'Nombre',
    'email' => 'Email',
    'genre' => 'Categoría',
    'consoles' => 'Consolas',
    'date' => 'Fecha lanzamiento',
    'company' => 'Compañía',
    'video' => 'Url video',
    'summary' => 'Descripción'
));
if($v->validate()) {
    // storage
    $file = createGame($name, $genre, $consoles, $date, $company, $summary, $video, $image['name']);
    if ($file && is_uploaded_file($image["tmp_name"])) {
        move_uploaded_file($image["tmp_name"], '../'.$PUBLIC_PATH.'imgs/'.$file);
    }

    header('location:../index.php');
} else {
    $firstError = array_values($v->errors())[0][0];
    header('location:../nuevo.php?error='.$firstError);
}
