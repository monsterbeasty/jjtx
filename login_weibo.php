<?php

include_once 'lib/oauth/weibo.php';

$o = new SaeTOAuthV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey']);
$code_url = $o->getAuthorizeURL($CONFIG['weibo']['oauth']['wb_callback']);

header("Location:$code_url");
?>

