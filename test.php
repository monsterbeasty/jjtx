<?php

//apc_clear_cache('config_const');
//exit;

//$a = apc_fetch('config_const');
//print_pre($a);
//exit;

//$add_share = $o_qq->add_share($CONFIG['qq']['share']['title'], $CONFIG['qq']['share']['url'], 
//        $CONFIG['qq']['share']['site'], $CONFIG['qq']['share']['fromurl'])";

//print_pre($CONFIG);


$query = "INSERT INTO bike (Model, Color)
                    VALUES ('coupoer', 'red')";

print_pre($query);

$result = $DB->query($query);

print_pre($result);

if(!$result)
{
    print_pre('User data insert failed');
}
else
{
    print_pre('User data insert successful');
}

?>