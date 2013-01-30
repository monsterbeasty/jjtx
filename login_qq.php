<?php

include_once 'lib/oauth/qq.php';

$o_qq = Oauth_qq::getInstance($CONFIG['qq']['oauth']);
$o_qq->login();

?>