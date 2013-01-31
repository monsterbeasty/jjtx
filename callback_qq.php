<?php

include_once 'lib/oauth/qq.php';

$o_qq = Oauth_qq::getInstance($CONFIG['qq']['oauth']);

$o_qq->callback();
$open_id = $o_qq->get_openid();
$user_info = $o_qq->get_user_info();

print_pre($open_id);
print_pre($user_info);

$add_share = $o_qq->add_share($CONFIG['qq']['share']['title'], $CONFIG['qq']['share']['url'], 
        $CONFIG['qq']['share']['site'], $CONFIG['qq']['share']['fromurl']);

print_pre($add_share);
?>