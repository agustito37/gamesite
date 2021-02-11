<?php
require_once('./helpers.php');
require_once('../utils/database');

$name = $_POST['name'];
if (strlen($nombre) == 0) {
    header('location:../ingresar.php?error=El nombre no puede estar vacío');
    return;
}

$id = createGame($nombre, $imagen);

$image = $_FILES["image"];
if (is_uploaded_file($image["tmp_name"])) {
    move_uploaded_file($image["tmp_name"], '../public/imgs/'.$id);
}


