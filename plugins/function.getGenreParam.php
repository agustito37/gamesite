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

function smarty_addQueryParam($url, $name, $value) {
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

function smarty_function_getGenreParam($params)
{
    return smarty_addQueryParam('', 'genreId', $params['genre']);
}

