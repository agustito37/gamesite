<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);

require_once 'ConexionBD.php';
require_once dirname(__FILE__).'/../libs/password.php';

function abrirConexion() {
    $cn = new ConexionBD('mysql', 'localhost', 'catalogo_juegos', 'root', 'root');
    $cn->conectar();
    return $cn;
}
