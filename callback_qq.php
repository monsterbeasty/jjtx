<?php

include_once 'lib/oauth/qq.php';

$o_qq = Oauth_qq::getInstance($CONFIG['qq']['oauth']);

$o_qq->callback();
$open_id = $o_qq->get_openid();
$user_info = $o_qq->get_user_info();

print_pre($open_id);
print_pre($user_info);

$gender = ($user_info['gender'] == '男') ? 'm' : 'f';
$image_small = $DB->real_escape_string($user_info['figureurl_1']);
$image_large = $DB->real_escape_string($user_info['figureurl_2']);

$query = "INSERT INTO user (oauth_provider, oauth_uid, name, gender, image_small, image_large, last_login_time)
                    VALUES ('qq', '$open_id', '$user_info[nickname]', '$gender', '$image_small', '$image_large', NOW())";

print_pre($query);

$result = $DB->query($query);

print_pre($result);

if(!$result)
{
    print_pre('User data insert failed');
}
else
{
    print_pre('User data insert successful');
}

/* ADD A QQ SHARE */
//$add_share = $o_qq->add_share($CONFIG['qq']['share']['title'], $CONFIG['qq']['share']['url'], 
//        $CONFIG['qq']['share']['site'], $CONFIG['qq']['share']['fromurl']);
//
//print_pre($add_share);

exit;
?>