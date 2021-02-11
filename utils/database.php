<?php
require_once './ConexionBD.class.php';

function abrirConexion() {
    $cn = new ConexionBD('mysql', 'localhost', 'catalogo_juegos', 'root', 'root');
    return $cn->conectar();
}

function getCategories() {
    $cn = abrirConexion();
    $cn->consulta('select * from categorias');
    return $cn->restantesRegistros();
}

function getCategory($id) {
    $cn = abrirConexion();
    $cn->consulta('select * from categorias where id= :id', array(array('id', $id, 'int')));
    return $cn->siguienteRegistro();
}

function createGame($name, $image) {
    $cn = abrirConexion();
    
    // insert query with parameters
    
    return $cn->ultimoIdInsert;
}
