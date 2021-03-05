<?php

require_once dirname(__FILE__).'/../database/conexion.php';

function getCommentGameId($id) {
    $cn = abrirConexion();
    
    $sql = 'select id_juego from comentarios where id= :id';
    $cn->consulta($sql, array(array('id', $id, 'int')));
    
    return $cn->siguienteRegistro()['id_juego'];
}

function deleteComment($id) {
    $cn = abrirConexion();
    $cn->consulta(
        'delete from comentarios where id= :id',
        array(
            array('id', $id, 'int')
        )
    );
}

function createComment($comment, $rating, $gameId, $userId) {
    $cn = abrirConexion();
    $cn->consulta(
        'insert into comentarios (texto, puntuacion, id_juego, id_usuario, fecha) values (:comment, :rating, :gameId, :userId, CURDATE())',
        array(
            array('comment', $comment, 'string'),
            array('rating', $rating, 'int'),
            array('gameId', $gameId, 'int'),
            array('userId', $userId, 'int')
        )
    );
    $ultimoId = $cn->ultimoIdInsert();
    
    return $ultimoId;
}

function getPaginatedComments($page = 1, $gameId) {
    $size = 5;
    $offset = ($page - 1) * $size;
    $pagingParameters = array(
        array('size', $size, 'int'),
        array('offset', $offset, 'int')
    );
    $conditionalParameters = array();
    $conditions = '';
    
    $select = 'select comentarios.*, usuarios.alias as alias_usuario';
    
    $table = ' from comentarios inner join usuarios on usuarios.id = comentarios.id_usuario';
    
    if (!empty($gameId)) {
        $conditions .= ' where comentarios.id_juego= :gameId';
        array_push($conditionalParameters, array('gameId', $gameId, 'int'));
    }
    
    $order .= ' order by comentarios.fecha desc';
    
    $limit .= ' limit :offset, :size';
    
    $cn = abrirConexion();
    $cn->consulta($select.$table.$conditions.$order.$limit, array_merge($pagingParameters, $conditionalParameters));
    $results = $cn->restantesRegistros();
    
    $count = "select count(*) as total";
    $cn->consulta($count.$table.$conditions, $conditionalParameters);
    $pageQuantity = ceil($cn->siguienteRegistro()['total'] / $size);
    
    return array(results => $results, pageQuantity => $pageQuantity);
}

function getCommentsFromGameCount($id) {
    $conditionalParameters = array();
    $conditions = '';
    
    $sql = "
        select count(*) as quantity
        from comentarios
    ";
    
    if (!empty($gameId)) {
        $conditions .= ' where id_juego= :gameId';
        array_push($conditionalParameters, array('gameId', $gameId, 'int'));
    }
    
    $cn = abrirConexion();
    $cn->consulta($sql.$conditions, $conditionalParameters);
    return $cn->siguienteRegistro()['quantity'];
}

function hasCommented($gameId, $userId) {
    $sql = "
        select 1
        from comentarios
        where comentarios.id_juego= :gameId
        and comentarios.id_usuario= :userId
    ";
    
    $cn = abrirConexion();
    $cn->consulta($sql, array(
        array('gameId', $gameId, 'int'),
        array('userId', $userId, 'int')
    ));
    
    $hasCommented = $cn->cantidadRegistros() > 0;
    return $hasCommented;
}
