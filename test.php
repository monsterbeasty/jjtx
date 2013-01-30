<?php

//apc_clear_cache('config_const');
//exit;

$a = apc_fetch('config_const');
print_pre($a);
exit;

?>