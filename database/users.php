<?php

require_once dirname(__FILE__).'/../database/helpers.php';
require_once dirname(__FILE__).'/../libs/password.php';

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

function register($email, $alias, $password) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
    $cn = abrirConexion();
    $cn->consulta(
        'insert into usuarios (email, alias, password) values (:email, :alias, :password)',
        array(
            array('email', $email, 'string'),
            array('alias', $alias, 'string'),
            array('password', $hashedPassword, 'string')
        )
    );
}
