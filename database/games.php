<?php

require_once 'helpers.php';

function adjustGameScore($gameId) {
    $cn = abrirConexion();
    $cn->consulta("
            select avg(comentarios.puntuacion) as average 
            from juegos 
            inner join comentarios on comentarios.id_juego = juegos.id
            where juegos.id= :id
        ",
        array(
            array('id', $gameId, 'int')
        )
    );
    
    $average = $cn->siguienteRegistro()['average'];
    
    $cn->consulta(
        'update juegos set puntuacion= :average where id= :id',
        array(
            array('id', $gameId, 'int'),
            array('average', $average, 'string')
        )
    );
}

function incrementGameVisits($gameId) {
    $cn = abrirConexion();
    $cn->consulta(
        'update juegos set visualizaciones = visualizaciones + 1 where id= :id',
        array(
            array('id', $gameId, 'int')
        )
    );
}

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

function getPaginatedGames($genreId, $consoleId, $query, $sort = 'puntuacion', $isDescending = true, $page = 1) {
    $size = 8;
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
    if (!empty($consoleId)) {
        $conditions .= empty($conditions) ? ' where' : ' and';
        $conditions .= " 
            exists(
                select 1 from juegos_consolas 
                where juegos_consolas.id_juego = juegos.id 
                and juegos_consolas.id_consola = :consoleId
            )
        ";
        array_push($conditionalParameters, array('consoleId', $consoleId, 'int'));
    }
    if (!empty($query)) {
        $conditions .= empty($conditions) ? ' where' : ' and';
        $conditions .= ' juegos.nombre LIKE :query';
        array_push($conditionalParameters, array('query', '%'.$query.'%', 'string'));
    }
   
    $order .= ' order by juegos.'.$sort.($isDescending ? ' desc' : ' asc').', juegos.id'.($isDescending ? ' asc' : ' desc');
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
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, juegos.url_video, juegos.resumen, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
        where juegos.id= :id
    ";
    $cn->consulta($sql, array(array('id', $id, 'int')));
    
    return $cn->siguienteRegistro();
}

function getTopGame() {
    $cn = abrirConexion();
    $sql = "
        select juegos.id, juegos.nombre as nombre_juego, juegos.poster, juegos.puntuacion, juegos.fecha_lanzamiento, juegos.empresa, juegos.visualizaciones, juegos.url_video, juegos.resumen, generos.nombre as nombre_genero
        from juegos
        inner join generos on juegos.id_genero = generos.id
        order by juegos.puntuacion desc
        limit 1, 1
    ";
    $cn->consulta($sql);
    
    return $cn->siguienteRegistro();
}

function createGame($name, $genre, $consoles, $date, $company, $summary, $video, $imageName) {
    $formattedDate = date('Y-m-d', strtotime($date));
    $cn = abrirConexion();
    $cn->consulta(
        'insert into juegos (nombre, id_genero, fecha_lanzamiento, empresa, url_video, resumen) values (:name, :genre, :date, :company, :video, :summary)',
        array(
            array('name', $name, 'string'),
            array('genre', $genre, 'int'),
            array('date', $formattedDate, 'string'),
            array('company', $company, 'string'),
            array('video', $video, 'string'),
            array('summary', $summary, 'string')
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
