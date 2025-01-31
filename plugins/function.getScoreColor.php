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
function smarty_function_getScoreColor($params)
{
    $score = $params['score'];
    
    if ($score == 0) {
        return 'secondary';
    } else if ($score <= 2.5) {
        return 'danger';
    } else if ($score <= 3.5) {
        return 'warning';
    } else {
        return 'success';
    }
}
