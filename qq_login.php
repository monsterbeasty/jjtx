<?php

include_once 'Oauth_qq.php';

session_start();

$config['appid'] = '100348952';
$config['appkey'] = 'fc1813885f7f282fa957268ae8beab7e';
$config['callback'] = 'http://dev.xpttk.com/test.php';
$o_qq = Oauth_qq::getInstance($config);

//then
$o_qq->login();
//or
//$o_qq->callback();
//$o_qq->get_openid();
//$o_qq->get_user_info();
?>