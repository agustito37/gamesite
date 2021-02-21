<?php

require_once 'helpers.php';

function getGames() {
    $cn = abrirConexion();
    $sql = "
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
    ";
    $cn->consulta($sql);
    return $cn->restantesRegistros();
}

function getGame($id) {
    $cn = abrirConexion();
    $sql = "
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
        where id= :id
    ";
    $cn->consulta($sql, array(array('id', $id, 'int')));
    
    return $cn->siguienteRegistro();
}

function getGamesOfGenre($id) {
    $cn = abrirConexion();
    $sql = "
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
        where juegos.id_genero = :id
    ";
    $cn->consulta($sql, array(array('id', $id, 'int')));
    return $cn->restantesRegistros();
}

function getGamesFromQuery($query) {
    $cn = abrirConexion();
    $sql = "
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
        where juegos.nombre LIKE :query
    ";
    $cn->consulta($sql, array(array('query', '%'.$query.'%', 'string')));
    return $cn->restantesRegistros();
}

function getGameConsoles($id) {
    $cn = abrirConexion();
    $sql = "
        select consolas.nombre
        from consolas
        inner join juegos on consolas.id_juego = :id
    ";
    $cn->consulta($sql, array(array('id', $id, 'int')));
    return $cn->restantesRegistros();
}

function createGame($name, $genre, $consoles, $date, $company, $imageName) {
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
    
    $file = NULL;
    if ($imageName) {
        $file = $ultimoId.'.'.pathinfo($imageName, PATHINFO_EXTENSION);
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