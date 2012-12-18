<!DOCTYPE>
<html>
    <head>
        <title>JJTX_DEV: QQ_OAuth JS SDK Version</title>
        <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100348952" data-redirecturi="http://dev.xpttk.com/testqq.php" charset="utf-8"></script>
    </head>
    <body>
        <span id="qqLoginBtn"></span>
        <script type="text/javascript">
            //Here is the QQ login Auth
            //Call QC.Login
            QC.Login({
                //btnId: mandatory
                btnId: "qqLoginBtn",
                //scope: auth option, optional, default all
                scope: "all",
                //button size, available values: A_XL| A_L| A_M| A_S|  B_M| B_S| C_S, optional, default B_S
                size: "A_XL"
            }, function(reqData, opts) {
                //Login successfully
                //Change button display methods based on the return value
                var dom = document.getElementById(opts['btnId']),
                        _logoutTemplate = [
                        //profile photo
                        '<span><img src="{figureurl}" class="{size_key}"/></span><br/>',
                        //nickname
                        '<span style="color:#690;">{nickname}, Hello thanks for using JJTX_DEV, you have successfully logged in using QQ Auth!</span><br/>',
                        //Logout button
                        '<span><a href="javascript:QC.Login.signOut();" style="color:#f60;">==Click here to log out==</a></span>'
                        ].join("");
                dom && (dom.innerHTML = QC.String.format(_logoutTemplate, {
                    nickname: QC.String.escHTML(reqData.nickname),
                    figureurl: reqData.figureurl
                }));
            }, function(opts) {
                //log off
                alert('QQ Auth: log off successfully');
            }
            );
            if (QC.Login.check()) {//if logged in already
                //using the saved logged in info

                //use JS SDK to call OpenAPI to get the user info
                var paras = {};
                QC.api("get_user_info", paras)
                        .success(function(s) {
                    alert("Successfully get the user info! The nickname of the current user is:" + s.data.nickname);
                })
                        .error(function(f) {
                    alert("Failed to get the user info!");
                })
                        .complete(function(c) {
                    alert("Complete getting user info!");
                });

                //HERE FOR JJTX FUNCTIONS (EG, SAVING THE USER INFO OR LOGGIN INFO)
                //
            }
        </script>
    </body>
</html>
