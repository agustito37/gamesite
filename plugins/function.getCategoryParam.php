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

function smarty_function_getCategoryParam($params, Smarty_Internal_Template $template)
{
    return addQueryParam('', 'catId', $params['category']);
}

