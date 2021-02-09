<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function connectionCategories() {
    $connection = new PDO('mysql:host=localhost;dbname=gamesite', 'root', 'root');

    $sql = "select * from categorias";

    $result = $connection->query($sql);

    $categories = $result->fetch_all(PDO::FETCH_ASSOC);
    return $categories;
}

function connectionCategory($id) {
    $connection = new PDO('mysql:host=localhost;dbname=gamesite', 'root', 'root');

    $sql = "select * from categorias where id= :id";

    $sentence = $connection->prepare($sql);
    $sentence->bindParam('id', $id, PDO::PARAM_INT);
    $result = $sentence.execute();

    $categories = $result->fetch(PDO::FETCH_ASSOC);
    return $categories;
}
