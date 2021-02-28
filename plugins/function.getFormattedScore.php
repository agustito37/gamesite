<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.getScoreColor.php
 * Type:     function
 * Name:     getScoreColor
 * Purpose:  get color of that particular score
 * -------------------------------------------------------------
 */
function smarty_function_getFormattedScore($params)
{
    $formatted = str_replace('.0', '', strval($params['score']));
    return $formatted == '0' ? '-' : $formatted;
}
