<?php

include_once 'lib/oauth/weibo.php';

$o = new SaeTOAuthV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey'], $CONFIG['weibo']['oauth']['wb_callback']);
$o->login();

?>

