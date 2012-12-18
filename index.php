<?php
echo "QQ login page";
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta property="qc:admins" content="14314463566004436375" />
        <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100348952" data-redirecturi="dev.xpttk.com" charset="utf-8"></script>
    </head>
    <body>
        <p>
            <span id="qq_login_btn"></span>
            <script type="text/javascript">
                QC.Login({
                    btnId: "qq_login_btn"
                });
            </script>
        </p>

    </body>
</html>