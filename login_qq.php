<?php

include_once 'lib/oauth/oauth_qq.php';

$o_qq = Oauth_qq::getInstance($oauth_qq_config);
$o_qq->login();

?>