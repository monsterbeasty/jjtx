<?php

//apc_clear_cache('config_const');
//exit;
//$a = apc_fetch('config_const');
//print_pre($a);
//exit;
//$add_share = $o_qq->add_share($CONFIG['qq']['share']['title'], $CONFIG['qq']['share']['url'], 
//        $CONFIG['qq']['share']['site'], $CONFIG['qq']['share']['fromurl'])";
//print_pre($CONFIG);


$a = get_user(7, '', '', 'id, name, image_small');
print_pre($a);
exit;

print_pre($_COOKIE);

$a = $_COOKIE['weibojs_1858950206'];
print_pre($a);

parse_str($a, $output);
print_pre($output);

$l = '20130401194839';
$m = '20130331141922';

$b = strcmp($l, $m);
print_pre($b);
exit;


include_once 'lib/oauth/weibo.php';

$c         = new SaeTOAuthV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey']);
$d        = $c->getTokenFromArray($output); // done
print_pre($d);

exit;

$token = '2.00KQMTcCqrxnBCf66d860aaf0wU1r1';
$uid   = '2400725074';

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