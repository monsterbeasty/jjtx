<?php

// GZIP COMPRESSION
ob_start("ob_gzhandler");

include_once 'functions.php';

// ENVIRONMENT IDENTIFIER, READ FROM VHOST CONF FILE
$ENV = getenv('ENVIRONMENT');

// APC CACHE THE CONFIG DATA
if(!apc_exists('config_const'))
{
    $CONFIG = require_once 'config.php';
    if($ENV == 'dev')
    {
        $CONFIG['site_url'] = 'http://dev.xpttk.com';
        $CONFIG['db_conn']['db_name'] = 'jjtx_dev';
    }
    elseif($ENV == 'prod')
    {
        $CONFIG['site_url'] = 'http://xpttk.com';
        $CONFIG['db_conn']['db_name'] = 'jjtx_prod';
    }
    
    $CONFIG['qq']['oauth']['callback'] = $CONFIG['site_url'] . '/callback_qq.php';
    $CONFIG['weibo']['oauth']['wb_callback'] = $CONFIG['site_url'] . '/callback_weibo.php';
    
    apc_store('config_const', $CONFIG);
}
else
{
    $CONFIG = apc_fetch('config_const');
}


// COMMENTED OUT INI PARSING, USE PHP ARRAY FILE INSTEAD
// PARSE INI TO GET CONFIG VARIABLES
/*$ini_path = "/var/www/jjtx/$env/ini/config.ini";
$ini_array = parse_ini_file_ext($ini_path);
foreach($ini_array as $key => $var)
{
    define($key, $var);
}*/

?>