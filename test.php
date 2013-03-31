<?php

//apc_clear_cache('config_const');
//exit;
//$a = apc_fetch('config_const');
//print_pre($a);
//exit;
//$add_share = $o_qq->add_share($CONFIG['qq']['share']['title'], $CONFIG['qq']['share']['url'], 
//        $CONFIG['qq']['share']['site'], $CONFIG['qq']['share']['fromurl'])";
//print_pre($CONFIG);


print_pre($_COOKIE);
exit;

$a = array('aaa', 'bbb');

//fa1p1qupmue4b2regf91ucsd96

setcookie('a', $a);
exit;

include_once 'lib/oauth/weibo.php';

$token = '2.00KQMTcCqrxnBCf66d860aaf0wU1r1';
$uid   = '2400725074';

$c         = new SaeTClientV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey'], $token);
$ms        = $c->home_timeline(); // done
$uid_get   = $c->get_uid();
$uid       = $uid_get['uid'];
$user_info = $c->show_user_by_id($uid); //根据ID获取用户等基本信息

print_pre("@@@@@@@@@@@@@@@@@@@@");
print_pre($uid);
print_pre($uid_get);
print_pre("@@@@@@@@@@@@@@@@@@@@");

print_pre("@@@@@@@@@@@@@@@@@@@@");
print_pre($uid);
print_pre($user_info);
print_pre("@@@@@@@@@@@@@@@@@@@@");
?>