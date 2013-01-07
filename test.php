<?php

include_once 'Oauth_qq.php';

session_start();

function print_pre($array)
{
    print("<pre>");
    $output = print_r($array, true);
    print(htmlspecialchars($output));
    print("</pre>");
}

echo "test page";
print_pre($_COOKIE);
print_pre($_SESSION);
if(session_id() == '')
{
    // session isn't started
    print_pre("SESSION isn't started");
}
else
{
    print_pre("SESSION started");
}
exit;

$config['appid'] = '100348952';
$config['appkey'] = 'fc1813885f7f282fa957268ae8beab7e';
$config['callback'] = 'http://dev.xpttk.com/test.php';
$o_qq = Oauth_qq::getInstance($config);

$o_qq->callback();
$o_qq->get_openid();
$o_qq->get_user_info();

print_pre($_SESSION);



?>
