<?php

include_once 'lib/oauth/oauth_qq.php';

$o_qq = Oauth_qq::getInstance($CONFIG['qq']['oauth']);
$o_qq->login();

?>