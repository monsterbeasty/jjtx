<?php
include_once 'Oauth_qq.php';

function print_pre($array)
{
    print("<pre>");
    $output = print_r($array, true);
    print(htmlspecialchars($output));
    print("</pre>");
}

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