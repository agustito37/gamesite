<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function addQueryParam($url, $name, $value) {
    $query = parse_url($url, PHP_URL_QUERY);

    if ($query) {
        $url .= '&';
    } else {
        $url .= '?';
    }
    $url .= $name . '=' . $value;
    
    return $url;
}