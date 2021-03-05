<?php

require_once dirname(__FILE__).'/../database/conexion.php';

function getConsoles() {
    $cn = abrirConexion();
    $cn->consulta('select * from consolas');
    return $cn->restantesRegistros();
}

function getConsolesFromGame($id) {
    $cn = abrirConexion();
    $sql = "
        select consolas.nombre
        from juegos_consolas
        inner join consolas on consolas.id = juegos_consolas.id_consola
        where juegos_consolas.id_juego= :id
    ";
    $cn->consulta($sql, array(array('id', $id, 'int')));
    return $cn->restantesRegistros();
}
