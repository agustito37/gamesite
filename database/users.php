<?php

require_once 'helpers.php';

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

