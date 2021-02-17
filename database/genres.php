<?php

require_once 'helpers.php';

function getGenres() {
    $cn = abrirConexion();
    $cn->consulta('select * from generos order by nombre');
    return $cn->restantesRegistros();
}

function getGenre($id) {
    $cn = abrirConexion();
    $cn->consulta('select * from generos where id= :id', array(array('id', $id, 'int')));
    return $cn->siguienteRegistro();
}
