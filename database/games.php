<?php

require_once 'helpers.php';

function getGames() {
    $cn = abrirConexion();
    $sql = "
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
        order by juegos.puntuacion desc
    ";
    $cn->consulta($sql);
    return $cn->restantesRegistros();
}

function getPaginatedGames($genreId, $query, $page) {
    $size = 4;
    $offset = ($page - 1) * $size;
    $pagingParameters = array(
        array('size', $size, 'int'),
        array('offset', $offset, 'int')
    );
    $conditionalParameters = array();
    $conditions = '';
    
    $select = "select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, generos.nombre as nombre_genero";
    $table = "
        from juegos
        inner join generos on juegos.id_genero = generos.id 
    ";
    
    if (!empty($genreId)) {
        $conditions .= ' where juegos.id_genero = :genreId';
        array_push($conditionalParameters, array('genreId', $genreId, 'int'));
    }
    if (!empty($query)) {
        $conditions .= empty($conditions) ? ' where' : ' and';
        $conditions .= ' juegos.nombre LIKE :query';
        array_push($conditionalParameters, array('query', '%'.$query.'%', 'string'));
    }
   
    $order .= ' order by juegos.puntuacion desc';
    $limit .= ' limit :offset, :size';
    
    $cn = abrirConexion();
    $cn->consulta($select.$table.$conditions.$order.$limit, array_merge($pagingParameters, $conditionalParameters));
    $results = $cn->restantesRegistros();
    
    $count = "select count(*) as total";
    $cn->consulta($count.$table.$conditions, $conditionalParameters);
    $pageQuantity = ceil($cn->siguienteRegistro()['total'] / $size);
    
    return array(results => $results, pageQuantity => $pageQuantity);
}

function getGame($id) {
    $cn = abrirConexion();
    $sql = "
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
        where juegos.id= :id
    ";
    $cn->consulta($sql, array(array('id', $id, 'int')));
    
    return $cn->siguienteRegistro();
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
