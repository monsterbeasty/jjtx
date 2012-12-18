<?php
echo "landing page: you have successfully logged in JJTX";
if(isset($_GET))
{
    if(!empty($_GET['code']))
        $code = $GET['code'];
}
?>


<html>
    <head>
    </head>
    <body>
        <p>
            <a href="https://api.weibo.com/oauth2/access_token?client_id=1858950206&client_secret=480107614be8b1b7d6863dcebe71cdbf&grant_type=authorization_code&redirect_uri=http://dev.xpttk.com/landing.php&code=<?=$code?>">Access Token</a>
        </p>
    </body>
</html>
