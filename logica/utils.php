<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getCategorias() {
    $categorias = array(
        array(id => 1, nombre => "Categoria 1"),
        array(id => 2, nombre => "Categoria 2"),
        array(id => 3, nombre => "Categoria 3"),
        array(id => 4, nombre => "Categoria 4"),
        array(id => 5, nombre => "Categoria 5"),
    );
            
    return $categorias;
}

function getCategoria($id) {
    if (isset($id)) {
        foreach(getCategorias() as $cat) {
            if ($cat['id'] == $id) {
                return $cat;
            }
        }
    }
    
    return NULL;
}

function getCategoriaActual() {
    if (isset($_GET['catId'])) {
        return getCategoria($_GET['catId']);
    }
    
    return NULL;
}

function agregarQueryParam($url, $name, $value) {
    $query = parse_url($url, PHP_URL_QUERY);

    if ($query) {
        $url .= '&';
    } else {
        $url .= '?';
    }
    $url .= $name . '=' . $value;
    
    return $url;
}

function getCategoriaParam($catId) {
    return agregarQueryParam('', 'catId', $catId);
}
