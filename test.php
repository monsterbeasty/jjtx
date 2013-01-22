<?php

print_pre($ini_array);
exit;


$a = parse_ini_file_ext("/var/www/ini/config.ini");
print_pre($a);

$b = apc_cache_info();
print_pre('cached info:');
print_pre($b);

$c = apc_load_constants();
print_pre("cache load constants:");
print_pre($c);

exit;

    // Add num variable to data store
    apc_add('num', 1);
 
    // Print initial value
    echo "Initial value: ", apc_fetch('num'), "<br />";
 
    // Update old value with a new value
    apc_cas('num', 1, 10);
 
    // Print just updated value
    echo "Updated value: ", apc_fetch('num'), "<br />";
 
    // Decrease a stored number
    echo "Decrease 1: ", apc_dec('num'), "<br />";
    echo "Decrease 3: ", apc_dec('num', 3), "<br />";
 
    // Increase a stored number
    echo "Increase 2: ", apc_inc('num', 2), "<br />";
    echo "Increase 1: ", apc_inc('num'), "<br />";

    exit;

include_once 'oauth_qq.php';

//function print_pre($array)
//{
//    print("<pre>");
//    $output = print_r($array, true);
//    print(htmlspecialchars($output));
//    print("</pre>");
//}

session_start();

print_pre($_SESSION);

$config['appid'] = '100348952';
$config['appkey'] = 'fc1813885f7f282fa957268ae8beab7e';
$config['callback'] = 'http://dev.xpttk.com/test.php';
$o_qq = Oauth_qq::getInstance($config);

//then
//$o_qq->login();
//or
$o_qq->callback();

$open_id = $o_qq->get_openid();
$user_info = $o_qq->get_user_info();

print_pre($open_id);
print_pre($user_info);
?>