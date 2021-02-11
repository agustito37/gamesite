<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getCategories() {
    $categorias = array(
        array(id => 1, name => "Acción"),
        array(id => 2, name => "Arcade"),
        array(id => 3, name => "Deportes"),
        array(id => 4, name => "Estrategia"),
        array(id => 5, name => "Horror"),
        array(id => 5, name => "Multiplayer"),
        array(id => 5, name => "Shooter"),
        array(id => 5, name => "Simulación"),
    );
            
    return $categorias;
}

function getCategory($id) {
    if (isset($id)) {
        foreach(getCategories() as $cat) {
            if ($cat['id'] == $id) {
                return $cat;
            }
        }
    }
    
    return NULL;
}
