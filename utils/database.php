<?php
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

function createGame($name, $genre, $consoles, $date, $company, $image) {
    $formattedDate = date('Y-m-d', strtotime($date));
    $cn = abrirConexion();
    $cn->consulta(
        'insert into juegos (nombre, id_genero, fecha_lanzamiento, empresa) values (:name, :genre, :date, :company)',
        array(
            array('name', $name, 'string'),
            array('genre', $genre, 'int'),
            array('date', $formattedDate, 'string'),
            array('company', $company, 'string')
        )
    );
    $ultimoId = $cn->ultimoIdInsert();
    
    $file;
    if ($image) {
        $file = $ultimoId.'.'.pathinfo($image['name'], PATHINFO_EXTENSION);
        $cn->consulta(
        'update juegos set poster= :file where id= :id',
        array(
            array('file', $file, 'string'),
            array('id', $ultimoId, 'int')
        )
    );
    }

    foreach ($consoles as &$console) {
        $cn->consulta(
            'insert into juegos_consolas (id_juego, id_consola) values (:idJuego, :idConsola)',
            array(
                array('idJuego', $ultimoId, 'int'),
                array('idConsola', $console, 'int')
            )
        );
    }
    
    return $file;
}

function getConsoles() {
    $cn = abrirConexion();
    $cn->consulta('select * from consolas');
    return $cn->restantesRegistros();
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
