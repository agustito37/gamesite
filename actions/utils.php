<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function login($user, $password) {
    if ($user == 'test' && $password == 'test') {
        return array(name => 'Agustin Prieto', isAdmin => true);
    }
    
    return NULL;
}
