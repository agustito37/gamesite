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
function smarty_function_getScoreColor($params, Smarty_Internal_Template $template)
{
    $score = $params['score'];
            
    if ($score <= 40) {
        return 'danger';
    } else if ($score <= 75) {
        return 'warning';
    } else {
        return 'success';
    }
}
