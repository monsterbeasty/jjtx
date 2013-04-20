<?php

include_once("inc/pre.php");

function login_check()
{
    $result = array();

    // NEED TO DO THE TIME COMPARISON TO CHECK LAST LOGIN: WEIBO OR QQ

    if (isset($_COOKIE['wb_at']) && $_COOKIE['wb_at'] != '')
    {
        include_once 'lib/oauth/weibo.php';
        parse_str($_COOKIE['wb_at'], $wb_at);
        $o = new SaeTOAuthV2($CONFIG['weibo']['oauth']['wb_akey'], $CONFIG['weibo']['oauth']['wb_skey']);
        $access_token = $o->getTokenFromArray($wb_at);
        if($access_token)
        {
            setcookie('wb_at', http_build_query($wb_at), time() + 60*60*24*365);
            setcookie('wb_lt', date('YmdHis'), time() + 60*60*24*365);
            
            // GET THE USER INFO BY THE ACCESS TOKEN
            $result['user'] = get_user('', 'weibo', $access_token['access_token'], 'id, name, image_small, reminder');
            $result['ok'] = '1';
        }
        else
        {
            $result['ok'] = '0';
        }
    }
    else
    {
        $result['ok'] = '0';
    }

    return $result;
}

function change_reminder($option)
{
    $result = array();
    
    $login_result = login_check();
    // USER NOT LOGGED IN
    if($login_result['ok'] == '1')
    {
        $set_result = set_user_reminder($login_result['user']['id'], $option);
        $result['ok'] = ($set_result) ? '1' : '0';
    }
    // USER LOGGED IN
    else
    {
        $result['ok'] = '0';
        $result['error'] = 'notLoggedIn';
    }
    
    return $result;
}

$data = $_POST;

switch ($data['action'])
{
    case "login_check":
        $return = login_check();
        break;
    case "change_reminder":
        $return = change_reminder($data['option']);
        break;
}

echo json_encode($return);
?>