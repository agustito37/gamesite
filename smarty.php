<?php
require_once dirname(__FILE__).'/libs/Smarty.class.php';
require_once dirname(__FILE__).'/config/configuration.php';

session_start();

function getSmarty() {
    global $SMARTY_TEMPLATES_DIR, 
           $SMARTY_COMPILES_DIR, 
           $SMARTY_CONFIG_DIR, 
           $SMARTY_CACHE_DIR, 
           $SMARTY_PLUGINS_DIR,
           $PUBLIC_PATH;
    
    $smarty = new Smarty();
    $smarty->template_dir = $SMARTY_TEMPLATES_DIR;
    $smarty->compile_dir = $SMARTY_COMPILES_DIR;
    $smarty->config_dir = $SMARTY_CONFIG_DIR;
    $smarty->cache_dir = $SMARTY_CACHE_DIR;
    $smarty->plugins_dir = $SMARTY_PLUGINS_DIR;
    
    $smarty->assign('public_path', $PUBLIC_PATH);
    
    return $smarty;
}
