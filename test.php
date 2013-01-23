<?php

apc_clear_cache();
exit;

$a = apc_fetch('config_const');
print_pre($a);
exit;

?>