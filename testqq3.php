<?php

echo $_SESSION;

//APPID
$app_id = "100348952";
//APPKEY
$app_secret = "fc1813885f7f282fa957268ae8beab7e";
//redirect url
$my_url = "http://dev.xpttk.com/testqq3.php";

//Step1: Get Authorization Code
session_start();
$code = $_REQUEST["code"];
if (empty($code))
{
    //state CSRF
    $_SESSION['state'] = md5(uniqid(rand(), TRUE));
    //URL     
    $dialog_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id="
            . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
            . $_SESSION['state'];
    echo("<script> top.location.href='" . $dialog_url . "'</script>");
}

//Step2: Get Authorization Code and Access Token
if ($_REQUEST['state'] == $_SESSION['state'])
{
    //URL   
    $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
            . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
            . "&client_secret=" . $app_secret . "&code=" . $code;
    $response = file_get_contents($token_url);
    if (strpos($response, "callback") !== false)
    {
        $lpos = strpos($response, "(");
        $rpos = strrpos($response, ")");
        $response = substr($response, $lpos + 1, $rpos - $lpos - 1);
        $msg = json_decode($response);
        if (isset($msg->error))
        {
            echo "<h3>error:</h3>" . $msg->error;
            echo "<h3>msg  :</h3>" . $msg->error_description;
            exit;
        }
    }

    //Step3: Get Access Token and OpenID
    $params = array();
    parse_str($response, $params);
    $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" . $params['access_token'];
    $str = file_get_contents($graph_url);
    if (strpos($str, "callback") !== false)
    {
        $lpos = strpos($str, "(");
        $rpos = strrpos($str, ")");
        $str = substr($str, $lpos + 1, $rpos - $lpos - 1);
    }
    $user = json_decode($str);
    if (isset($user->error))
    {
        echo "<h3>error:</h3>" . $user->error;
        echo "<h3>msg  :</h3>" . $user->error_description;
        exit;
    }
    echo("Hello " . $user->openid);
}
else
{
    echo("The state does not match. You may be a victim of CSRF.");
}
?>