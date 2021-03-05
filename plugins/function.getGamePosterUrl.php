<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.getCategoryParam.php
 * Type:     function
 * Name:     getCategoryParam
 * Purpose:  get url with catId query param
 * -------------------------------------------------------------
 */
require_once dirname(__FILE__).'/../config/configuration.php';

function smarty_function_getGamePosterUrl($params)
{
    global $PUBLIC_PATH;
    
    $poster = $params['poster'];
    
    if (!$poster) {
        return $PUBLIC_PATH.'imgs/default.jpg!d';
    }
    
    if (strpos($poster, 'http') !== false) {
        return $poster;
    }
        
    return $PUBLIC_PATH.'imgs/'.$poster;
}

