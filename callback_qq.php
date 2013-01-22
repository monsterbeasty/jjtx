<?php

include_once 'lib/oauth/oauth_qq.php';

$o_qq = Oauth_qq::getInstance($oauth_qq_config);

$o_qq->callback();
$open_id = $o_qq->get_openid();
$user_info = $o_qq->get_user_info();

print_pre($open_id);
print_pre($user_info);
?>
