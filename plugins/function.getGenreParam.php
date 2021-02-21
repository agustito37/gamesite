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
require_once dirname(__FILE__).'/../utils/helpers.php';

function smarty_function_getGenreParam($params)
{
    return addQueryParam('', 'genreId', $params['genre']);
}

