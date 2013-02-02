<?php

// GZIP COMPRESSION
ob_start("ob_gzhandler");

// ENVIRONMENT IDENTIFIER, READ FROM VHOST CONF FILE
$ENV = getenv('ENVIRONMENT');

// APC CACHE THE CONFIG DATA
if(!apc_exists('config_const'))
{
    $CONFIG = require_once 'config.php';
    if($ENV == 'dev')
    {
        $CONFIG['site_url'] = 'http://dev.xpttk.com';
        $CONFIG['db']['name'] = 'jjtx_dev';
    }
    elseif($ENV == 'prod')
    {
        $CONFIG['site_url'] = 'http://xpttk.com';
        $CONFIG['db']['name'] = 'jjtx_prod';
    }
    
    $CONFIG['qq']['oauth']['callback'] = $CONFIG['site_url'] . '/callback_qq.php';
    $CONFIG['weibo']['oauth']['wb_callback'] = $CONFIG['site_url'] . '/callback_weibo.php';
    
    // THE ABOUT PAGE NEEDS TO BE ADDED
    $CONFIG['qq']['share']['url'] = $CONFIG['site_url'] . '/about.php';
    $CONFIG['qq']['share']['fromurl'] = $CONFIG['site_url'];
    
    apc_store('config_const', $CONFIG);
}
else
{
    $CONFIG = apc_fetch('config_const');
}

// INITIALIZE DB CONN
include_once 'db.php';
include_once 'functions.php';


// COMMENTED OUT INI PARSING, USE PHP ARRAY FILE INSTEAD
// PARSE INI TO GET CONFIG VARIABLES
/*$ini_path = "/var/www/jjtx/$env/ini/config.ini";
$ini_array = parse_ini_file_ext($ini_path);
foreach($ini_array as $key => $var)
{
    define($key, $var);
}*/

?>