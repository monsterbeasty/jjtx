<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );

$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$o->set_debug( DEBUG_MODE );

// 生成state并存入SESSION，以供CALLBACK时验证使用
$state = uniqid( 'weibo_', true);
$_SESSION['weibo_state'] = $state;

$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL , 'code', $state );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Weibo demo page</title>
</head>

<body>
    <a href="<?=$code_url?>"><img src="weibo_login.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a>
</body>
</html>
