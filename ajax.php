<?php

include_once("inc/pre.php");

function get_repeat_options($date)
{
    $result = array();
    if(check_date($date) == 0)
    {
        $result['ok'] = '0';
    }
    else
    {
        $result['ok'] = '1';
        $result['day_of_week'] = date('N', strtotime($date));
        $result['day_of_week_format'] = date('l', strtotime($date));
        $result['day_of_month'] = date('j', strtotime($date));
        $result['day_of_month_format'] = date('jS', strtotime($date));
        $result['month_of_year'] = date('n', strtotime($date));
        $result['month_of_year_format'] = date('F', strtotime($date));
    }
    return $result;
}

function login_check($o)
{
    $result = array();
    $result['ok'] = '1';
    $result['date'] = date('Y-m-d');
    return $result;
}

$data = $_POST;

switch($data['action'])
{
    case "login_check":
        $return = login_check($data);
        break;
    case "get_repeat_options":
        $return = get_repeat_options($data['event_start_date']);
        break;
}

echo json_encode($return);
?>