<?php

//apc_clear_cache('config_const');
//exit;

//$a = apc_fetch('config_const');
//print_pre($a);
//exit;

//$add_share = $o_qq->add_share($CONFIG['qq']['share']['title'], $CONFIG['qq']['share']['url'], 
//        $CONFIG['qq']['share']['site'], $CONFIG['qq']['share']['fromurl'])";

//print_pre($CONFIG);

$a = test();
exit;

$query = "select * from bike";

if($result = $DB->query($query))
{
    $row_cnt = $result->num_rows;
    print_pre("num rows: $row_cnt");
    
    // USER EXISTS
    if($row_cnt > 0)
    {
        $row = $result->fetch_assoc();
//        while($row = $result->fetch_assoc())
//        {
//            $rows[] = $row;
//        }
    }
}
//print_pre($rows);
print_pre($row);

?>