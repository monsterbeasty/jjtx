<?php

include_once 'lib/oauth/qq.php';

$o_qq = Oauth_qq::getInstance($CONFIG['qq']['oauth']);

$o_qq->callback();
$open_id = $o_qq->get_openid();
$user_info = $o_qq->get_user_info();

print_pre($open_id);
print_pre($user_info);

$data['oauth_provider'] = 'qq';
$data['oauth_uid'] = $open_id;
$data['name'] = $user_info['nickname'];
$data['gender'] = $user_info['gender'];
$data['image_small'] = $user_info['figureurl_1'];
$data['image_large'] = $user_info['figureurl_2'];

$login = login($data);


/* ADD A QQ SHARE */
//$add_share = $o_qq->add_share($CONFIG['qq']['share']['title'], $CONFIG['qq']['share']['url'], 
//        $CONFIG['qq']['share']['site'], $CONFIG['qq']['share']['fromurl']);
//
//print_pre($add_share);

exit;
?>