<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function login($usuario, $password) {
    if ($usuario == 'test' && $password == 'test') {
        return array(nombre => 'Agustin Prieto');
    }
    
    return NULL;
}

function getProductos() {
    $productos = array(
        array(id => 1, nombre => "Mario Bros", categoria => 2, fecha => date("Y/m/d"), puntaje => 89, visualizaciones => 0, img => "https://images-na.ssl-images-amazon.com/images/I/71mSOdy%2BwIL._SY606_.jpg"),
        array(id => 2, nombre => "God of War", categoria => 1, fecha => date("Y/m/d"), puntaje => 52, visualizaciones => 0, img => "https://images-na.ssl-images-amazon.com/images/I/91VKfyGGkYL._SL1500_.jpg"),
        array(id => 3, nombre => "Age of Empires 2", categoria => 1, fecha => date("Y/m/d"), puntaje => 78, visualizaciones => 0, img => "https://upload.wikimedia.org/wikipedia/en/5/56/Age_of_Empires_II_-_The_Age_of_Kings_Coverart.png"),
        array(id => 4, nombre => "League of Legends", categoria => 1, fecha => date("Y/m/d"), puntaje => 23, visualizaciones => 0, img => "https://theme.zdassets.com/theme_assets/43400/87a1ef48e43b8cf114017e3ad51b801951b20fcf.jpg"),
        array(id => 5, nombre => "Fortnite", categoria => 1, fecha => date("Y/m/d"), puntaje => 49, visualizaciones => 0, img => "https://image-cdn.essentiallysports.com/wp-content/uploads/20200429184921/MV5BOGY3ZjM3NWUtMWNiMi00OTcwLWIxN2UtMjNhMDhmZWRlNzRkXkEyXkFqcGdeQXVyNjMxNzQ2NTQ%40._V1_.jpg"),
        array(id => 5, nombre => "Minecraft", categoria => 1, fecha => date("Y/m/d"), puntaje => 97, visualizaciones => 0, img => "https://upload.wikimedia.org/wikipedia/en/5/51/Minecraft_cover.png"),
        array(id => 5, nombre => "Mortal Kombat", categoria => 1, fecha => date("Y/m/d"), puntaje => 12, visualizaciones => 0, img => "data:image/jpeg;base64,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"),
        array(id => 5, nombre => "Pokemon", categoria => 1, fecha => date("Y/m/d"), puntaje => 67, visualizaciones => 0, img => "https://s3.gaming-cdn.com/images/products/6152/271x377/pokemon-sword-expansion-pass-switch-cover.jpg"),
    );
            
    return $productos;
}

function getColorPuntaje($puntuacion) {
    if ($puntuacion <= 40) {
        return 'danger';
    } else if ($puntuacion <= 75) {
        return 'warning';
    } else {
        return 'success';
    }
}

function getProducto($id) {
    if (isset($id)) {
        foreach(getProductos() as $prod) {
            if ($prod['id'] == $id) {
                return $prod;
            }
        }
    }
    
    return NULL;
}

function getProdUrl($id) {
    return '/detalle.php?prodId=' . $id;
}

function getCategorias() {
    $categorias = array(
        array(id => 1, nombre => "Acción"),
        array(id => 2, nombre => "Arcade"),
        array(id => 3, nombre => "Deportes"),
        array(id => 4, nombre => "Estrategia"),
        array(id => 5, nombre => "Horror"),
        array(id => 5, nombre => "Multiplayer"),
        array(id => 5, nombre => "Shooter"),
        array(id => 5, nombre => "Simulación"),
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
