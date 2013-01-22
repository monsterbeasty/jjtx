<?php

include_once 'functions.php';

// PERFORMANCE: GZIP, BROWSER CACHE - KEEP ALIVE
ob_start("ob_gzhandler");

$ini_path = "/var/www/ini/config.ini";

$ini_array = parse_ini_file_ext($ini_path);

//foreach($ini_array as $key => $var)
//{
//    define($key, $var);
//}
?>