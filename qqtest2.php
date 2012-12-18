
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>QQ_OAuth JS版登录</title>
    <!-- 此处配置好data-appid:QQ平台分配给你的APPID，data-redirecturi：回调地址，这里为Redirect.html -->
    <!--<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100225699" data-redirecturi="http://www.unvs.cn/oauth/qq_js/qqlogin.html" charset="utf-8"></script>-->
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100348952" data-redirecturi="http://dev.xpttk.com" charset="utf-8"></script>
</head>
<body>
<span id="qqLoginBtn"></span>
<!--<script type="text/javascript">//该注释代码为默认QQ登录样式
    QC.Login({
        btnId: "qqLoginBtn"	//插入按钮的节点id
    });
</script>-->
<script type="text/javascript">//该段代码为QQ登录处自定义显示脚本
    //调用QC.Login方法，指定btnId参数将按钮绑定在容器节点中
    QC.Login({
        //btnId：插入按钮的节点id，必选
        btnId: "qqLoginBtn",
        //用户需要确认的scope授权项，可选，默认all
        scope: "all",
        //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
        size: "A_XL"
    }, function (reqData, opts) {//登录成功
        //根据返回数据，更换按钮显示状态方法
        var dom = document.getElementById(opts['btnId']),
       _logoutTemplate = [
        //头像
            '<span><img src="{figureurl}" class="{size_key}"/></span><br/>',
        //昵称
            '<span style="color:#690;">{nickname}，您好，欢迎使用Unvs博客-OAuth演示站，您已成功接入QQ！</span><br/>',
        //退出
            '<span><a href="javascript:QC.Login.signOut();" style="color:#f60;">==点此登出==</a></span>'
                     ].join("");
        dom && (dom.innerHTML = QC.String.format(_logoutTemplate, {
            nickname: QC.String.escHTML(reqData.nickname),
            figureurl: reqData.figureurl
        }));
    }, function (opts) {//注销成功
        alert('QQ登录 注销成功');
    }
);
    if (QC.Login.check()) {//如果已登录
        //这里可以调用自己的保存接口

        //用JS SDK调用OpenAPI获取用户信息
        var paras = {};
        QC.api("get_user_info", paras)
        //指定接口访问成功的接收函数，s为成功返回Response对象
	    .success(function (s) {
	        //成功回调，通过s.data获取OpenAPI的返回数据
	        alert("获取用户信息成功！当前用户昵称为：" + s.data.nickname);
	    })
	    //指定接口访问失败的接收函数，f为失败返回Response对象
	    .error(function (f) {
	        //失败回调
	        alert("获取用户信息失败！");
	    })
	    //指定接口完成请求后的接收函数，c为完成请求返回Response对象
	    .complete(function (c) {
	        //完成请求回调
	        alert("获取用户信息完成！");
	    });

	    //调用自己的接口，保存信息
        //......
    }
</script>
</body>
</html>
