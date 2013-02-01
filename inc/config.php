<?php

return array(
    
    // DB CONN VARIABLES
    'db' => array(
        'host' => 'localhost',
        'user' => 'jjtx_dev',
        'password' => 'jjtx@dev41212102',
    ),
    
    // QQ API
    'qq' => array(
        'oauth' => array(
            'appid' => '100348952',
            'appkey' => 'fc1813885f7f282fa957268ae8beab7e',
        ),
        
        // THIS NEEDS TO BE SET LATER
        'share' => array(
            'title' => '关于JJTX', //no space allowed
            'site' => 'JJTX',
        ),
    ),
    
    // WEIBO API CREDENTIALS
    'weibo' => array(
        'oauth' => array(
            'wb_akey' => '1858950206',
            'wb_skey' => '480107614be8b1b7d6863dcebe71cdbf',
        ),
    ),
    
);

?>