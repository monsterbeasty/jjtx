<?php

function print_pre($array)
{
    print("<pre>");
    $output = print_r($array, true);
    print(htmlspecialchars($output));
    print("</pre>");
}

function parse_ini_file_ext($file, $sections = null)
{
    ob_start();
    include $file;
    $str = ob_get_contents();
    ob_end_clean();
    return parse_ini_string($str, $sections);
}

function login($data)
{
    global $DB;
    
    print_pre("$data[oauth_provider] login");
    print_pre("user data");
    print_pre($data);
    
    if($data['oauth_provider'] == 'qq')
    {
        $data['gender'] = ($data['gender'] == '男') ? 'm' : 'f';
    }
    
    $fields = array('oauth_provider', 'oauth_uid', 'oauth_access_token', 'gender', 'name', 'image_small', 'image_large');
    foreach($fields as $field)
    {
        $data[$field] = $DB->real_escape_string($data[$field]);
    }
    
    //WHETHER THIS USER EXISTS
    $query = "SELECT * FROM user WHERE oauth_provider = '$data[oauth_provider]' AND oauth_uid = '$data[oauth_uid]'";

    if($result = $DB->query($query))
    {
        $row_cnt = $result->num_rows;

        // USER EXISTS
        if($row_cnt > 0)
        {
            print_pre("User exists");

            $update_query = "UPDATE user SET status = 1, last_login_time = NOW() WHERE oauth_provider = '$data[oauth_provider]' AND oauth_uid = '$data[oauth_uid]'";
            if(!$update_result = $DB->query($update_query))
            {
                print_pre('User status and login time updated: failed');
            }
            else
            {
                print_pre('User status and login time updated: success');
            }
        }
        // USER NOT EXIST
        else
        {
            print_pre("User not exist");

            // INSERT DATA
            $insert_query = "INSERT INTO user (oauth_provider, oauth_uid, oauth_access_token, name, gender, image_small, image_large, last_login_time)
                        VALUES ('$data[oauth_provider]', '$data[oauth_uid]', '$data[oauth_access_token]', '$data[name]', '$data[gender]', '$data[image_small]', '$data[image_large]', NOW())";

            if(!$insert_result = $DB->query($insert_query))
            {
                print_pre('User data insert failed');
            }
            else
            {
                print_pre('User data insert successful');
            }
        }
    }
}

function get_user($id='', $oauth_provider='', $oauth_access_token='', $fields='')
{
    global $DB;
    
    $user = array();
    
    $field_query = ($fields == '') ? '*' : $fields;
    
    //WHETHER THIS USER EXISTS
    $query = "SELECT $field_query FROM user WHERE status = 1";
    
    if($id != '')
    {
        $query .= " AND id = $id";
    }
    if($oauth_provider != '')
    {
        $query .= " AND oauth_provider = '$oauth_provider'";
    }
    if($oauth_access_token != '')
    {
        $query .= " AND oauth_access_token = '$oauth_access_token'";
    }
    
    if($result = $DB->query($query))
    {
        $user = $result->fetch_assoc();
    }
    
    return $user;
}

function set_user_reminder($id, $option)
{
    global $DB;

    $set_result = false;
    
    $query = "UPDATE user SET reminder = '$option' WHERE id = $id";
    
    if($result = $DB->query($query))
    {
        $set_result = true;
    }
    
    return $set_result;
}

?>
