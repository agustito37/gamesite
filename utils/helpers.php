<?php

function addQueryParam($url, $name, $value) {
    $transformed = $url;
    
    if ($value) {
        $query = parse_url($url, PHP_URL_QUERY);

        if ($query) {
            $transformed .= '&';
        } else {
            $transformed .= '?';
        }
        $transformed .= $name . '=' . $value;
    }
    
    return $transformed;
}

function getUserFromSession() {
    session_start();
    return $_SESSION['user'];
}
