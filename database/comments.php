<?php

require_once 'helpers.php';

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

function getCommentsFromGame($id) {
    $cn = abrirConexion();
    $sql = "
        select comentarios.*, usuarios.alias as alias_usuario
        from comentarios
        inner join usuarios on usuarios.id = comentarios.id_usuario
        where comentarios.id_juego= :id
    ";
    $cn->consulta($sql, array(array('id', $id, 'int')));
    return array(registros => $cn->restantesRegistros(), cantidad => $cn->cantidadRegistros());
}

function hasCommented($gameId, $userId) {
    $cn = abrirConexion();
    $sql = "
        select 1
        from comentarios
        where comentarios.id_juego= :gameId
        and comentarios.id_usuario= :userId
    ";
    $cn->consulta($sql, array(
        array('gameId', $gameId, 'int'),
        array('userId', $userId, 'int')
    ));
    
    $hasCommented = $cn->cantidadRegistros() > 0;
    return $hasCommented;
}
