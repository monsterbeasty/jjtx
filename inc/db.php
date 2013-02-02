<?php

/* Connect to a MySQL server */
$DB = new mysqli(
        $CONFIG['db']['host'],
        $CONFIG['db']['user'],
        $CONFIG['db']['password'],
        $CONFIG['db']['name']
);

if(mysqli_connect_errno())
{
    printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
    exit;
}

$DB->set_charset('utf8');

?>
