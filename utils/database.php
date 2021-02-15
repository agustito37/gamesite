<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'ConexionBD.php';
require_once dirname(__FILE__).'/../libs/password.php';

function abrirConexion() {
    $cn = new ConexionBD('mysql', 'localhost', 'catalogo_juegos', 'root', 'root');
    $cn->conectar();
    return $cn;
}

function getCategories() {
    $cn = abrirConexion();
    $cn->consulta('select * from generos');
    return $cn->restantesRegistros();
}

function getCategory($id) {
    $cn = abrirConexion();
    $cn->consulta('select * from generos where id= :id', array(array('id', $id, 'int')));
    return $cn->siguienteRegistro();
}

function createGame($name, $image) {
    $cn = abrirConexion();
    
    // insert query with parameters
    
    return $cn->ultimoIdInsert;
}

function login($email, $password) {
    $cn = abrirConexion();
    $cn->consulta(
            'select * from usuarios where email= :email', 
            array(array('email', $email, 'string'))
    );
    $user = $cn->siguienteRegistro();
    
    if (!$user || !password_verify($password, $user['password'])) {
         return NULL;
    }
    return $user;
}
