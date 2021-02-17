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
require_once('utils.php');

function smarty_function_getGamePosterUrl($params)
{
    $poster = $params['poster'];
    
    if (!$poster) {
        return 'public/imgs/default.jpg!d';
    }
    
    if (strpos($poster, 'http') !== false) {
        return $poster;
    }
        
    return 'public/imgs/'.$poster;
}

