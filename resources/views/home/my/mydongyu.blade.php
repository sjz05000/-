@include('home.layout.header')
@section('content')
    <!-- 个人中心样式，不要放到公共链接中 -->
    <link rel="stylesheet" href="/h/css/common.css">
    <style>
        .top{background:#545652;position:relative;height:52px;}
        .topbox{width:1170px;line-height:52px;position:relative;margin:0 auto;}
        .lastdiv{clear:both;}
        .logo{float:left;margin:9px 20px 0 0;}
        .logo img{height:30px;display:block;}
        .nav{font:14px 微软雅黑;line-height:inherit;}
        .nav li{float:left;padding:0 20px;}
        .top .nav a{color:#f5f5f5;line-height:20px;}
        .search{float:left;}
        .search_box{margin-left:20px;padding-left:10px;border-radius:3px;width:320px;height:34px;color:#777;font-size:14px;background:#f5f5f5;}
        .search_btn{width:58px;height:34px;border-radius:3px;color:#f5f5f5;font-size:14px;background:#fa0;margin-left:10px;font:normal 14px 微软雅黑;cursor:pointer;border:none;}
        .search_btn:hover{background:#ffa200;}
        .photo{width:30px;height:30px;border-radius:50%;float:right;margin-top:11px;background:#fff;overflow:hidden;}
        .photo img{width:100%;height:100%;}
        .dropdown{position:relative;float:right;}
        .dropdown_list{position:absolute;z-index:100;right:-17px;top:50px;background:#fff;border-radius:3px;border:1px solid #e5e5e5;box-shadow:0 2px 8px 0 rgba(0,0,0,0.1);display:none;}
        .dropdown_list:before{content:"";position:absolute;top:-15px;right:40px;margin-left:-8px;border-color:transparent transparent #fff;border-style:solid;border-width:8px;}
        .dropdown_list:after{content:"";position:absolute;top:-16px;right:40px;margin-left:-8px;z-index:-100;border-color:transparent transparent #e5e5e5;border-style:solid;border-width:8px;}
        .dropdown_list a{line-height:30px;font-size:14px;color:#999;display:block;padding:0 12px;}
        .dropdown_list a:hover{color:#406599;}
        .appDownload{position:relative;z-index:2;}
        .appDownloadDetail{position:absolute;left:0;top:52px;display:none;}
        .down{float:right;}
        .down .fa{color:#f5f5f5;font-size:14px;margin-left:10px;cursor:pointer;}
        .sign_up{float:right;display:none;}
        .sign_up a{color:#f5f5f5;font-size:14px;padding:0 4px;}
        .messagePoint{position:absolute;left:24px;top:3px;background:red;height:16px;font-size:12px;line-height:15px;border-radius:10px;color:#fff;display:none;padding:0 5px;}
        .photohref img{vertical-align:top;}
        .top .nav a:hover,.sign_up a:hover{color:#fff;font-weight:700;}
        .posting,.guanzhubox{float:right;font:14px/52px 微软雅黑;color:#f5f5f5;margin-right:20px;}
        .top .posting a,.guanzhubox a{color:#fff;}
        .posting:hover,.guanzhubox:hover{color:#fff;font-weight:700;cursor:default;}
        </style>
<!-- 以下是个人中心 -->  
    <div class="layout">
        <div class="bread">
            <a href="http://bbs.cnool.net/">返回首页</a> &gt; 个人中心
        </div>
        <div class="layoutLeft">
            <div class="user" href="http://u.cnool.net/My/mydynamics">
                <span class="pic">
                    <a href="http://u.cnool.net/my/mydynamics">
                        <img src="/h/aspx/bbsavatar(1).aspx" id="img_headlogoleft" alt="" style="width:60px;height:60px;">
                    </a>
                </span>
                <h2 style="overflow:hidden; float:left;  max-width:108px;" title="c0900@qq">c0900@qq</h2>
            </div>
            <div class="usercenter">
                <ul class="NumberModule01">
                    <li><a href="http://u.cnool.net/my/followding"><i>关注：</i>14</a></li>
                    <li class="noLeft"><a href="http://u.cnool.net/my/fans"><i>粉丝：</i>0</a></li>
                    <li><a href="http://u.cnool.net/my/MyExpLogs?dataid=1"><i>经验：</i>7</a></li>
                    <li><a href="http://u.cnool.net/my/MyExpLogs?dataid=2"><i>积分：</i>15</a></li>
                </ul>
                <ul class="NumberModule02">
                        <li class="on"><a href="http://u.cnool.net/my/mydynamics"><i><img src="/h/images/article_icon_on.png" alt=""></i>我的东论</a></li>
                        <li><a href="http://u.cnool.net/my/frienddynamics"><i><img src="/h/images/friends_icon.png" alt=""></i>朋友动态</a></li>
                        <li><a href="http://u.cnool.net/my/mycollection"><i><img src="/h/images/satr_icon.png" alt=""></i>我的收藏</a></li>
                    <li class="btmLine"></li>
                        <li>
                            <a href="http://u.cnool.net/my/mymessage">
                                <i><img src="/h/images/d_icon.png" alt="" style="width:17px;"></i>我的消息
                            </a>
                        </li>
                        <li>
                            <a href="http://u.cnool.net/my/atme">
                                <i><img src="/h/images/atme_icon.png" alt=""></i>@我
                            </a>
                        </li>
                        <li>
                            <a href="http://u.cnool.net/my/privatemessage">
                                <i><img src="/h/images/message_icon.png" alt=""></i>私信
                            </a>
                        </li>
                        <li><a href="http://u.cnool.net/my/followding"><i><img src="/h/images/friends_icon.png" alt=""></i>关注的人</a></li>
                        <li><a href="http://u.cnool.net/my/fans"><i><img src="/h/images/friends_icon.png" alt=""></i>粉丝</a></li>
                    <li class="btmLine"></li>
                        <li><a href="http://u.cnool.net/mall/index"><i><img src="/h/images/shop.png" alt=""></i>积分商城</a></li>
                        <li><a href="http://u.cnool.net/mall/buyrecord"><i><img src="/h/images/buylist.png" alt=""></i>购买记录</a></li>
                        <li><a href="http://u.cnool.net/market/list"><i><img src="/h/images/shop_verify.png" alt=""></i>信息发布</a></li>
                    <li class="btmLine"></li>
                        <li><a href="http://u.cnool.net/my/info"><i><img src="/h/images/settings_icon.png" alt=""></i>个人设置</a></li>
                        <li><a href="http://u.cnool.net/my/cnoolverifyguide"><i><img src="/h/images/satr_icon.png" alt=""></i>东论认证</a></li>
                </ul>
            </div>
        </div>

        <style type="text/css">
            .page span, .page a:hover {border-color: #ffaa00;color: #ffaa00;}
            .page .pager {border-color: #ffaa00;color: #ffaa00;}
            a.bankuailist_tab {color: rgb(255, 170, 0);float: left;font: 14px/18px 微软雅黑;}
        </style>

        <div class="layoutRight" style="height:auto;">
            <div class="itemChoose">
                <span class="fl">
                    <a href="http://u.cnool.net/my/mydynamics#" style="width:70px;text-align:center;" class="on" id="TabMyArticles" onclick="changeArticlesOrReplay(1); return false;">主贴</a>
                    <a href="http://u.cnool.net/my/mydynamics#" style="width:70px;text-align:center;" id="TabMyReplay" onclick="changeArticlesOrReplay(2); return false;" class="">回帖</a>
                    <input type="hidden" id="hidMsgType" value="1">
                </span> 
            </div>
            <div id="MyArticles" style="display: block;">
                <div class="bankuailistBd"></div>
                <ul class="NumberFriendcenter" id="msglist"><div class="bankuailist_newsbox"> <div class="bankuailist_news"> <div class="news_content_view">  <div class="bankuailist_newstitle">     <a href="http://bbs.cnool.net/10512937.html" target="_blank"><h1></h1></a>    </div>  <p><a href="http://bbs.cnool.net/10512937.html" target="_blank">下为马云发布的悼念金庸的微博全文：只因一个‘侠’字，结缘半生。先生其文也大，其人也真。我爱先生之文，</a></p>    </div>   <div class="bankuailist_tabbar">     <a class="bankuailist_tab" href="https://bbs.cnool.net/Home/Tag?tag=%E7%94%9F%E6%B4%BB%E7%83%AD%E7%82%B9" target="_blank"><i class="fa fa-tag"></i> 生活热点</a>   <a class="bankuailist_name" target="_blank" href="https://bbs.cnool.net/other/c0900@qq">      <img src="/h/aspx/bbsavatar(2).aspx">      <span>c0900@qq</span>   </a>  <span class="bankuailist_time">10分钟</span>  <div class="bankuailist_icon">    <span><i class="fa fa-thumbs-up"></i>0</span>    <span><i class="fa fa-eye"></i>0</span>         <span><i class="fa fa-comments"></i>0</span>   </div>   </div>    </div>   </div><div class="bankuailist_newsbox"> <div class="bankuailist_news"> <div class="news_content_view">  <div class="bankuailist_newstitle">     <a href="http://bbs.cnool.net/10512916.html" target="_blank"><h1>金庸去世！马云终于发声，句句痛心！</h1></a>    </div>  <p><a href="http://bbs.cnool.net/10512916.html" target="_blank">记者：杨鑫倢来源：澎湃新闻（thepapernews）若无先生，不知是否还有阿里！10月30日，武侠泰斗金庸在香港病</a></p>    </div>   <div class="bankuailist_tabbar">     <a class="bankuailist_tab" href="https://bbs.cnool.net/Home/Tag?tag=%E4%B8%9C%E6%96%B9%E7%83%AD%E7%BA%BF%E5%8C%BA" target="_blank"><i class="fa fa-tag"></i> 东方热线区</a>   <a class="bankuailist_name" target="_blank" href="https://bbs.cnool.net/other/c0900@qq">      <img src="/h/aspx/bbsavatar(2).aspx">      <span>c0900@qq</span>   </a>  <span class="bankuailist_time">1小时前</span>  <div class="bankuailist_icon">    <span><i class="fa fa-thumbs-up"></i>0</span>    <span><i class="fa fa-eye"></i>9</span>         <span><i class="fa fa-comments"></i>0</span>   </div>   </div>    </div>   </div></ul>
                <ul class="NumberFriendcenter" id="msglistFooter"><li><div style="text-align:center;font-size:16px;">没有更多动态了~</div></li></ul>
            </div>
            <div id="MyReplay" style="display: none;">
                <ul class="NumberFriendcenter" id="msgReplaylist"></ul>
                <ul class="NumberFriendcenter" id="msgReplaylistFooter"><li><div style="text-align:center;font-size:16px;">我是有底线的~</div></li></ul>
            </div>
        </div>

        <script type="text/javascript">
            function changeArticlesOrReplay(val) {
                $("#TabMyArticles").removeClass("on");
                $("#TabMyReplay").removeClass("on");
                if (val == "1") {
                    $("#hidMsgType").attr("value", 1);
                    $("#TabMyArticles").addClass("on");
                    $("#MyReplay").hide();
                    $("#MyArticles").show();
                }
                else {
                    $("#hidMsgType").attr("value", 2);
                    $("#TabMyReplay").addClass("on");
                    $("#MyArticles").hide();
                    $("#MyReplay").show();
                }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                GetMydynamics(1, 6);
                GetMyReplay(1, 6);
            });
            currentPageIndex = 1;
            pageSize = 6;
            isLoadFinished = true;
            currentPageIndex_Replay = 1;
            pageSize_Replay = 6;
            isReplayLoadFinished = true;
            $(function () {
                $(window).bind('scroll', function () { show(); });
                function show() {
                    if ($("#hidMsgType").attr("value") == "1") {
                        if (isLoadFinished) {
                            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                                currentPageIndex++;
                                GetMydynamics(currentPageIndex, pageSize);
                            }
                        }
                    } else {
                        if (isReplayLoadFinished) {
                            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                                currentPageIndex_Replay++;
                                GetMyReplay(currentPageIndex_Replay, pageSize_Replay);
                            }
                        }
                    }
                }
            })
            function GetMydynamics(pageid, pagesize) {
                if (isLoadFinished) {
                    isLoadFinished = false;
                    var message = '';
                    $.post("/my/GetMyDynamics", { PageId: pageid, PageSize: pagesize }, function (ret) {
                        if (ret.success) {
                            $.each(ret.data, function (index, obj) {
                                if (obj.CoverImageFirst == '') {
                                    message += '<div class="bankuailist_newsbox">'
                            + ' <div class="bankuailist_news">'
                                + ' <div class="news_content_view">'
                                   + '  <div class="bankuailist_newstitle">'
                                    + '     <a href="' + obj.ArticelUrl + '" target="_blank"><h1>' + obj.ArticleTitle + '</h1></a>'
                                 + '    </div>'
                                   + '  <p><a href=' + obj.ArticelUrl + '  target="_blank">' + obj.Summary + '</a></p>'
                             + '    </div>'
                              + '   <div class="bankuailist_tabbar">'
                                + '     <a class="bankuailist_tab" href="' + obj.CategoryTagsFirstUrl + '" target="_blank"><i class="fa fa-tag"></i> ' + obj.CategoryTagsFirst + '</a>'
                                  + '   <a class="bankuailist_name" target="_blank" href="' + obj.AuthorUrl + '">'
                                   + '      <img src="' + obj.AuthorHeadLogo + '">'
                                   + '      <span>' + obj.Author + '</span>'
                                  + '   </a>'
                                   + '  <span class="bankuailist_time">' + obj.FriedlyTime + '</span>'
                                   + '  <div class="bankuailist_icon">'
                                     + '    <span><i class="fa fa-thumbs-up"></i>' + obj.LikeCount + '</span>'
                                 + '    <span><i class="fa fa-eye"></i>' + obj.ViewCount + '</span>'
                                + '         <span><i class="fa fa-comments"></i>' + obj.ReplyCount + '</span>'
                                  + '   </div>'
                              + '   </div>'
                         + '    </div>'
                      + '   </div>';
                                } else {
                                    message += '<div class="bankuailist_newsbox">'
                          + '<div class="bankuailist_newsimg">'
                          + '<a href="' + obj.ArticelUrl + '" target="_blank"><img src="' + obj.CoverImageFirst + '"></a>'
                           + '</div>'
                          + ' <div class="bankuailist_news">'
                              + ' <div class="news_content_view">'
                                 + '  <div class="bankuailist_newstitle">'
                                  + '     <a href="' + obj.ArticelUrl + '" target="_blank"><h1>' + obj.ArticleTitle + '</h1></a>'
                               + '    </div>'
                                 + '  <p><a href=' + obj.ArticelUrl + '  target="_blank">' + obj.Summary + '</a></p>'
                           + '    </div>'
                            + '   <div class="bankuailist_tabbar">'
                              + '     <a class="bankuailist_tab" href="' + obj.CategoryTagsFirstUrl + '" target="_blank"><i class="fa fa-tag"></i> ' + obj.CategoryTagsFirst + '</a>'
                                + '   <a class="bankuailist_name" target="_blank" href="' + obj.AuthorUrl + '">'
                                 + '      <img src="' + obj.AuthorHeadLogo + '">'
                                 + '      <span>' + obj.Author + '</span>'
                                + '   </a>'
                                 + '  <span class="bankuailist_time">' + obj.FriedlyTime + '</span>'
                                 + '  <div class="bankuailist_icon">'
                                   + '    <span><i class="fa fa-thumbs-up"></i>' + obj.LikeCount + '</span>'
                               + '    <span><i class="fa fa-eye"></i>' + obj.ViewCount + '</span>'
                              + '         <span><i class="fa fa-comments"></i>' + obj.ReplyCount + '</span>'
                                + '   </div>'
                            + '   </div>'
                       + '    </div>'
                    + '   </div>';
                                }
                            });

                            if (message == '') {
                                $("#msglistFooter").html("<li><div style='text-align:center;font-size:16px;'>没有更多动态了~</div></li>");
                            }
                            else {
                                $("#msglist").append(message);
                            }

                            isLoadFinished = true;
                        }
                        else {
                            isLoadFinished = true;
                        }
                    }, "json");
                }
            }
            function GetMyReplay(pageid, pagesize) {
                if (isReplayLoadFinished) {
                    isReplayLoadFinished = false;
                    var message = '';
                    $.post("/my/GetMyReplay", { PageId: pageid, PageSize: pagesize }, function (ret) {
                        if (ret.success) {
                            $.each(ret.data, function (index, obj) {
                                message += '<li>'
                                    + '<i class="pic" ><a href="#"> <img src="' + obj.AuthorHeadLogo + '" alt="" style="width:60px;height:60px;"></a></i>'
                                        + '<h2>' + obj.Author + '</h2>'
                                        + '<span><label style="width:500px;">' + obj.PostDate + '</label></span>'
                                    + '<span class="txtFriendcenter">' + obj.Content + '</span>'
                                   + '<a href="' + obj.ArticelUrl + '" target="_blank"><p><span style="color:#000;display:block">' + obj.ArticleTitle + '</span>&nbsp;&nbsp;&nbsp;&nbsp;' + obj.ArticleContent + ' ... </p></a></li >';
                            });

                            if (message == '') {
                                $("#msgReplaylistFooter").html("<li><div style='text-align:center;font-size:16px;'>我是有底线的~</div></li>");
                            }
                            else {
                                $("#msgReplaylist").append(message);
                            }

                            isReplayLoadFinished = true;
                        }
                        else {
                            isReplayLoadFinished = true;
                        }
                    }, "json");
                }
            }
        </script>
    </div>
<!-- 以上是个人中心 -->

@include('home.layout.footer')
