<?php
function login($user, $password) {
    if ($user == 'test' && $password == 'test') {
        return array(name => 'Agustin Prieto', isAdmin => true);
    }
    
    return NULL;
}
