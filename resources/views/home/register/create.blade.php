


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>东方热线 - 用户注册</title>
    <link rel="stylesheet" href="/h/css/base.css">
    <link rel="stylesheet" href="/h/css/sign.css">
    <script charset="utf-8" src="/h/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
        function IsExistedUser() {
            $("#ErrorMsgUserMobile").html("");
            var UserMobile = $.trim($("#txtUserMobile").val());

            if (UserMobile == '') {
                $("#ErrorMsgUserMobile").html("*请输入手机号");
                return false;
            }
            if (!(/^[0-9]{11}$/).test(UserMobile)) {
                $("#ErrorMsgUserMobile").html("手机号格式不对");
                return false;
            }

            $.post("/Pass/IsExistedUser", { UserNameOrBindMobile: UserMobile, Type: "2" }, function (ret) {
                if (ret.success) {
                    if (ret.message == "1") {
                        $("#ErrorMsgUserMobile").html("该号码已被注册");
                    }
                }
            }, "json");
        }

        function refreshCode() {
            document.getElementById("imgValCode").src = "/" + "Pass/ValCode?r=" + Math.random();
        }

        function GetSmsForReg(type) {
            $("#MsgErrorLogin").html("");
            $("#MsgErrorLogin").hide();

            var myMobile = $("#txtUserMobile").val();
            if (myMobile == '') {
                $("#MsgErrorLogin").html("手机号不能为空");
                $("#MsgErrorLogin").show();
                return false;
            }
            else if (!(/^[0-9]{11}$/).test(myMobile)) {
                $("#MsgErrorLogin").html("手机号格式不对");
                $("#MsgErrorLogin").show();
                return false;
            }

            var myImgValCode = $("#txtImgValCode").val();
            if (myImgValCode == '') {
                $("#MsgErrorLogin").html("请输入图形验证码!");
                $("#MsgErrorLogin").show();
                return false;
            }

            $("#btnGetvalidateCode").hide();
            $("#btnGetvalidateCodeYuying").hide();
            $("#btnShowGetvalidateCodeMsg").show();
            $.post("/Pass/GetSmsForReg", { type: type, mobile: myMobile, imgValCode: myImgValCode }, function (ret) {
                if (ret.success) {
                    alert(ret.message);
                    $("#btnGetvalidateCode").show();
                    $("#btnGetvalidateCodeYuying").show();
                    $("#btnShowGetvalidateCodeMsg").hide();
                }
                else {

                    $("#btnGetvalidateCode").show();
                    $("#btnGetvalidateCodeYuying").show();
                    $("#btnShowGetvalidateCodeMsg").hide();

                    $("#MsgErrorLogin").html(ret.message);
                    $("#MsgErrorLogin").show();

                    refreshCode();
                }
            }, "json");
            return false;
        }

        function reguser() {
            $("#MsgErrorLogin").html("");
            $("#MsgErrorLogin").hide();

            if (!$("#cbHaveRead").attr("checked")) {
                $("#MsgErrorLogin").html("您不同意东方热线用户协议，不能注册");
                $("#MsgErrorLogin").show();
                return false;
            }

            var RegUserMobile = $.trim($("#txtUserMobile").val());
            if (RegUserMobile == '') {
                $("#MsgErrorLogin").html("请输入你的手机号码");
                $("#MsgErrorLogin").show();
                return false;
            }

            if (!(/^[0-9]{11}$/).test(RegUserMobile)) {
                $("#MsgErrorLogin").html("请填写11位数字手机号");
                $("#MsgErrorLogin").show();
                return false;
            }

            var MobileValidateCode = $.trim($("#txtValidateCode").val());
            if (MobileValidateCode == '') {
                $("#MsgErrorLogin").html("请填写短信验证码");
                $("#MsgErrorLogin").show();
                return false;
            }

            $.post("/Pass/RegisterStepFirst", { RegUserMobile: RegUserMobile, MobileValidateCode: MobileValidateCode }, function (ret) {
                if (ret.success) {
                    //alert(ret.message);
                    window.location.href = "/Pass/RegisterStepDone";
                }
                else {
                    $("#MsgErrorLogin").html(ret.message);
                    $("#MsgErrorLogin").show();
                }
            }, "json");
        }
    </script>
</head>
<body>
    <div class="wrap">
        <div class="layout">
            <div class="bread"><a href="http://bbs.cnool.net/">返回首页</a></div>
            <div class="sign">
                <div class="hd"><img src="/h/picture/logo.png" style="width: 50%; height: 50%; margin: 0 auto;" alt=""></div>
                <div class="bd">
                    <div class="bdhd">
                        <h3>注册</h3>
                        <a href="/Pass/Login" class="fr">已是东论用户？<font color="#ffaa00">去登录</font></a>
                    </div>
                    <ul>
                        <li><input type="text" class="txt" style="width:230px;" id="txtUserMobile" placeholder="请输入你的手机号码" onblur="IsExistedUser(); return false;" /><span class="fr" id="ErrorMsgUserMobile" style="color:red;"></span></li>
                        <li>
                            <input type="text" class="txt02" style="width:230px;" id="txtImgValCode" placeholder="请输入右侧的图片验证码" />
                            <span class="fr">
                                <a href="javascript:void(0)" onclick="refreshCode(); return false;">
                                    <img alt="点击刷新图片验证码" title="点击刷新图片验证码" id="imgValCode" src="/h/picture/709ec732b5d74039947e7825535c15b2.gif" width="94">
                                </a>
                            </span>
                        </li>
                        <li>
                            <input type="text" class="txt01" id="txtValidateCode" placeholder="请输入手机验证码" style="width:160px;">
                            <input type="button" id="btnGetvalidateCode" value="获取短信验证码" class="btnyz" style="cursor:pointer; width:90px;" onmouseover="$(this).val('点击获取')" onmouseout="$(this).val('短信验证码')" onclick="return GetSmsForReg('sms');">
                            <input type="button" id="btnGetvalidateCodeYuying" value="语音验证码" class="btnyz" style="cursor:pointer;float:right;" onmouseover="$(this).val('点击获取')" onmouseout="$(this).val('语音验证码')" onclick="return GetSmsForReg('yuyin');">
                            <input type="button" id="btnShowGetvalidateCodeMsg" value="验证码发送中.." class="btnyz" style="display:none;">
                        </li> 
                        <li><label><input type="checkbox" id="cbHaveRead"  >我已阅读并接受<a href="/home/agree" target="_blank">《东方热线用户协议》</a></label></li>
                        <li id="MsgErrorLogin" style="color:red;display:none;"></li>
                        <li><input type="button" value="注&nbsp;册" class="btnsign" id="btnRegister" onclick="reguser();"></li>

                    </ul>
                    
<div class="otherSign">
    <a href="http://bbs.cnool.net/connect_weibo.aspx"><img src="/h/picture/sina.jpg" alt=""></a>
    <a href="http://bbs.cnool.net/connect_wechat.aspx"><img src="/h/picture/wechat.jpg" alt=""></a>
    <a href="http://bbs.cnool.net/connect_qq.aspx"><img src="/h/picture/qq.jpg" alt=""></a>
</div>
<div class="code">
    <!-- <img src="/h/picture/code.png" alt=""> -->
</div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>