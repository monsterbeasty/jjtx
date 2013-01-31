<?php

include_once 'lib/oauth/weibo.php';

$o = new SaeTOAuthV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey']);

if(isset($_REQUEST['code']))
{
    $keys = array();
    $keys['code'] = $_REQUEST['code'];
    $keys['redirect_uri'] = $CONFIG['weibo']['oauth']['wb_callback'];
    try
    {
        $token = $o->getAccessToken('code', $keys);
    }
    catch(OAuthException $e)
    {
        
    }
}

if($token)
{
    $_SESSION['token'] = $token;
    setcookie('weibojs_' . $o->client_id, http_build_query($token));

    $c = new SaeTClientV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey'], $_SESSION['token']['access_token']);
    $ms = $c->home_timeline(); // done
    $uid_get = $c->get_uid();
    $uid = $uid_get['uid'];
    $user_message = $c->show_user_by_id($uid); //根据ID获取用户等基本信息

    print_pre("@@@@@@@@@@@@@@@@@@@@");
    print_pre($ms);
    print_pre("@@@@@@@@@@@@@@@@@@@@");

    print_pre("@@@@@@@@@@@@@@@@@@@@");
    print_pre($uid);
    print_pre($uid_get);
    print_pre("@@@@@@@@@@@@@@@@@@@@");

    print_pre("@@@@@@@@@@@@@@@@@@@@");
    print_pre($uid);
    print_pre($user_message);
    print_pre("@@@@@@@@@@@@@@@@@@@@");
    
    $ret = $c->update('sae test'); //发送微博
    if(isset($ret['error_code']) && $ret['error_code'] > 0)
    {
        echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
    }
    else
    {
        echo "<p>发送成功</p>";
    }
}
else
{
    echo "Auth failed";
}
?>
