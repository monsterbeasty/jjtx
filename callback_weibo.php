<?php

include_once 'lib/oauth/weibo.php';

$o = new SaeTOAuthV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey'], $CONFIG['weibo']['oauth']['wb_callback']);
$o->callback();

$c = new SaeTClientV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey'], $_SESSION['token']['access_token']);
$c->set_debug( true );

$ms = $c->home_timeline(); // done
print_pre($ms);

$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
print_pre($uid);

$user_message = $c->show_user_by_id($uid); //根据ID获取用户等基本信息
print_pre($user_message);

?>
