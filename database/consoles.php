<?php

require_once 'helpers.php';

function getConsoles() {
    $cn = abrirConexion();
    $cn->consulta('select * from consolas');
    return $cn->restantesRegistros();
}

