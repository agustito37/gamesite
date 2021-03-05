<?php
require_once dirname(__FILE__).'/../database/ConexionBD.php';
require_once dirname(__FILE__).'/../config/configuration.php';

function abrirConexion() {
    global $DB_ENGINE,
           $DB_HOST,
           $DB_NAME,
           $DB_USER,
           $DB_PASSWORD;
    
    $cn = new ConexionBD($DB_ENGINE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD);
    $cn->conectar();
    return $cn;
}

