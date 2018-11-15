<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>
        东论 - 登录
    </title>
    <link media="screen" href="/h/css/bbs-common.css" type="text/css" rel="Stylesheet">
    <link media="screen" href="/h/css/base.css" type="text/css" rel="Stylesheet">
    <!-- 图标 开始 -->
    <link rel="stylesheet" type="text/css" href="/h/css/fonts/ptsans/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/h/css/fonts/icomoon/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/h/css/icons/icol16.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/h/css/icons/icol32.css" media="screen">
    <!-- 图标 结束 -->
    <script type="text/javascript" href="/h/js/App.component.js" async="true"></script><script type="text/javascript">
        var AppLoader_Config = {
            baseUrl: "/h/js",
            baseVersion: ""
        };
        var pageLoadStartTime = parseInt((new Date()).getTime());
        var channel = 'bbs';
    </script>
    <script type="text/javascript" href="/h/js/jquery.js"></script>
    <script type="text/javascript" href="/h/js/AppLoader.js"></script>
    <style type="text/css">
        body {
            margin: 0px auto 0px auto;
            font-size: 12px;
            color: #000000;
            font-family: "宋体";
        }
        a {
            color: #000000;
        }
        .login-popo {
            position: absolute;
            height: auto;
        }
        .login-popo {
            width: 150px;
            height: 18px;
            line-height: 18px;
            border: 1px solid #eddead;
            background-color: #fffce9;
            overflow: hidden;
            top: 70px;
            right: 24px;
        }
            .login-popo span {
                display: inline-block;
                _display: inline;
                zoom: 1;
                width: 200px;
                color: #c69324;
                overflow: hidden;
            }
        .close {
            position: absolute;
            top: 4px;
            right: 10px;
            padding-top: 15px;
            width: 15px;
            height: 0;
            background: url(/h/images/icon_common.png) no-repeat 4px 4px;
            overflow: hidden;
            z-index: 9;
        }
        .nameBox a i {
            display: inline-block;
            _display: inline;
            _zoom: 1;
            text-decoration: underline;
            margin-left: 1px;
            padding: 0 1px;
            color: #ec5810;
            height: 12px;
            font: 400 12px/1 Arial;
            border-radius: 2px;
        }
        .nameBox a {
            margin: 0 5px 0 0;
        }
    </style>
    <style type="text/css">
        .signul { border-bottom: 1px solid #e6e6e6; overflow-x: hidden;}
        .signul li {width: 100%;float: left;margin: 0 0 0px 0;color: #999;font: normal 14px/24px "微软雅黑";}
        .signul li h2.on {background: #ffaa00;color: #fff;font-weight: bold;}
        .signul li h2 {float: left;width: 50%;cursor: pointer;text-align: center;font: normal 16px/36px "微软雅黑";background: #ddd;}
        .loginnumber01 li .btnyz {width: 80px;font-size: 12px;border: 1px solid #eaeaea;border-left: 0px;height: 20px;color: #999;}      
        /* login */
        .loginForm{width:258px; height: auto; margin:15px auto 0px auto;}
        .loginForm li {padding:12px 0px 0px 0px;display: block;}
        .loginnumber01 li i{width:35px; float:left; line-height:24px;}
        .loginForm .input010 {border: 1px solid #ddd;height: 20px;width: 164px;color:rgb(187, 187, 187); padding:2px 0px 0px 6px; outline:none;}
        .loginForm .setting {color: #666666;height:20px;line-height:20px; width:170px; float:left; padding-left:50px;}
        .loginForm .setting input {margin-right:2px; margin-top:-2px;vertical-align: middle;}
        .loginForm .setting input.labelbox {border: 0 none;}
        .loginForm .loginBtn { height:32px;border-bottom:#ddd 1px solid; clear:both;}
        .loginForm .loginBtn .input011 {border:1px solid #ec5810;cursor: pointer;height: 25px; line-height:25px;width:70px; margin-top:0px;color:#ec5810; float:left; margin-left:30px; margin:0 10px 0 0;}
        .loginForm .loginBtn .input012 {border:1px solid #999999;cursor: pointer;height: 23px;line-height:25px;width:90px;margin-top:0px;color:#666666; float:left; text-align:center;}
        .loginForm .personality {padding-top:0px;_padding-top:0px;*padding-top:0px;}
        .loginForm .personality .confirmBtn {width:86px;height:25px;background:#ec8a10;display:block;text-decoration:none;float:left; line-height:27px; text-align:center;font-weight:bold;color:#ffffff;margin-right:12px;overflow:hidden}
        .loginForm .personality .confirmBtn:hover{background:#ec5810;}
        .loginForm .personality h4 {font:normal 14px/28px "微软雅黑"; color:#666;}
        .loginForm a.myspaceBtn {width:86px;height:25px;background:#ec8a10;display:block;text-decoration:none;float:right;margin-top:10px;line-height:27px; text-align:center;font-weight:bold;color:#ffffff;overflow:hidden}
        .loginForm a.myspaceBtn:hover{background:#ec5810;}
        .loginForm .uboard { width:200px;height:20px;line-height:20px; padding-top:4px;overflow:hidden;}
        .loginForm .uboard a {display:block; float:left; padding-right:0px;height:20px; white-space:nowrap;border: 1px solid #ddd; text-align: center; margin: 0 7px 5px 0; border-radius: 6px; color: #888;}

        .loginForm .uboard a:link { outline:none; color: #333; text-decoration: none }
        .loginForm .uboard a:visited { color: #333; text-decoration: none }
        .loginForm .uboard a:hover, a:active { color: #ff9600; background-color: #ffffff;}
        .loginForm .uboard a:focus{ outline:0 }

        .loginForm .personInfo {padding:0px 15px 0px 15px;}
        .loginForm .personInfo dt {height:60px; width:60px;}
        .loginForm .personInfo dt,.loginForm .personInfo dd {display:inline;float:left;}
        .loginForm .personInfo dd {width:155px;word-wrap:break-word;float:right;margin:0px;}
        .loginForm .personInfo dd.nameBox {display: block;padding: 0 0 0px 5px; line-height:20px;}
        .loginForm .personInfo dd.nameBox a.name {display: block;height:20px;line-height:20px;float:left; white-space:nowrap;max-width:99px;_width:expression((document.documentElement.clientWidth||document.body.clientWidth)>87?"87px":"");margin-right:5px;overflow: hidden; font:normal 14px/16px "微软雅黑";}
        .personInfo-bd {clear: both; margin:15px auto 5px auto; width:210px; border-bottom:0px solid #ddd; height:45px; overflow:hidden;}
        .chars-bigsize {font-family:Arial;font-size:14px;height: 16px;overflow: hidden;}
        UL.personInfo-num {margin-left:-5px;overflow: hidden; float:left}
        UL.personInfo-num li {line-height:20px; border-right:1px solid #cccccc;float:left;overflow: hidden;padding:0px 10px;text-align: left; }
        UL.personInfo-num li.lastNode {border-right: medium none;}
        UL.personInfo-num li a {Color:#666;}
    </style>
</head>
<body>
    <!--已登录 start-->
        <div class="loginForm" style="margin-left:0px; width:100%; font-family:'微软雅黑'">
            <dl class="personInfo clearfix">
                <dt>
                    <a class="cBold cBlueBBS" href="http://u.cnool.net/my/mydynamics" target="_blank">
                        <img alt="c0900@qq" src="https://avatar.cnool.net/forumavatar/bbsavatar.aspx?u=c0900%40qq&amp;s=2" onerror="this.onerror=null;this.src='/h/images/common/noavatar_medium.gif';" width="60" height="60" class="thumb">
                    </a>
                </dt>
                <dd class="nameBox" style="width:220px;">
                    <a class="cBold cBlueBBS name" title="c0900@qq" href="http://u.cnool.net/my/mydynamics" target="_blank">
                        c0900@qq
                    </a>
                    <a class="cBlueBBS fr" href="http://u.cnool.net/pass/Logout" style="color:#ec5810;margin-top:-3px;" target="_top"><i class="fa icon-off" aria-hidden="true"></i> 退出</a><a class="cBlueBBS fr" href="http://bbs.cnool.net/home/rule" style="margin-top:-3px;" target="_top"><i class="fa icon-question-sign" aria-hidden="true"></i>帮助</a><br> <a id="userinfo_friends_link" class="cBlueBBS" href="http://u.cnool.net/my/mydynamics" target="_blank">动态 <i><span id="userinfo_friends" style="display:none;">0</span></i></a> <a class="cBlueBBS" href="http://u.cnool.net/my/info" target="_blank">设置</a>  <br>
                    <a class="cBlueBBS" href="http://u.cnool.net/my/privatemessage" target="_blank">私信 <i><span id="userinfo_prposts">0</span></i></a>
                    <a class="cBlueBBS" href="#" target="_blank" style="display:none;">提醒 <i>0</i></a>
                    <a class="cBlueBBS" href="http://u.cnool.net/my/atme" target="_blank">@我 <i><span id="userinfo_atme">0</span></i></a>     
                    <a class="cBlueBBS" href="http://u.cnool.net/CnoolVerify/Protocol" target="_blank">我要认证</a>
                </dd>
            </dl>
            <div class="personInfo-bd" style="width:290px;">
                <ul class="personInfo-num">
                    <li>
                        <a href="http://u.cnool.net/my/followding" title="我关注的人" target="_blank">
                            <span class="link-ra">关注</span>
                            <br>
                            <span class="chars-bigsize text-ra" id="userinfo_numifollow">14</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://u.cnool.net/my/fans" title="我在被谁关注" target="_blank">
                            <span class="link-ra">粉丝<em class="link-rb" style="display: none;"></em> </span><br>
                            <span class="chars-bigsize text-ra" id="userinfo_numfollowers">0</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://u.cnool.net/my/MyExpLogs?dataid=1" target="_blank">
                            <span class="link-ra">经验<em class="link-rb" style="display: none;"></em> </span><br>
                            <span class="chars-bigsize text-ra">
                                12
                            </span>
                        </a>
                    </li>
                    <li class="lastNode">
                        <a href="http://u.cnool.net/my/MyExpLogs?dataid=2" target="_blank">
                            <span class="link-ra">积分<em class="link-rb" style="display: none;"></em> </span><br>
                            <span class="chars-bigsize text-ra">
                                25
                            </span>

                        </a>
                    </li>
                </ul>
                <a target="_blank" class="myspaceBtn" href="/Home/write">我要发帖</a>
            </div>
            <ul style="padding:10px 10px 15px; overflow:hidden; border-top:1px solid #ddd; background:#f8f8f8;">
                <li class="personality">
                    <h4>常用版块：</h4>
                </li>
                <li class="uboard" id="uboard" style="height:auto; width:320px;">
                    <a href="/forum/%e7%94%9f%e6%b4%bb%e7%83%ad%e7%82%b9" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="生活热点">
                        生活热点
                    </a>
                    <a href="/forum/%e5%a4%a7%e5%ae%b6%e5%b0%8f%e5%ae%b6" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="大家小家">
                        大家小家
                    </a>
                    <a href="/forum/%e9%84%9e%e5%b7%9e%e5%8c%ba" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="鄞州区">
                        鄞州区
                    </a>
                    <a href="/forum/%e6%83%85%e7%bc%98%e9%9a%8f%e7%ac%94" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="情缘随笔">
                        情缘随笔
                    </a>
                    <a href="/forum/%e8%a1%8c%e5%9c%a8%e8%b7%af%e4%b8%8a" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="行在路上">
                        行在路上
                    </a>
                    <a href="/forum/%e4%b8%9c%e6%96%b9%e7%83%ad%e7%ba%bf%e5%8c%ba" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="东方热线区">
                        东方热线区
                    </a>
                    <a href="/forum/%e6%95%99%e5%b8%88%e8%ae%ba%e5%9d%9b" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="教师论坛">
                        教师论坛
                    </a>
                    <a href="/forum/%e5%8d%95%e4%bc%91%e6%b8%b8%e8%b5%b0" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="单休游走">
                        单休游走
                    </a>
                    <a href="/forum/%e5%a4%a7%e5%ad%a6%e5%bf%83%e5%a3%b0" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="大学心声">
                        大学心声
                    </a>
                    <a href="/forum/%e5%ae%b6%e9%95%bf%e8%ae%ba%e5%9d%9b" target="_blank" style="width:65px;padding-left:1px;padding-right:1px;" title="家长论坛">
                        家长论坛
                    </a>
                </li>
            </ul>
        </div>
    <!--未登录 End-->
    <script type="text/javascript" href="/h/js/sha12.js"></script>
    <script type="text/javascript">
        function SwitchLoginMethod(tabVal) {
            $("#TabLoginNormal").removeClass("on");
            $("#TabLoginSimple").removeClass("on");
            $("#divLoginNormal").hide();
            $("#divLoginSimple").hide();

            if (tabVal == "2") {
                $("#TabLoginSimple").addClass("on");
                $("#divLoginSimple").show();
            }
            else {
                $("#TabLoginNormal").addClass("on");
                $("#divLoginNormal").show();
            }

            return false;
        }
        //$(".userTypeGroup").hover(function () {
        //    $(this).parent().parent().find(".posi_verify").show();
        //}, function () {
        //    $(this).parent().parent().find(".posi_verify").hide();
        //})
    </script>
    <script type="text/javascript">
        AppLoader(function () {
            $("#loginButton").click(function () {
                if (EventAction.validateLogin()) {
                    var pwdValue = $("#pwd").val().toLowerCase();
                    pwdValue = pwdValue.replace(/,/g, "，").replace(/'/g, "＇").replace(/;/g, "；").replace(/＠/g, "@");
                    $("#hashedPassword").val(hex_sha1(pwdValue));
                    $("#pwd").val('');
                    $("#loginForm").submit();
                    return false;
                }
            });

            /*气泡关闭*/
            $(".close").click(function () {
                $(this).parent().hide();
            });

            /*回车点击登陆按钮*/
            /*
            $(document).keydown(function (event) {
                var e = e || event;
                var keycode = e.which || e.keyCode;
                if (keycode == 13) {
                    $("#loginButton").click();
                }
            });*/

            //get msgcode
            $("#btnGetvalidateCode").click(function () {
                var tmpUserMobile = $.trim($("#txtUserMobile").val());
                var msg = '';
                if (tmpUserMobile == '') {
                    msg = '手机号不能为空';
                    $("#showMessageSimple").html(msg);
                    $("#showMessageSimple").parent().show();
                    return;
                }
                else if (!(/^[0-9]{11}$/).test(tmpUserMobile)) {
                    msg = '手机号格式不对';
                    $("#showMessageSimple").html(msg);
                    $("#showMessageSimple").parent().show();
                    return;
                }
                else {
        /*
                    $.post("/ajax/m/SendMobilegCode.aspx", { AppId: "1", mobile: tmpUserMobile, sendtype: "quicklogin", CnoolUserName: "" }, function (ret) {
                        if (ret.ResponseCode == "0") {
                            msg = "短信发送成功";
                        } else {
                            msg = "短信发送失败";
                        }
                        $("#showMessageSimple").html(msg);
                        $("#showMessageSimple").parent().show();
                        return;

                    }, "json");*/

                 
                    $.post("/login/SendMobilegCode", {  mobile: tmpUserMobile  }, function (ret) {
                        if (ret.ResponseCode == "0") {
                            msg = "短信发送成功";
                        } else {
                            msg = ret.ResponseContent;
                        }
                        $("#showMessageSimple").html(msg);
                        $("#showMessageSimple").parent().show();
                        return;

                    }, "json");
                }
            });

            //快速login
            $("#LoginSimpleButton").click(function () {
                var tmpUserMobile = $.trim($("#txtUserMobile").val());
                var msg = '';
                if (tmpUserMobile == '') {
                    msg = '手机号不能为空';
                    $("#showMessageSimple").html(msg);
                    $("#showMessageSimple").parent().show();
                    return;
                }
                else if (!(/^[0-9]{11}$/).test(tmpUserMobile)) {
                    msg = '手机号格式不对';
                    $("#showMessageSimple").html(msg);
                    $("#showMessageSimple").parent().show();
                    return;
                }

                var tmpValidateCode = $.trim($("#txtValidateCode").val());
                if (tmpValidateCode == '') {
                    msg = '请输入短信验证码';
                    $("#showMessageSimple").html(msg);
                    $("#showMessageSimple").parent().show();
                    return;
                }

                $.post("/ajax/m/quickLogin.aspx", { AppId: "1", UserMobile: tmpUserMobile, MobileValidateCode: tmpValidateCode }, function (ret) {
                    if (ret.ResponseCode == "0") {
                        window.location.href = window.location.href;
                    }
                    else {
                        alert(ret.ResponseContent);
                    }

                }, "json");
            });
        })

        var EventAction = {
            message: {
                "login_error": "用户名或密码错误，请重新输入",
                "login_info_not_full": "请输入用户名和密码！"
            },
            validateLogin: function () {
                if ($.trim($("#uname").val()) == "" || $.trim($("#pwd").val()) == "") {
                    EventAction.showMessage(EventAction.message.login_info_not_full)
                    return false;
                }
                return true;
            },
            showMessage: function (msg) {
                $("#showMessage").html(msg)
                $("#showMessage").parent().show();
            }
        }
    </script>
</body>
</html>