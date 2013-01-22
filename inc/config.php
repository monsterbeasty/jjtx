<?php

// GZIP COMPRESSION
ob_start("ob_gzhandler");

include_once 'functions.php';

// ENVIRONMENT IDENTIFIER
$env = getenv('ENVIRONMENT');
define('ENV', $env);

if($env == 'dev')
{
    define('SITE_URL', 'http://dev.xpttk.com');
}
elseif($env == 'prod')
{
    define('SITE_URL', 'http://xpttk.com');
}


// PARSE INI TO GET CONFIG VARIABLES
$ini_path = "/var/www/jjtx/$env/ini/config.ini";
$ini_array = parse_ini_file_ext($ini_path);
foreach($ini_array as $key => $var)
{
    define($key, $var);
}

// OAUTH QQ
$oauth_qq_config = array();
define('OAUTH_QQ_CALLBACK_URL', SITE_URL . '/callback_qq.php');
if(!apc_exists('oauth_qq_config'))
{
    $oauth_qq_config['appid'] = OAUTH_QQ_APPID;
    $oauth_qq_config['appkey'] = OAUTH_QQ_APPKEY;
    $oauth_qq_config['callback'] = OAUTH_QQ_CALLBACK_URL;
    apc_store('oauth_qq_config', $oauth_qq_config);
}
else
{
    $oauth_qq_config = apc_fetch('oauth_qq_config');
}


?>