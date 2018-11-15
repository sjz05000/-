

@extends('home.layout.layout')
@section('content')
    <style type="text/css">
        .edit{background:red!important;cursor:pointer;height:16px;position:absolute;right:0;top:0;width:26px!important;font-size:12px;text-align:left;line-height:16px!important;text-indent:0!important;z-index:1;}
        .menu li{position:relative;}
        .menu li a{padding:5px 0;}
        .ycul{position:absolute;top:20px;left:0;background:#f6f6f6;z-index:10;display:none;}
        .ycul li{width:120px;font-size:14px!important;margin:0!important;padding:8px 0 8px 10px;}
        .header{height:40px;overflow:visible;}
        .ycul li:hover{background-color:#fc3;}
        .ycul li a:hover{color:#000;text-decoration:none;}
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
        .dropdown_list{position:absolute;z-index:100;right:-17px;top:60px;background:#fff;border-radius:3px;border:1px solid #e5e5e5;box-shadow:0 2px 8px 0 rgba(0,0,0,0.1);display:none;}
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
        .top .nav a:hover,.sign_up a:hover{color:#fff;font-weight:700;}
        .posting,.guanzhubox{float:right;font:14px/52px 微软雅黑;color:#f5f5f5;margin-right:20px;}
        .top .posting a,.guanzhubox a{color:#fff;}
        .posting:hover,.guanzhubox:hover{color:#fff;font-weight:700;cursor:default;}
    </style>
<!-- 首页 -->
    <!-- 白色第二导航 开始 -->
    <div class="headerbg">
        <div class="header">
            <ul class="menu">
                @foreach($common_navigation_data as $k=>$v)
                <li>
                    <a href="{{$v->url}}" target="_blank">{{$v->navname}}</a>
                    <ul class="ycul" style="display: none;">
                        @foreach($v->sub as $kk=>$vv)
                            <li><a href="{{$vv->url}}" target="_blank">{{$vv->navname}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <style type="text/css">
        .gotop,.p-cell .func .wf-opt,.nav-2 a,.tlist_5 li,.p-cell .pic-overflow,.doc-hd .nav-r .login,.login1,.doc-hd .nav-r .regist,.doc-hd .nav-sub .arrow,.doc-hd .ico a{background:url(/h/images/pic_ilike_1.png) no-repeat;_background:url(/webcontrols/_header/css/img/pic_ilike.gif?v=20130110) no-repeat;}
        html,div,body,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dt,dd,p,blockquote,pre,form,input,textarea,fieldset,table,th,td{margin:0;padding:0;}
        p{text-indent:0;}
        ul,ol{list-style:none;}
        img{border:none;vertical-align:top;}
        .doc-hd-outer{background:#545652;width:100%;z-index:100;text-align:left;min-width:1000px;}
        .doc-hd{height:35px;width:948px;background:none;position:relative;z-index:999;margin:0 auto;}
        .doc-hd .logo{float:left;width:100px;height:35px;margin-right:15px;}
        .nav-1{float:left;font-size:14px;margin:0;}
        .nav-1 li{float:left;_display:inline;}
        .nav-1 a{color:#fff;display:inline-block;height:35px;line-height:35px;_height:33px;_line-height:33px;cursor:pointer;_zoom:1;padding:0 13px;}
        .nav-1 a:visited{color:#fff;}
        .nav-1 .cur a,.nav-1 .mypagebox-hover a{text-decoration:none;color:#fff;background-color:#fff;opacity:.98;filter:alpha(opacity=98);height:39px;line-height:35px;border:1px solid #333;border-width:0 1px;padding:0 12px;}
        .nav-1 .interestbox-hover a{text-decoration:none;opacity:.98;filter:alpha(opacity=98);height:34px;line-height:34px;border:1px solid #333;color:#000;background-color:#fff;_height:31px;_line-height:33px;border-width:0 1px;padding:0 12px;}
        .nav-1 a:hover{text-decoration:none;color:#000;background-color:#333;opacity:.98;filter:alpha(opacity=98);height:34px;_height:34px;line-height:34px;_line-height:34px;background:#fff;border-top:1px #000 solid;border-right:1px #000 solid;border-left:1px #000 solid;border-width:0 1px;padding:0 12px;}
        .nav-1 .interestbox-hover{color:#000;background-color:#fff;height:34px;}
        .nav-1 span{display:inline-block;_zoom:1;text-align:center;}
        .nav-1 a:hover,.nav-1 .cur a{height:34px;line-height:34px;_height:34px;_line-height:34px;}
        .nav-1 .interestbox-hover a:hover,.nav-1 .mypagebox-hover a:hover{height:33px;line-height:34px;_line-height:33px;}
        .nav-1 .interest,.nav-1 .mypage{padding-right:15px;background:url(/h/images/nav_icon_new_1.png) no-repeat;_background:url(/webcontrols/_header/css/img/nav_icon_new.gif) no-repeat;background-position:right 16px;_background-position:right -1795px;}
        .nav-1 .cur .interest,.nav-1 .cur .mypage{_background-position:right -2086px;}
        .nav-1 .interestbox-hover .interest,.nav-1 .mypagebox-hover .mypage{background-position:right -12px;_background-position:right -12px;}
        .nav-1 .interest-group{position:absolute;left:0;top:34px;width:744px;display:none;zoom:1;}
        .nav-1 .mypage-list{position:absolute;left:0;top:41px;zoom:1;background:url(/h/images/nav_sub_bg.png) repeat 0 0;_background:#333;border:1px solid #262626;display:none;border-width:0 1px 1px;}
        .nav-1 .mypagebox .mypage-list .mypage-item{border:0;display:block;width:65px;height:26px;line-height:26px;color:#ccc;font-size:12px;padding:0 15px;}
        .nav-1 .mypagebox-hover .mypage-item:hover,.nav-1 .mypage-list .on{background-color:#222;color:#fff;height:26px;line-height:26px;}
        .nav-1 .interestbox-hover .interest-group,.nav-1 .mypagebox-hover .mypage-list{display:block;}
        .nav-1 .interest-row{float:left;_background:#333;border:1px solid #262626;border-right:1px solid #ddd;border-width:0 1px 1px 0;}
        .nav-1 .interest-group .row-first{border-left-width:1px;}
        .nav-1 .interestbox .interest-group .interest-item{border:0;display:block;width:75px;height:26px;line-height:26px;color:#666;font-size:14px;background-color:#fafafa;font-family:宋体;padding:0 15px;}
        .nav-1 .interestbox-hover a.interest-item:hover,.nav-1 .interest-group .on{background-color:#222;color:#fff;border:0;display:block;width:75px;height:26px;line-height:26px;padding:0 15px;}
        .nav-1 .interest-group .new{background:url(/h/images/new2_1.gif) no-repeat 92% center;}
        .nav-1 .interest-group .hot{background:url(/h/images/hot.gif) no-repeat 92% center;}
        .nav-1 i{width:0;height:4px;zoom:1;overflow:hidden;display:none;}
        .nav-1 .last span{background:none;}
        .nav-1 .cur i{display:none;}
        .doc-hd .guide-icon,.doc-hd .info-icon,.doc-hd .plug-icon,.doc-hd .mobile-icon,.doc-hd .msg-icon,.doc-hd .tool a,.doc-hd .invitation a,.doc-hd .weibo01 a,.doc-hd .boke a,.doc-hd .activities a,.doc-hd .friend a,.doc-hd .help a,.doc-hd .signature a,.doc-hd .daydayup a,.doc-hd .about a,.doc-hd .weibo a,.doc-hd .upload a,.doc-hd .my a,.doc-hd .setting a,.doc-hd .logout a,.doc-hd .dotask a,.doc-hd .dotask a,.doc-hd .homepage a,.doc-hd .webmap a,.doc-hd .bbsmap a,.doc-hd .phone a,.doc-hd .ipad a,.doc-hd .renzheng a,.doc-hd .lucky a,.doc-hd .customerservice a,.doc-hd .help01 a,.doc-hd .dynamic a,.doc-hd .sendphoto a,.doc-hd .transaction a,.doc-hd .personalletter a,.doc-hd .remind a,.doc-hd .messageforme a{background:url(/h/images/nav_icon_new_1.png) no-repeat;_background:url(/webcontrols/_header/css/img/nav_icon_new.gif?v=20130110) no-repeat;}
        .doc-hd .nav-r .u-item{float:left;position:relative;z-index:998;display:block;padding:5px 1px;}
        .doc-hd .nav-r a.a-list{width:28px;height:24px;background:url(/h/images/nav_icon_new_1.png) no-repeat;_background:url(/webcontrols/_header/css/img/nav_icon_new.gif?v=20130110) no-repeat;background-position:15px -638px;float:left;padding:0 13px 0 6px;}
        .doc-hd .umenu-user .tx-clip{position:absolute;width:23px;height:23px;z-index:1;_background:none;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true,sizingMethod=scale,src="/h/resource/css/img/tx_clip_nav.png?v=20130110");}
        .doc-hd .nav-sub{position:absolute;right:-1px;_right:-2px;top:34px 9px;border:1px solid #262626;background:#fff;opacity:.98;filter:alpha(opacity=98);z-index:9999;display:none;border-top:0;width:90px;}
        .doc-hd .nav-sub .arrow{background-position:right -985px;width:60px;position:absolute;top:-15px;right:-1px;height:0;overflow:hidden;padding-top:15px;display:none;}
        .doc-hd .nav-sub .last{border:none;}
        .doc-hd .nav-sub ul{border-bottom:1px solid #DEDEDE;}
        .doc-hd .nav-sub li a{padding-left:30px;text-align:left;text-decoration:none;}
        .doc-hd .nav-r .guide-icon,.doc-hd .nav-r .info-icon,.doc-hd .nav-r .plug-icon,.doc-hd .nav-r .mobile-icon{display:block;width:24px;height:24px;}
        .u-msg .msg-icon{display:block;width:24px;height:24px;background-position:0 -58px;}
        .doc-hd .nav-r .plug-icon{background-position:3px -581px;_background-position:7px -1745px;}
        .doc-hd .nav-r .msg-icon{background-position:1px -556px;_background-position:5px -1423px;}
        .doc-hd .nav-r .info-icon{background-position:3px -609px;_background-position:6px -1770px;}
        .doc-hd .nav-sub a{color:#999;display:block;height:26px;line-height:26px;width:50px;padding:2px 10px 0 0;}
        .doc-hd .nav-sub li.my a{background-position:4px -681px;_background-position:4px -1450px;overflow:hidden;}
        .doc-hd .nav-sub li.my a:hover{background-position:4px -801px;_background-position:4px -1570px;}
        .doc-hd .nav-sub li.setting a{background-position:7px -741px;_background-position:7px -1510px;}
        .doc-hd .nav-sub li.setting a:hover{background-position:7px -861px;_background-position:7px -1630px;}
        .doc-hd .nav-sub li.logout a{background-position:4px -771px;_background-position:2px -1536px;}
        .doc-hd .nav-sub li.logout a:hover{background-position:4px -891px;_background-position:2px -1656px;}
        .doc-hd .nav-sub li.upload a{background-position:7px -442px;_background-position:7px -1688px;}
        .doc-hd .nav-sub li.upload a:hover{background-position:7px -234px;_background-position:7px -1714px;}
        .doc-hd .nav-sub li.invitation a{background-position:7px -2441px;_background-position:7px -2441px;}
        .doc-hd .nav-sub li.invitation a:hover{background-position:7px -2593px;_background-position:7px -2593px;}
        .doc-hd .nav-sub li.weibo01 a{background-position:5px -2473px;_background-position:5px -2472px;}
        .doc-hd .nav-sub li.weibo01 a:hover{background-position:5px -2622px;_background-position:5px -2621px;}
        .doc-hd .nav-sub li.boke a{background-position:5px -2505px;_background-position:5px -2505px;}
        .doc-hd .nav-sub li.boke a:hover{background-position:5px -2653px;_background-position:5px -2653px;}
        .doc-hd .nav-sub li.activities a{background-position:6px -2563px;_background-position:6px -2563px;}
        .doc-hd .nav-sub li.activities a:hover{background-position:6px -2715px;_background-position:6px -2715px;}
        .doc-hd .nav-sub li.friend a{background-position:5px -2536px;_background-position:5px -2536px;}
        .doc-hd .nav-sub li.friend a:hover{background-position:5px -2688px;_background-position:5px -2688px;}
        .doc-hd .nav-sub li.help a{background-position:5px -288px;_background-position:5px -1054px;}
        .doc-hd .nav-sub li.help a:hover{background-position:5px -81px;_background-position:5px -1238px;}
        .doc-hd .nav-sub li.signature a{background-position:5px -317px;_background-position:5px -1084px;}
        .doc-hd .nav-sub li.signature a:hover{background-position:5px -110px;_background-position:5px -1268px;}
        .doc-hd .nav-sub li.daydayup a{background-position:5px -347px;_background-position:5px -1115px;}
        .doc-hd .nav-sub li.daydayup a:hover{background-position:5px -140px;_background-position:5px -1299px;}
        .doc-hd .nav-sub li.about a{background-position:5px -382px;_background-position:5px -1146px;}
        .doc-hd .nav-sub li.about a:hover{background-position:5px -174px;_background-position:5px -1330px;}
        .doc-hd .nav-sub li.weibo a{background-position:5px -412px;_background-position:5px -1176px;}
        .doc-hd .nav-sub li.weibo a:hover{background-position:5px -204px;_background-position:5px -1360px;}
        .doc-hd .nav-sub li.overtask a{background-position:5px -1959px;_background-position:5px -2006px;}
        .doc-hd .nav-sub li.homepage a{background-position:4px -2821px;_background-position:4px -2821px;}
        .doc-hd .nav-sub li.homepage a:hover{background-position:4px -3132px;_background-position:4px -3132px;}
        .doc-hd .nav-sub li.phone a{background-position:4px -2851px;_background-position:4px -2851px;}
        .doc-hd .nav-sub li.phone a:hover{background-position:4px -3162px;_background-position:4px -3162px;}
        .doc-hd .nav-sub li.ipad a{background-position:4px -2880px;_background-position:4px -2880px;}
        .doc-hd .nav-sub li.ipad a:hover{background-position:4px -3191px;_background-position:4px -3191px;}
        .doc-hd .nav-sub li.renzheng a{background-position:4px -2911px;_background-position:4px -2911px;}
        .doc-hd .nav-sub li.renzheng a:hover{background-position:4px -3222px;_background-position:4px -3222px;}
        .doc-hd .nav-sub li.lucky a{background-position:4px -2943px;_background-position:4px -2943px;}
        .doc-hd .nav-sub li.lucky a:hover{background-position:4px -3254px;_background-position:4px -3254px;}
        .doc-hd .nav-sub li.customerservice a{background-position:4px -2975px;_background-position:4px -2975px;}
        .doc-hd .nav-sub li.customerservice a:hover{background-position:4px -3286px;_background-position:4px -3286px;}
        .doc-hd .nav-sub li.help01 a{background-position:4px -3009px;_background-position:4px -3009px;}
        .doc-hd .nav-sub li.help01 a:hover{background-position:4px -3320px;_background-position:4px -3320px;}
        .doc-hd .nav-sub li.dynamic a{background-position:4px -3529px;_background-position:4px -3529px;}
        .doc-hd .nav-sub li.dynamic a:hover{background-position:4px -3732px;_background-position:4px -3732px;}
        .doc-hd .nav-sub li.sendphoto a{background-position:4px -3468px;_background-position:4px -3468px;}
        .doc-hd .nav-sub li.sendphoto a:hover{background-position:4px -3671px;_background-position:4px -3671px;}
        .doc-hd .nav-sub li.transaction a{background-position:4px -3500px;_background-position:4px -3500px;}
        .doc-hd .nav-sub li.transaction a:hover{background-position:4px -3702px;_background-position:4px -3702px;}
        .doc-hd .nav-sub li.personalletter a{background-position:4px -3438px;_background-position:4px -3438px;}
        .doc-hd .nav-sub li.personalletter a:hover{background-position:4px -3640px;_background-position:4px -3640px;}
        .doc-hd .nav-sub li.remind a{background-position:4px -3405px;_background-position:4px -3405px;}
        .doc-hd .nav-sub li.remind a:hover{background-position:4px -3608px;_background-position:4px -3608px;}
        .doc-hd .nav-sub li.messageforme a{background-position:4px -3373px;_background-position:4px -3373px;}
        .doc-hd .nav-sub li.messageforme a:hover{background-position:4px -3575px;_background-position:4px -3575px;}
        .nav-search-module{float:right;margin:5px 10px 0 0;}
        .hd-search{position:relative;width:197px;height:20px;_padding:2px 30px 0 3px;background-color:#fafafa;background:url(/h/images/nav-search01_1.png) no-repeat 0 0;padding:2px 0 2px 3px;}
        .hd-search-text{width:117px;height:16px;border:none;background:transparent;float:left;padding:2px 5px 2px 0;}
        a:focus,input{outline:0;}
        .hd-search-submit{width:29px;height:25px;border:none;background:transparent;cursor:pointer;float:right;}
        .hd-search-sugg{display:none;position:absolute;z-index:10;top:24px;left:0;width:158px;border:1px solid #222;background:#333;opacity:.98;filter:alpha(opacity=98);}
        .hd-search-sugg .sugg-item-hover{background:#222;text-decoration:none;color:#FFF;}
        .hd-search-sugg .sugg-item{display:block;height:26px;line-height:26px;color:#999;text-decoration:none;word-wrap:keep-all;padding:0 5px;}
        .hd-search-sugg .sugg-item .hd-sugg-kw{color:#0987AB;max-width:60px;overflow:hidden;}
        #nav_msg_link{position:relative;padding-left:8px;padding-right:8px;}
        .doc-hd .nav-sub a:hover{text-decoration:none;background-color:#222;color:#FFF;}
        .doc-hd .nav-r a.login,.doc-hd .nav-r a.login1,.doc-hd .nav-r a.regist{text-decoration:none;text-align:center;font-size:14px;width:80px;height:28px;line-height:26px;float:left;margin-top:4px;padding:0;}
        .doc-hd .nav-r a.regist{background-position:0 -1529px;color:#efefef;margin-right:7px;_background-position:0 -1640px;}
        .doc-hd .nav-r a.regist:hover{color:#fff;background-position:0 -1566px;}
        .doc-hd .nav-r a.regist:active{background-position:0 -1713px;}
        .doc-hd .nav-r a.login1{color:#404040;background-position:-88px -1640px;}
        .doc-hd .nav-r a.login1:hover{color:#303030;background-position:-88px -1677px;}
        .doc-hd .nav-r a.login1:active{background-position:-88px -1713px;}
        #sub-search{_display:inline;float:right;width:191px;height:24px;margin:10px 10px 0 0;}
        .sub-search-key{float:left;width:115px;height:16px;line-height:16px;border:1px solid #E0E0E0;background-position:0 -146px;padding:3px;}
        .sub-serach-switch{background:none;position:relative;float:left;width:44px;line-height:21px;text-indent:5px;background-position:0 -146px;color:#979797;z-index:1;border:0 solid #000;_border:0 solid #000;}
        .sub-serach-switch dt{cursor:pointer;background:url(/h/images/icon_common_1.png) no-repeat 4px -536px;}
        .sub-serach-switch dd{display:none;position:absolute;top:21px;left:-2px;width:44px;background:#FFF;border:1px solid #000;border-top:0 none;}
        .sub-serach-switch dd a,.serach-switch dd a:visited{display:block;color:#979797;}
        .sub-search-btn{float:left;padding-top:24px;width:24px;height:0;background-position:-52px -178px;overflow:hidden;}
        .sub-search-btn:hover{background-position:-76px -178px;}
        #sub-search.focus .sub-search-key,#sub-search.focus .sub-serach-switch{border-color:#7DBDE2;}
        .doc-hd .nav-r .guide-icon{background-position:3px -3071px;_background-position:3px -3071px;}
        .doc-hd .u-hover .guide-icon{background-position:3px -2761px;_background-position:3px -2761px;}
        .doc-hd .nav-r .u-hover{background:#fff;opacity:.98;border:1px solid #232323;border-bottom:0;padding:5px 0;}
        .doc-hd .u-hover .msg-icon{background-position:1px -385px;width:24px;height:23px;}
        .doc-hd .u-hover .plug-icon{background-position:2px -409px;width:24px;height:23px;}
        .doc-hd .u-hover .info-icon{background-position:2px -437px;width:24px;height:23px;}
        .doc-hd .u-hover a.a-list{background-position:15px -662px;}
        #doc_hd .popo-mod{position:fixed;_position:absolute;top:42px;right:50%;margin-right:-490px;width:200px;text-align:left;z-index:999;}
        .layout{width:1000px;margin:0 auto;}
        .close{position:absolute;top:4px;right:10px;padding-top:15px;width:15px;height:0;background:url(/h/images/icon_common_1.png) no-repeat 4px 4px;overflow:hidden;z-index:9;}
        .close:hover{background-position:4px -32px;}
        .popo-mod{position:absolute;width:110px;background:#FFFCE9;color:#666;}
        .popo-rim{height:0;border-top:1px solid #edddab;overflow:hidden;margin:0 1px;}
        .popo-bd{position:relative;_height:18px;border:1px solid #edddab;line-height:18px;font-size:12px;border-width:0 1px;padding:6px 8px;}
        .popo-mod .close{right:5px;}
        .color6{color:#666;}
        .link0 a,.link0 a:visited{color:#0657B2;}
        .activities-list .activities-text{float:left;color:#333;height:35px;overflow:hidden;margin:5px 0 0;}
        .hot-activities .text-activities-much{float:right;border:0;background:none;margin:8px 8px 0 0;padding:0;}
        .hot-trading .text-trading-much{float:right;border:0;background:none;margin:6px 8px 0 0;padding:0;}
        .trading-list .trading-text{float:left;color:#333;height:65px;overflow:hidden;}
        .trading-list .trading-img{border:0;height:90px;width:136px;overflow:hidden;padding:0;}
        .trading-list .trading-img img{border:0;width:136px;padding:0;}
        del{text-decoration:line-through;line-height:20px;}
        .imgbox-item-caption-top{font-size:12px;width:126px;height:20px;padding:3px 5px;}
        .imgbox-item-caption-meta-top{color:#CCC;position:relative;width:70px;float:right;margin:0;}
        .imgbox-item-caption-meta-top cite{float:right;font:400 18px 微软雅黑;line-height:20px;color:#f50;}
        .autocomplete{position:relative;float:left;width:122px;left:0;top:0;}
        .sub-autocomplete-switch{float:left;line-height:21px;text-indent:5px;background-position:0 -146px;color:#979797;z-index:1;border:1px solid #000;_border:1px solid #000;display:none;position:absolute;left:-3px;top:21px;width:122px;background:#FFF;border-top:0 none;}
        .sub-autocomplete-switch a{display:block;color:#979797;text-decoration:none;width:122px;overflow:hidden;white-space:nowrap;}
        .items li a{float:left;color:#fff;line-height:35px;text-decoration:none;font-size:14px;margin:0 14px 0 0;}
        .nav-1 a:active,.nav-1 .interestbox-hover a:hover,.nav-1 .interestbox-hover a:active,.nav-1 .interestbox-hover a:visited{color:#000;}
        .nav-1 .interestbox,.nav-1 .mypagebox,.doc-hd .umenu-user,.doc-hd .umenu-userguide,#doc_hd .layout{position:relative;}
        .doc-hd .nav-r,.hot-activities .tit .iwtbh,.hot-trading .tit .iwtbh{float:right;}
        .doc-hd .sub-2,.doc-hd .sub-1,.doc-hd .sub-3{width:90px;}
        .doc-hd .nav-sub li.tool a,.doc-hd .nav-sub li.dotask a{background-position:4px -2789px;_background-position:4px -2789px;}
        .doc-hd .nav-sub li.tool a:hover,.doc-hd .nav-sub li.dotask a:hover{background-position:4px -3100px;_background-position:4px -3100px;}
        .doc-hd .nav-sub li.webmap a,.doc-hd .nav-sub li.bbsmap a{background-position:5px -260px;_background-position:5px -260px;}
        .doc-hd .nav-sub li.webmap a:hover,.doc-hd .nav-sub li.bbsmap a:hover{background-position:5px -52px;_background-position:5px -52px;}
        .sub-serach-switch dd a:hover,.sub-autocomplete-switch .current,.sub-autocomplete-switch a:hover{color:#fff;background:#000;text-decoration:none;}
        .hot-activities,.hot-trading{overflow:hidden;width:302px;font-size:12px;background:#fff;padding:10px 0 0;}
        .hot-activities .tit,.hot-trading .tit{width:280px;float:left;height:20px;line-height:20px;margin:0 0 15px 10px;}
        .hot-activities .tit .hot-tit,.hot-trading .tit .hot-tit{float:left;font-weight:600;}
        .hot-activities .tit .iwtbh a,.hot-trading .tit .iwtbh a{color:#666;text-decoration:none;border:0;height:20px;line-height:20px;padding:0;}
        .hot-activities .tit .iwtbh a:hover,.hot-trading .tit .iwtbh a:hover{color:#f50;line-height:20px;height:20px;}
        .hot-activities .activities-list,.hot-trading .trading-list{float:left;padding-left:10px;width:292px;}
        .activities-list .activities-box,.trading-list .trading-box{float:left;width:136px;margin:0 10px 10px 0;}
        .activities-list .activities-text a,.trading-list .trading-text a{color:#333;text-decoration:none;border:0;height:35px;line-height:20px;padding:0;}
        .activities-list .activities-text a:hover,.trading-list .trading-text a:hover{border:0;height:35px;line-height:20px;color:#f50;padding:0;}
        .activities-list .activities-text a:visited,.hot-activities .text-activities-much a:visited,.hot-trading .text-trading-much a:visited{color:#333;}
        .hot-activities .much-activities,.hot-trading .much-trading{background:#E6e6e6;float:left;width:302px;height:30px;margin:6px 0 0;}
        .hot-activities .text-activities-much a,.hot-trading .text-trading-much a{color:#666;text-decoration:none;border:0;background:none;height:20px;line-height:20px;padding:0;}
        .hot-activities .text-activities-much a:hover,.hot-trading .text-trading-much a:hover{color:#f50;text-decoration:none;border:0;background:none;height:20px;line-height:20px;padding:0;}
        .activities-list .activities-img a,.activities-list .activities-img,.activities-list .activities-img img,.activities-list .activities-img a:hover,.trading-list .trading-img a,.trading-list .trading-img a:hover{border:0;height:90px;width:136px;padding:0;}
        .price,.items li{float:left;}
    </style>
    <script type="text/javascript">
        var currentAutoCompleteIndex = -1;
        var reflushAutoComplete = function () {
            var autoCompleteMaxLength = jQuery(".sub-autocomplete-switch a").length;
            if (currentAutoCompleteIndex >= autoCompleteMaxLength) {
                currentAutoCompleteIndex = 0;
            } else if (currentAutoCompleteIndex < 0) {
                currentAutoCompleteIndex = autoCompleteMaxLength - 1;
            }
            jQuery(".sub-autocomplete-switch a")
                .removeClass("current")
                .eq(currentAutoCompleteIndex)
                .addClass("current");
        };
        jQuery(".sub-autocomplete-switch").click(function (e) {
            if (e.target.tagName.toLowerCase() == "a") {
                jQuery("#navSearchKeyword").val(jQuery(e.target).text());
                jQuery(this).hide();
                jQuery(".sub-autocomplete-switch a").removeClass("current");
                currentAutoCompleteIndex = -1;
            }
        });
        jQuery(".sub-autocomplete-switch").hover(function () {
            jQuery(".sub-autocomplete-switch a").removeClass("current");
        });
        jQuery("#navSearchKeyword").keyup(function (e) {
            switch (e.which) {
                // Down
                case 40:
                    currentAutoCompleteIndex++;
                    reflushAutoComplete();
                    break;
                // Up
                case 38:
                    currentAutoCompleteIndex--;
                    reflushAutoComplete();
                    break;
                // Enter
                case 13:
                    if (jQuery(".sub-autocomplete-switch .current").length > 0) {
                        jQuery(this).val(jQuery(".sub-autocomplete-switch a").eq(currentAutoCompleteIndex).text());
                    }
                    jQuery(".sub-autocomplete-switch").hide();
                    jQuery(".sub-autocomplete-switch a").removeClass("current");
                    currentAutoCompleteIndex = -1;
                    break;
                // AutoComplete
                default:
                    //jQuery.getJSON("http://bbs.cnool.net/ajaxcross/searchautocomplete.aspx?callback=?&keyword=" + encodeURIComponent(jQuery(this).val()), function (data) {
                    //    if (data.length > 0) {
                    //        jQuery(".sub-autocomplete-switch a").remove()
                    //        jQuery.each(data, function (_, element) {
                    //            var item = jQuery("<a href='javascript:void(0);''>" + element + "</a>");
                    //            jQuery(".sub-autocomplete-switch").append(item);
                    //        });
                    //        jQuery(".sub-autocomplete-switch").show();
                    //    }
                    //});
                    break;
            }
        });

        var selectBox = function (trig, options) {
            var _that = this, target = trig.find("dd"), def = { target: target, event: "hover", show: ["show", "hide"], slide: ["slideDown", "slideUp"], isSlide: false };
            options = jQuery.extend(def, options);
            target = options.target;
            trig.each(function (index, callback) {
                var that = jQuery(this);
                that.data("target", target.eq(index));
                if (options.isSlide) {
                    options.show = options.slide;
                }
                if (options.event === "hover") {
                    that.hover(function () {
                        var _obj = that.find("dd"),
                            _objWidth = that.width() + 8,
                            _setWidth = _obj.width();
                        if (_objWidth > _setWidth) {
                            that.find("dd").width(_objWidth);
                        }
                        showForSB(options, jQuery(this), false)
                    }, function () {
                        showForSB(options, jQuery(this), true)
                    });
                }
                if (options.fn) {
                    options.fn(that, that.data("target"));
                } else {
                    that.find("a").click(function (ev) {
                        var val = this.innerHTML;
                        that.find("dt").html(val);
                        showForSB(options, that, 1);
                        ev.stopPropagation();
                        return false;
                    });
                }
            });
        }

        var placeholder = "请输入搜索关键词";

        jQuery(".sub-search-key").focus(function () {
            jQuery(this).parent().addClass("focus");
        }).blur(function () {
            jQuery(this).parent().removeClass("focus");
        });

        selectBox(jQuery(".sub-serach-switch"));

        jQuery("#searchBtnHead").click(function () {
            var keyword = jQuery.trim(jQuery("#navSearchKeyword").val());
            var searchType = jQuery.trim(jQuery(".sub-serach-switch").find("dt").text());
            var searchUrl = "";

            if (keyword != placeholder && keyword.length > 0) {

                keyword = encodeURIComponent(keyword);
                if (searchType == "帖子") {
                    searchUrl = "http://bbs.cnool.net/csearch.aspx?type=topic&keyword=" + keyword;
                } else if (searchType == "版块") {
                    searchUrl = "http://bbs.cnool.net/csearchforum.aspx?keyword=" + keyword;
                } else if (searchType == "用户") {
                    searchUrl = "http://bbs.cnool.net/cuser_profile_topic.aspx?u=" + keyword;
                    //alert("该功能，尚未开放!");
                    //return;
                } else if (searchType == "交易") {
                    searchUrl = "http://tao.cnool.net/sou.aspx?key=" + keyword;
                }
            } else {
                if (searchType == "帖子") {
                    searchUrl = "http://bbs.cnool.net/csearch.aspx";
                } else if (searchType == "版块") {
                    searchUrl = "http://bbs.cnool.net/csearchforum.aspx";
                } else if (searchType == "用户") {
                    alert("该功能，尚未开放!");
                    return;
                } else if (searchType == "交易") {
                    searchUrl = "http://tao.cnool.net/sou.aspx";
                }
            }
            window.open(searchUrl);
        });
    </script>
    <script type="text/javascript">
        //var loadMessage = function () {
        //    jQuery.getJSON("http://bbs.cnool.net/ajaxcross/noticecount.aspx?callback=?", function (res) {
        //        if (res.ResponseCode == 0) {
        //            var message_html = '';
        //            if (res.ReminderCount > 0) {
        //                message_html += res.ReminderCount + '条新提醒，<a href="http://bbs.cnool.net/usercpnotice.aspx?filter=all">查看提醒</a><br />';
        //            }
        //            if (window.CNOOL_USERNAME) {
        //                jQuery.getScript("http://ucdata2011.cnool.net/util/attention/loaduserfollow.aspx?infloat=1&inajax=1&action=load&var=__loaduserfollow&currentuser=" + encodeURIComponent(window.CNOOL_USERNAME) + "&userlist=" + encodeURIComponent(window.CNOOL_USERNAME), function () {
        //                    if (__loaduserfollow && __loaduserfollow.data) {
        //                        if (__loaduserfollow.data.PostAtMe > 0) {
        //                            message_html += __loaduserfollow.data.PostAtMe + '条新提到我，<a href="http://t.cnool.net/dashboard/tab=@me">查看@我</a><br />';
        //                        }
        //                        if (__loaduserfollow.data.PostAll > 0) {
        //                            message_html += __loaduserfollow.data.PostAll + '条新动态，<a href="http://t.cnool.net/dashboard">查看好友动态</a><br />';
        //                        }
        //                        if (__loaduserfollow.data.SystemInfo > 0) {
        //                            message_html += __loaduserfollow.data.SystemInfo + '位新粉丝，<a href="http://t.cnool.net/dashboard/tab=all/filter=sys">查看新粉丝</a><br />';
        //                        }
        //                        if (__loaduserfollow.data.PostPrivate > 0) {
        //                            message_html += __loaduserfollow.data.PostPrivate + '条新私信，<a href="http://bbs.cnool.net/cuser_message_inbox.aspx">查看私信</a><br />';
        //                        }
        //                    }

        //                    if (message_html != "") {
        //                        jQuery("#message_tips_html").html(message_html)
        //                        jQuery("#message_html").show();
        //                    }
        //                });
        //            }
        //        }
        //    });
        //}

        //绑定鼠标事件
        jQuery(".nav-1 .interestbox").bind("mouseenter",
            function () {
                jQuery(this).addClass("interestbox-hover");
                jQuery(this).find(".interest-group").show();
            });
        jQuery(".nav-1 .interestbox").bind("mouseleave",
            function () {
                jQuery(this).removeClass("interestbox-hover");
                jQuery(this).find(".interest-group").hide();
            });
        jQuery(".nav-1 .mypagebox").bind("mouseenter",
            function () {
                jQuery(this).addClass("mypagebox-hover");
            });
        jQuery(".nav-1 .mypagebox").bind("mouseleave",
            function () {
                jQuery(this).removeClass("mypagebox-hover");
            });

        var bindingUItem = function () {
            jQuery(".u-item").bind("mouseenter", function () {
                jQuery(this).addClass("u-hover");
                jQuery(this).find(".nav-sub").show();
            });
            jQuery(".u-item").bind("mouseleave", function () {
                jQuery(this).removeClass("u-hover");
                jQuery(this).find(".nav-sub").hide();
            });
        }
        bindingUItem();

        (function (win) {
            //jQuery.getJSON("http://bbs.cnool.net/ajaxcross/currentuser2016.aspx?callback=?", function (res) {
            //    if (res.UserId > 0) {
            //        if (!win.CNOOL_USERNAME) {
            //            win.CNOOL_USERNAME = res.UserName;
            //            win.CNOOL_USERID = res.UserId;
            //        }
            //        jQuery("#divUserNav").html(res.UserInfoHtml);
            //        bindingUItem();
            //        loadMessage();
            //    }
            //});
        })(window);

        // 关掉提醒
        jQuery("#message_html").find(".close").click(function () {
            jQuery(this).parent().hide();
        });

        jQuery("#loginUrl").attr("href", "http://bbs.cnool.net/login.aspx?referer=" + encodeURIComponent(window.location.href));
        jQuery("#regUrl").attr("href", "http://reg.cnool.net/index.aspx?returnurl=" + encodeURIComponent(window.location.href));
        function avatarError(element) {
            element.onerror = null; element.src = 'http://bbs.cnool.net//h/images/common/noavatar_small.gif';
        }

        var showForSB = function (options, c, n) {
            n ? n = 1 : n = 0;
            c.data("target")[options.show[n]]();
        }
    </script>
    <!-- 白色第二导航 结束 -->

    <!-- 公共页面js样式 开始 -->
    
    <style type="text/css">
        /* bbsnav css */
        .headerbg{background:#f4f4f4;border-bottom:1px solid #e5e5e5;}
        #bbsNav{width:1000px;height:70px;background:#f4f4f4;margin:0 auto;}
        #bbsNav .logo{width:165px;height:45px;float:left;display:inline;position:relative;margin:12px 50px 0 0;}
        #bbsNav .logo .bnt{width:163px;height:45px;background:url(/h/images/bbs-logo_1.png) no-repeat 0 0;display:block;text-decoration:none;}
        #bbsNav .map{position:absolute;width:76px;height:20px;float:left;top:10px;left:110px;margin:0 auto;}
        #bbsNav .map .bnt{width:70px;height:19px;display:block;text-decoration:none;font-size:14px;}
        #bbsNav .map .bnt:hover{color:#f50;}
        #bbsNav .nav_box01{width:120px;height:44px;float:left;margin:14px auto 0;}
        #bbsNav .nav_box02{width:160px;height:44px;float:left;margin:14px auto 0;}
        #bbsNav .nav_box03{width:74px;height:44px;float:left;margin:14px auto 0;}
        #bbsNav .nav_box04{width:143px;height:44px;float:left;margin:14px auto 0;}
        #bbsNav .line{width:15px;height:48px;float:left;background:url(/h/images/cnoolbbs-nav-bg_1.png) no-repeat -1010px 0;margin:10px auto 0;}
        #bbsNav .serviceIcon{width:46px;height:40px;float:left;margin:14px auto 0;}
        #bbsNav .serviceIcon .bnt{width:36px;height:40px;background:url(/h/images/cnoolbbs-icon-bg_1.png) no-repeat 0 0;display:block;text-decoration:none;}
        #bbsNav .serviceIcon .bnt:hover{background:url(/h/images/cnoolbbs-icon-bg_1.png) no-repeat -56px 0;}
        /* bbsnav css */
        /*list*/
        UL.nav_list{clear:both;}
        UL.nav_list LI{height:22px;line-height:18px;font-size:14px;text-align:left;float:left;}
        UL.nav_list LI a:hover{background:#f90;color:#FFF;text-decoration:none;padding-top:2px;}
        UL.nav_list01 LI{width:40px;}
        UL.nav_list02 LI{width:68px;}
        /*list*/
    </style>

    <!-- 公共页面js样式 结束 -->



    <!-- 正文开始，背景图片 -->
    <style type="text/css">
        body {
            background: url(/h/images/cnool_bbs_bg01_1.jpg) #FAFEFF no-repeat center 106px;
        }
    </style>

    <!--1通栏广告 开始-->
        <div class="first-banner" id="banner_ad1">

            <script language="JavaScript1.1" src="/h/js/b2de8e6f8ced40a6a35cb606c9f5c3d2.js" charset="gb2312">
            </script>

            <script src="/h/js/scroll_ad3_1.js" charset="gb2312"></script>
        </div>
    <!--1通栏广告 结束-->

    <!-- 法院公告,官方微博,举报电话 开始 -->
    <div class="bbsInfo">
        <ul>
            <li class="infoIcon" style="visibility:hidden">
                在线：34025
                今日发帖：77932(主贴数
                15226)
            </li>
            <li class="jifenIcon cDGray" style="width: 430px;background:none">

            </li>


            <li style="width:47px; float:left">&nbsp;</li>
            <li style="width:77px;" class=" cDGray s1">
                <img src="/h/picture/u254_1.png" width="14" style="margin:4px 4px 0 0; *margin:-1px 4px 0 0;" /><a class="bnt" href="http://nbfy.cnool.net/announce.html"
                                                                                                                        target="_blank"><font color="red">法院公告</font></a>
            </li>
            <li style="width:77px;" class=" cDGray s1">
                <img src="/h/picture/u254_1.png" width="14" style="margin:4px 4px 0 0; *margin:-1px 4px 0 0;" /><a class="bnt" href="http://nbfy.cnool.net/laolai.html"
                                                                                                                        target="_blank"><font color="red">宁波老赖</font></a>
            </li>
            <li class="weiboIcon cDGray"><a href="http://weibo.com/nbcnool" target="_blank">官方微博</a></li>
            <li style="width:157px;" class=" cDGray s1">
                <font color="red">举报电话: 0574—87300169</font>
            </li>
            

        </ul>
    </div>
    <!-- 法院公告,官方微博,举报电话 结束 -->

    <!-- 排行 热点 焦点 开始 -->
    <div id="focusDiv" class="focusNews">
        <div class="body-main">
            <!-- 左边 开始 -->
                <div class="main-left">
                    <!--焦点图片开始-->
                    <div class="focusImg" id="focus_01">
                        <ul id="roll_img">
<<<<<<< HEAD
                            @foreach($common_banner_data as $k=>$v)
                            <li>
                                <a href="http://bbs.cnool.net/10512875.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="电梯内惊现邻居“表情包警告”，有才" src="{{$v->bpic}}" />
                                    <p>{{ $v->describe }}</p>
                                </a>
                            </li>
                            @endforeach
=======
                            <!-- @foreach($common_banner_data as $k=>$v)
                            <li>
                                <a href="http://bbs.cnool.net/10512875.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="电梯内惊现邻居“表情包警告”，有才" src="{{$v->bpic}}" />
                                    <p>电梯内惊现邻居“表情包警告”，有才</p>
                                </a>
                            </li>
                            @endforeach -->
                            dump({{$common_banner_data}})
                            <li>
                                <a href="http://bbs.cnool.net/10512827.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="山上独走，遭遇晒太阳的眼镜蛇！" src="/h/picture/78fde0c1-1ede-4b79-bb0e-76ec10b3f875_1.jpg" />
                                    <p>山上独走，遭遇晒太阳的眼镜蛇！</p>
                                </a>
                            </li>
               <!--              <li>
                                <a href="https://bbs.cnool.net/10504086.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="从宁波转上海，坐2天2夜火车到新疆" src="/h/picture/573012ff-0ebb-46b9-b131-856fadad1a42_1.jpg" />
                                    <p>从宁波转上海，坐2天2夜火车到新疆</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://bbs.cnool.net/10512137.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="江北余姚交界的江畔秋色，像一幅幅油画" src="/h/picture/400ed0ae-95cf-4eda-8598-aaf6ba7a3182_1.jpg" />
                                    <p>江北余姚交界的江畔秋色，像一幅幅油画</p>
                                </a>
                            </li>
                            <li>
                                <a href="http://bbs.cnool.net/10512126.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="手机丢后的神奇经历，天下之大，啥都有！" src="/h/picture/9846285b-00e5-438a-95f8-cd81a7d14f2b_1.png" />
                                    <p>手机丢后的神奇经历，天下之大，啥都有！</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://bbs.cnool.net/10512930.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="重大福利！给你一个亲睹绝唱画作的机会！" src="/h/picture/bf3b5b30-20af-4aec-8f27-7d1a943c7aaa_1.jpg" />
                                    <p>重大福利！给你一个亲睹绝唱画作的机会！</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://bbs.cnool.net/10500231.html" target="_blank" author="0书寒0" node="00-1106">
                                    <img alt="结婚需求大集合，网上报名送烤箱+300现金" src="/h/picture/43ff141d-5498-463d-aae6-d0d6d91c471d_1.jpg" />
                                    <p>结婚需求大集合，网上报名送烤箱+300现金</p>
                                </a>
                            </li> -->
>>>>>>> origin/abzhangzhipeng
                        </ul>
                        <script type="text/javascript">
                            var x = new cnool_slideplayer("#roll_img", { width: "320px", height: "335px", fontsize: "14px", right: "0px", bottom: "36px", time: "5000" });
                            x.factory();
                        </script>
                    </div>
                    <!--焦点图片结束-->
                    <div class="space15px"></div>
                    <!--热帖排行开始-->
                        <div class="rankingList">
                            <!--热帖排行广告开始-->
                            <div class="rankingAd" id="ranking_ad">
                                <script language="JavaScript1.1" src="/h/js/9b45942f55954ae585287731abe355e2.js" charset="gb2312">
                                </script>
                            </div>
                            <div class="news-title02" id="homeBook-menu02">
                                <h2 class="homemenutitle">
                                    <span class="on">24小时</span> <span>48小时</span> <span>一周</span>
                                </h2>
                            </div>
                            <div class="news-body02">
                                <!--快讯列表开始-->
                                <div class="homeBook-body02">
                                    <ul class="linkListItem-list01">
                                        <li>
                                            <a target="_blank" title="宁波小学老师你们正在毁了孩子的一生" href="/10512828.html">
                                                宁波小学老师你们正在毁了孩子的一生
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="吐槽下此女" href="/10512665.html">
                                                吐槽下此女
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="一个喜感的邻居和一个素质极低的邻居！" href="/10512875.html">
                                                一个喜感的邻居和一个素质极低的邻居！
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="非周末休息没人约山上独走……" href="/10512827.html">
                                                非周末休息没人约山上独走……
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波维科家纺公司总经理动手打人" href="/10512664.html">
                                                宁波维科家纺公司总经理动手打人
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="海曙区领导看看青林湾社区是如何欺上瞒下的！" href="/10512651.html">
                                                海曙区领导看看青林湾社区是如何欺上瞒下的！
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波大众中基甬耀售后差，投诉12315、400无果" href="/10512868.html">
                                                宁波大众中基甬耀售后差，投诉12315、400无果
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="美日健身涉嫌欺骗消费者，付钱后近两月仍不能进健身房" href="/10512643.html">
                                                美日健身涉嫌欺骗消费者，付钱后近两月仍不能进健身房
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="向亲们请教个孩子上学的问题，先谢过" href="/10512809.html">
                                                向亲们请教个孩子上学的问题，先谢过
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="各位大侠进来帮我解答一下；关于学区房" href="/10512819.html">
                                                各位大侠进来帮我解答一下；关于学区房
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="一盒牛奶引发的思考" href="/10512832.html">
                                                一盒牛奶引发的思考
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="没有违停标志，就只停了二分钟，搬了一下日常用品" href="/10512801.html">
                                                没有违停标志，就只停了二分钟，搬了一下日常用品
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="有没有考过摩托车驾照的，传授下经验" href="/10512784.html">
                                                有没有考过摩托车驾照的，传授下经验
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="曝光一个垃圾装修公司：宁波瑞灏建筑装饰工程有限公司" href="/10512783.html">
                                                曝光一个垃圾装修公司：宁波瑞灏建筑装饰工程有限公司
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="天天说违章停车问题，但是：现实汽车比车位多怎办？" href="/10512659.html">
                                                天天说违章停车问题，但是：现实汽车比车位多怎办？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="深夜遭受无证摊贩油烟困扰，无证经营该如何整治？" href="/10512894.html">
                                                深夜遭受无证摊贩油烟困扰，无证经营该如何整治？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="急求养狗狗的大家帮忙看一下，狗狗这样叫法到底是怎么" href="/10512672.html">
                                                急求养狗狗的大家帮忙看一下，狗狗这样叫法到底是怎么
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="江北慈城连接线与长兴路路口有人乱开车" href="/10512851.html">
                                                江北慈城连接线与长兴路路口有人乱开车
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="享骑出行滚出宁波" href="/10512895.html">
                                                享骑出行滚出宁波
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="流动征婚有点怕怕" href="/10512591.html">
                                                流动征婚有点怕怕
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--快讯列表结束-->
                                <!--宁波列表开始-->
                                <div class="homeBook-body02" style="display: none">
                                    <ul class="linkListItem-list01">
                                        <li>
                                            <a target="_blank" title="协警抄牌快如闪电" href="/10512484.html">
                                                协警抄牌快如闪电
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="76年女，单亲征婚" href="/10512445.html">
                                                76年女，单亲征婚
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波小学老师你们正在毁了孩子的一生" href="/10512828.html">
                                                宁波小学老师你们正在毁了孩子的一生
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="工作中的那些奇葩事" href="/10512273.html">
                                                工作中的那些奇葩事
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="焦头烂额 无助。。。" href="/10512260.html">
                                                焦头烂额 无助。。。
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="请问到底哪些人在买姚江新城的房子" href="/10512311.html">
                                                请问到底哪些人在买姚江新城的房子
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="东钱湖的户口，可以上什么好一点的小学？" href="/10512283.html">
                                                东钱湖的户口，可以上什么好一点的小学？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="这钱借还是不借呢？" href="/10512530.html">
                                                这钱借还是不借呢？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="吐槽下此女" href="/10512665.html">
                                                吐槽下此女
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="一个喜感的邻居和一个素质极低的邻居！" href="/10512875.html">
                                                一个喜感的邻居和一个素质极低的邻居！
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="非周末休息没人约山上独走……" href="/10512827.html">
                                                非周末休息没人约山上独走……
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="遇到拖欠工资怎么办，请高位指点" href="/10512261.html">
                                                遇到拖欠工资怎么办，请高位指点
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波维科家纺公司总经理动手打人" href="/10512664.html">
                                                宁波维科家纺公司总经理动手打人
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="请交警或者懂交通法的朋友帮忙鉴定" href="/10512288.html">
                                                请交警或者懂交通法的朋友帮忙鉴定
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="海曙区领导看看青林湾社区是如何欺上瞒下的！" href="/10512651.html">
                                                海曙区领导看看青林湾社区是如何欺上瞒下的！
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波大众中基甬耀售后差，投诉12315、400无果" href="/10512868.html">
                                                宁波大众中基甬耀售后差，投诉12315、400无果
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="金庸死了，94岁，在香港走的" href="/10512473.html">
                                                金庸死了，94岁，在香港走的
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="美日健身涉嫌欺骗消费者，付钱后近两月仍不能进健身房" href="/10512643.html">
                                                美日健身涉嫌欺骗消费者，付钱后近两月仍不能进健身房
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="向亲们请教个孩子上学的问题，先谢过" href="/10512809.html">
                                                向亲们请教个孩子上学的问题，先谢过
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="印象普陀" href="/10512503.html">
                                                印象普陀
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--宁波列表结束-->
                                <!--聚焦列表开始-->
                                <div class="homeBook-body02" style="display: none">
                                    <ul class="linkListItem-list01">
                                        <li>
                                            <a target="_blank" title="一个年收入28万的男的穿着普通，请问这样正常吗？" href="/10511631.html">
                                                一个年收入28万的男的穿着普通，请问这样正常吗？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="好奇！宁波做护士到底多少钱一年？" href="/10510797.html">
                                                好奇！宁波做护士到底多少钱一年？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波大学附属医院产科，道德缺失害人不浅" href="/10510703.html">
                                                宁波大学附属医院产科，道德缺失害人不浅
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="景瑞地产“鄞南王”质量就像“光头强”偷工减料很猖狂" href="/10511282.html">
                                                景瑞地产“鄞南王”质量就像“光头强”偷工减料很猖狂
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波殡葬之乱象该何人管？何时休？" href="/10511468.html">
                                                宁波殡葬之乱象该何人管？何时休？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="写在辞职前" href="/10511549.html">
                                                写在辞职前
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="协警抄牌快如闪电" href="/10512484.html">
                                                协警抄牌快如闪电
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="妇儿医院医生总是要你去门口的药店买药？还死贵。" href="/10511824.html">
                                                妇儿医院医生总是要你去门口的药店买药？还死贵。
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="76年女，单亲征婚" href="/10512445.html">
                                                76年女，单亲征婚
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="香港是穷还是富？" href="/10511481.html">
                                                香港是穷还是富？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="煮熟的鸭子要吃了却飞了" href="/10510915.html">
                                                煮熟的鸭子要吃了却飞了
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="东部新城全方位超过鄞州中心区了" href="/10511260.html">
                                                东部新城全方位超过鄞州中心区了
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="鄞州二小 OR 中河实验 OR 宋小" href="/10512015.html">
                                                鄞州二小 OR 中河实验 OR 宋小
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="物业是否有责任？" href="/10511398.html">
                                                物业是否有责任？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="浙BF62U2如果不懂交规麻烦再去重新考一下科目一" href="/10511628.html">
                                                浙BF62U2如果不懂交规麻烦再去重新考一下科目一
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="满城烧桔梗，到底及时休？" href="/10512104.html">
                                                满城烧桔梗，到底及时休？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="镇海众禾不动产黑中介，你们的保护伞有多大？" href="/10510845.html">
                                                镇海众禾不动产黑中介，你们的保护伞有多大？
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="宁波小学老师你们正在毁了孩子的一生" href="/10512828.html">
                                                宁波小学老师你们正在毁了孩子的一生
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="工作中的那些奇葩事" href="/10512273.html">
                                                工作中的那些奇葩事
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" title="华为很恶心的" href="/10511510.html">
                                                华为很恶心的
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--聚焦列表结束-->
                            </div>
                        </div>
                    <!--热帖排行结束-->
                </div>
            <!-- 左边 结束 -->
            <!-- 右边 开始 -->
                <div class="main-right">
                    <!--东论热点开始-->
                    <div class="news-title01 floatingLayer01">
                        <div class="hot-news-ad floatingLayer02" id="hotrecommand_ad">
                            <script language="JavaScript1.1" src="/h/ js/1e727db9dec0499faaedf947fa872dd0.js"
                                    charset="gb2312"></script>
                        </div>
                        <h2>
                            <span>东论热点</span>
                        </h2>
                    </div>
                    <!--东论热点结束-->
                    <!--东论头条1开始-->
                    <div class="headLine">
                            <h1>
                                <a href="http://bbs.cnool.net/10512868.html" title="3个月大众新车各种异响，更诡异的是大灯…怒了" target="_blank" nodeid="00-1102">3个月大众新车各种异响，更诡异的是大灯…怒了</a>
                            </h1>
                            <p>
                                <a href="http://bbs.cnool.net/10512784.html" title="打算入手BMWC650GT，怎么考摩托车驾照？有点想不通" target="_blank" nodeid="00-1104">[打算入手BMWC650GT，怎么考摩托车驾照？有点想不通]</a>
                            </p>
                    </div>
                    <!--东论头条1结束-->
                    <!--东论头条1下前5条开始-->
                    <div class="content line01">
                        <ul class="linkListItem-list03">
                                <li>
                                    <span class="cBrownBBS">[<a target="_blank" href="/forum/生活热点">生活热点</a>] </span>
                                    <a target="_blank" title="每回如厕不冲水，呕！据观察为某外表文艺的女白领" href="http://bbs.cnool.net/10512665.html"
                                       author="风中百合2018" node="00-1121">每回如厕不冲水，呕！据观察为某外表文艺的女白领</a>
                                </li>
                                <li>
                                    <span class="cBrownBBS">[<a target="_blank" href="/forum/家有读书郎">家有读书郎</a>] </span>
                                    <a target="_blank" title="要买学区房，考虑很多求解答。对了，娃才一岁半" href="http://bbs.cnool.net/10512819.html"
                                       author="nemo2017" node="00-1121">要买学区房，考虑很多求解答。对了，娃才一岁半</a>
                                </li>
                                <li>
                                    <span class="cBrownBBS">[<a target="_blank" href="/forum/生活热点">生活热点</a>] </span>
                                    <a target="_blank" title="万里旁有名的“垃圾街”又回归，睡觉被臭醒，咋办" href="http://bbs.cnool.net/10512894.html"
                                       author="耳朵Ear@wechat" node="00-1121">万里旁有名的“垃圾街”又回归，睡觉被臭醒，咋办</a>
                                </li>
                                <li>
                                    <span class="cBrownBBS">[<a target="_blank" href="/forum/海曙区">海曙区</a>] </span>
                                    <a target="_blank" title="玩手机讲大道，2300元/月的工作真轻松！我要举报" href="http://bbs.cnool.net/10512651.html"
                                       author="青林湾东区居民" node="00-1121">玩手机讲大道，2300元/月的工作真轻松！我要举报</a>
                                </li>
                                <li>
                                    <span class="cBrownBBS">[<a target="_blank" href="/forum/生活热点">生活热点</a>] </span>
                                    <a target="_blank" title="遇“流动征婚车”，你猜上面写什么？我跟它几条街" href="http://bbs.cnool.net/10512591.html"
                                       author="梦想的彼岸" node="00-1121">遇“流动征婚车”，你猜上面写什么？我跟它几条街</a>
                                </li>
                            
                            
                        </ul>
                    </div>
                    <!--东论头条1下前5条结束-->
                    <!--东论头条1下后5条开始-->
                    <div class="content">
                        <ul class="linkListItem-list03">
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/生活热点">生活热点</a>] </span>
                                <a target="_blank" title="特仑苏牛奶变豆腐，孩子喝后呕吐！三江居然这样做" href="http://bbs.cnool.net/10512832.html"
                                   author="漫步者7788@qq" node="00-1121">特仑苏牛奶变豆腐，孩子喝后呕吐！三江居然这样做</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/生活热点">生活热点</a>] </span>
                                <a target="_blank" title="巨坑！付完钱1个半月，美日仍不让我老婆进健身房" href="http://bbs.cnool.net/10512643.html"
                                   author="福星咖@qq" node="00-1121">巨坑！付完钱1个半月，美日仍不让我老婆进健身房</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/东论曝光台">东论曝光台</a>] </span>
                                <a target="_blank" title="狠！装修2年所有踢脚线脱落，保修承诺一纸空文" href="http://bbs.cnool.net/10512783.html"
                                   author="iecworldbear" node="00-1121">狠！装修2年所有踢脚线脱落，保修承诺一纸空文</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/海曙区">海曙区</a>] </span>
                                <a target="_blank" title="只停两分钟搬东西，150元停车费真贵！你们要注意" href="http://bbs.cnool.net/10512801.html"
                                   author="chb3369" node="00-1121">只停两分钟搬东西，150元停车费真贵！你们要注意</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/江北区">江北区</a>] </span>
                                <a target="_blank" title="曝光江北此路口，被堵得火大死！每天有车猖狂乱开" href="http://bbs.cnool.net/10512851.html"
                                   author="故事的小黄花—@wechat" node="00-1121">曝光江北此路口，被堵得火大死！每天有车猖狂乱开</a>
                            </li>
                        </ul>
                    </div>
                    <!--东论头条1下后5条结束-->
                    <!--东论第2头条开始-->
                    <div class="secondLine">
                        <h2>
                            <a href="http://bbs.cnool.net/10512828.html" title="小学生早6点晚12点，不堪重负！求老师别毁孩子" target="_blank" nodeid="00-1103">小学生早6点晚12点，不堪重负！求老师别毁孩子</a>
                        </h2>
                        <p>
                            <a href="http://bbs.cnool.net/10512809.html" title="女儿两岁多还不会说话，明年要上幼儿园，能推迟吗" target="_blank" nodeid="00-1105">[女儿两岁多还不会说话，明年要上幼儿园，能推迟吗]</a>
                        </p> 
                    </div>
                    <!--东论第2头条结束-->
                    <!--东论首屏5条开始-->
                    <div class="content line01">
                        <ul class="linkListItem-list03">
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/生活热点">生活热点</a>] </span>
                                <a target="_blank" title="违章停车就该罚，但宁波的停车位缺口究竟有多大？" href="http://bbs.cnool.net/10512659.html"
                                   author="新小吉" node="00-1121">违章停车就该罚，但宁波的停车位缺口究竟有多大？</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/玩在宁波">玩在宁波</a>] </span>
                                <a target="_blank" title="太师椅、罗汉谷，四明山这几个地名有意思，传说…" href="https://bbs.cnool.net/10512644.html"
                                   author="颖之" node="00-1121">太师椅、罗汉谷，四明山这几个地名有意思，传说…</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/宠物宝贝">宠物宝贝</a>] </span>
                                <a target="_blank" title="狗狗一直这样怪叫，医生看不出问题，我只能干着急" href="http://bbs.cnool.net/10512672.html"
                                   author="长安清歌@wechat" node="00-1121">狗狗一直这样怪叫，医生看不出问题，我只能干着急</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/生活热点">生活热点</a>] </span>
                                <a target="_blank" title="共享电动车优惠又方便，但，天上果然不掉馅饼……" href="http://bbs.cnool.net/10512895.html"
                                   author="晓伟35551364" node="00-1121">共享电动车优惠又方便，但，天上果然不掉馅饼……</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/婚纱摄影">婚纱摄影</a>] </span>
                                <a target="_blank" title="东论福利《结婚需求大集合》可领300元现金+烤箱" href="https://bbs.cnool.net/10500231.html"
                                   author="东论婚嫁" node="00-1121">东论福利《结婚需求大集合》可领300元现金+烤箱</a>
                            </li>
                        </ul>
                    </div>
                    <!--东论首屏5条结束-->
                    <!--东论首屏5条开始-->
                    <div class="content">
                        <ul class="linkListItem-list03">
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/看病记">看病记</a>] </span>
                                <a target="_blank" title="宁波医生好暖心！给不会说话的手术患者手绘14幅场" href="https://bbs.cnool.net/10511771.html"
                                   author="基尼" node="00-1122">宁波医生好暖心！给不会说话的手术患者手绘14幅场</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/社会考试">社会考试</a>] </span>
                                <a target="_blank" title="2019国家“双一流”宁波大学，研究生报名最后三天" href="https://bbs.cnool.net/10497383.html"
                                   author="东论在职" node="00-1122">2019国家“双一流”宁波大学，研究生报名最后三天</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/摄影">摄影</a>] </span>
                                <a target="_blank" title="摄影爱好者的福音，万元奖金等您来拿！速来观围！" href="https://bbs.cnool.net/10506831.html"
                                   author="lingcole" node="00-1122">摄影爱好者的福音，万元奖金等您来拿！速来观围！</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/大家小家">大家小家</a>] </span>
                                <a target="_blank" title="重大福利！给你一个亲睹绝唱画作的机会！" href="https://bbs.cnool.net/10512930.html"
                                   author="东房网" node="00-1122">重大福利！给你一个亲睹绝唱画作的机会！</a>
                            </li>
                            <li>
                                <span class="cBrownBBS">[<a target="_blank" href="/forum/装修讨论">装修讨论</a>] </span>
                                <a target="_blank" title="万科全新力作华堂嘉园即将交付，看看你家装得如何" href="http://bbs.cnool.net/10510481.html"
                                   author="验房哥" node="00-1122">万科全新力作华堂嘉园即将交付，看看你家装得如何</a>
                            </li>
                        </ul>
                    </div>
                    <!--东论首屏5条结束-->
                </div>
            <!-- 右边 结束 -->
        </div>



        <!-- 个人中心 -->
        <div class="body-right">
            <!--个人中心开始-->
<iframe src="/home/mygrshouye" frameborder="0" scrolling="no" allowtransparency="true" width="317" height="280" style="border-left:1px solid #dddddd; border-bottom:1px solid #ddd; border-right:1px solid #ddd;padding-bottom:0px;">

</iframe>
            <!--个人中心结束-->

            <!--活动、版主推荐开始-->
                <div class="activityNav">
                    <div class="categoryTop" id="homeBook-menu04">
                        <h2 class="homemenutitle">
                            <span class="on"><a class="cDRed" target="_blank" href="http://hd.cnool.net/">同城活动</a></span>
                        </h2>
                    </div>
                    <div class="categoryBody">
                        <div class="homeBook-body04">
                            <!-- 活动开始 -->
                                <div class="activities-img">
                                    <a target="_blank" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2811&amp;link=https%3a%2f%2fbbs.cnool.net%2f10500231.html">
                                        <img src="http://upload2007.cnool.net/hd.cnool.net/upload/2018/10/31/d77c9f38-8978-42ec-807a-ccc8f68301b3.png" width="" height="">
                                    </a>
                                </div>
                                <div class="activities-title">
                                    <a class="cBig" target="_blank" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2811&amp;link=https%3a%2f%2fbbs.cnool.net%2f10500231.html">
                                        报名结婚需求，可领300元现金+烤箱
                                    </a><br>
                                    <a class="cDGray cSmall" title="报名结婚需求，可领300元现金+烤箱" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2811&amp;link=https%3a%2f%2fbbs.cnool.net%2f10500231.html" target="_blank">
                                        10月31日-11月30日
                                    </a>
                                </div>
                                <div class="activitiesListboxInner">
                                    <ul class="activitiesList">
                                        <li>
                                            <div class="activityBox">
                                                <a target="_blank" href="http://hd.cnool.net/?CommClass=13">
                                                    <img alt="报名结婚需求，可领300元现金+烤箱" src="/h/picture/activity_icon13_1.png" class="activityThumb">
                                                </a>
                                                <p>
                                                    <a class="cBold" target="_blank" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2811&amp;link=https%3a%2f%2fbbs.cnool.net%2f10500231.html" title="报名结婚需求，可领300元现金+烤箱">
                                                        报名结婚需求，可领300元现金+烤箱
                                                    </a><br>
                                                    <a class="cDGray" title="报名结婚需求，可领300元现金+烤箱" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2811&amp;link=https%3a%2f%2fbbs.cnool.net%2f10500231.html" target="_blank">
                                                        10月31日-11月30日
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="activityBox">
                                                <a target="_blank" href="http://hd.cnool.net/?CommClass=9">
                                                    <img alt="装修怕水深？图纸预算审核、陪签合同了解一下" src="/h/picture/activity_icon09_1.png" class="activityThumb">
                                                </a>
                                                <p>
                                                    <a class="cBold" target="_blank" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2772&amp;link=https%3a%2f%2fbbs.cnool.net%2f10412956.html" title="装修怕水深？图纸预算审核、陪签合同了解一下">
                                                        装修怕水深？图纸预算审核、陪签合同了
                                                    </a><br>
                                                    <a class="cDGray" title="装修怕水深？图纸预算审核、陪签合同了解一下" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2772&amp;link=https%3a%2f%2fbbs.cnool.net%2f10412956.html" target="_blank">
                                                        05月29日-12月31日
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="activityBox">
                                                <a target="_blank" href="http://hd.cnool.net/?CommClass=5">
                                                    <img alt="妇科郎主任在线答疑，有问题扔过来！" src="/h/picture/activity_icon05_1.png" class="activityThumb">
                                                </a>
                                                <p>
                                                    <a class="cBold" target="_blank" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2640&amp;link=http%3a%2f%2fbbs.cnool.net%2fcthread-106671514.html" title="妇科郎主任在线答疑，有问题扔过来！">
                                                        妇科郎主任在线答疑，有问题扔过来！
                                                    </a><br>
                                                    <a class="cDGray" title="妇科郎主任在线答疑，有问题扔过来！" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2640&amp;link=http%3a%2f%2fbbs.cnool.net%2fcthread-106671514.html" target="_blank">
                                                        06月23日-06月27日
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="activityBox">
                                                <a target="_blank" href="http://hd.cnool.net/?CommClass=13">
                                                    <img alt="【博洋家纺】婚享会,最高返现10%!" src="/h/picture/activity_icon13_1.png" class="activityThumb">
                                                </a>
                                                <p>
                                                    <a class="cBold" target="_blank" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2809&amp;link=http%3a%2f%2fbbs.cnool.net%2f10508742.html" title="【博洋家纺】婚享会,最高返现10%!">
                                                        【博洋家纺】婚享会,最高返现10%!
                                                    </a><br>
                                                    <a class="cDGray" title="【博洋家纺】婚享会,最高返现10%!" href="http://hd.cnool.net/CilckNoAdd.aspx?CommID=2809&amp;link=http%3a%2f%2fbbs.cnool.net%2f10508742.html" target="_blank">
                                                        10月27日-10月28日
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            <!-- 活动结束 -->
                        </div>
                    </div>
                </div>
            <!--活动、版主推荐结束-->
        </div>
    </div>
    <!-- 排行 热点 焦点 结束 -->

    <!-- 东论热图开始 -->
        <div class="third-banner"></div>
        <div class="mainbody">
            <!-- images str -->
            <div class="img-content">
                <div class="hd">
                    <h3 class="fl">冬雨热图</h3>
                    <div class="ad floatingLayer02" id="hotimage_ad">
                    </div>
                    <span class="fr"></span>
                </div>
                <div class="bd">
                    <div class="left fl">
                        @foreach($heatmap as $k=>$v)
                            @if ($v->id == 1)
                            <div class="po img-box01 fl">
                            @else
                            <div class="po img-box02 fl">
                            @endif
                            <a href="https://bbs.cnool.net/10512679.html" target="_blank" title="{{ $v->hamap->title }}" node="00-1108">
                                @if($v->id == 1)
                                <img style="width: 100%;height: 100%" src="{{ $v->hpic }}" alt="{{ $v->hamap->title }}">
                                @endif
                                <img src="{{ $v->hpic }}" alt="{{ $v->hamap->title }}">
                            </a>
                            <span><a href="https://bbs.cnool.net/10512679.html" target="_blank" title="{{ $v->hamap->title }}" node="00-1108">{{ $v->hamap->title }}</a></span>
                            </div>
                        @endforeach
                    </div>
                    <div class="right fl">
                        <div class="po img-box01 fl">
                            <a href="https://bbs.cnool.net/10512592.html" target="_blank" title="{{ $heatmap1->hamap->title }}" node="00-1110">
                                <img style="width: 100%;height: 100%;" src="{{ $heatmap1->hpic }}" alt="{{ $heatmap1->hamap->title }}">
                            </a>
                            <span><a href="https://bbs.cnool.net/10512592.html" target="_blank" title="{{ $heatmap1->hamap->title}}" node="00-1110">警犬闪电，余姚警犬的颜值担当！</a></span>
                        </div>
                    </div>
                </div>
            
        </div>
    <!-- 东论热图结束 -->

    <!-- 分类上边的左右新闻模块 开始 -->
        <div class="newsMainBody">
            <!-- 信息广场左边 开始 -->
            <div class="newsBar fl">
                <ul class="NumberChooseItem" id="Categoryinfo">
                    <li id="article-detail-10512901" class=""><i><a href="https://news.cnool.net/10512901.html" target="_blank" title="据华星研策统计，上周宁波市六区共成交商品房498套，环比下降55%；市六区住宅成交参考均价为22201元/㎡，环" author="东方快讯" nodeid=""><img src="/h/picture/20181101072239128_1.png" alt="有楼盘在开盘前宣布直降68万,有楼盘依旧"光盘"!最近宁波楼市你看得懂吗?" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512901.html" target="_blank" title="据华星研策统计，上周宁波市六区共成交商品房498套，环比下降55%；市六区住宅成交参考均价为22201元/㎡，环" author="东方快讯" nodeid="">有楼盘在开盘前宣布直降68万,有楼盘依旧"光盘"!最近宁波楼市你看得懂吗?</a></h3>
                        <p>据华星研策统计，上周宁波市六区共成交商品房498套，环比下降55%；市六区住宅成交参考均价为22201元/㎡，环</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 07:30</span>
                        </div>
                    </li>
                    <li id="article-detail-10512924" class="">
                        <h3><a href="https://news.cnool.net/10512924.html" target="_blank" title="宁波的陆先生看到天地和装修公司的广告，号称住宅全包豪华装修原价30几万元，现在搞活动只要18万元，确认后" author="东方快讯" nodeid="">18万全包装修疑被用了山寨电器 业主诘问宁波这家装修公司</a></h3>
                        <p>宁波的陆先生看到天地和装修公司的广告，号称住宅全包豪华装修原价30几万元，现在搞活动只要18万元，确认后</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 09:20</span>
                        </div>
                    </li>
                    <li id="article-detail-10512907" class=""><i><a href="https://news.cnool.net/10512907.html" target="_blank" title="10月30日晚上，来自黑龙江的女子小葛致电晚报热线称，5月份由宁波卖家代购的韩国Tiffany项链断了，9月底寄" author="东方快讯" nodeid=""><img src="/h/picture/20181101075827454_1.png" alt="急！代购的Tiffany项链寄到宁波维修时“消失”！真相是…" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512907.html" target="_blank" title="10月30日晚上，来自黑龙江的女子小葛致电晚报热线称，5月份由宁波卖家代购的韩国Tiffany项链断了，9月底寄" author="东方快讯" nodeid="">急！代购的Tiffany项链寄到宁波维修时“消失”！真相是…</a></h3>
                        <p>10月30日晚上，来自黑龙江的女子小葛致电晚报热线称，5月份由宁波卖家代购的韩国Tiffany项链断了，9月底寄</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 08:05</span>
                        </div>
                    </li>
                    <li id="article-detail-10512905" class=""><i><a href="https://news.cnool.net/10512905.html" target="_blank" title="记者：杨鑫倢来源：澎湃新闻（thepapernews）若无先生，不知是否还有阿里！10月30日，武侠泰斗金庸在香港病" author="东方快讯" nodeid=""><img src="/h/picture/20181101074524739_1.png" alt="金庸去世！马云终于发声，句句痛心！" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512905.html" target="_blank" title="记者：杨鑫倢来源：澎湃新闻（thepapernews）若无先生，不知是否还有阿里！10月30日，武侠泰斗金庸在香港病" author="东方快讯" nodeid="">金庸去世！马云终于发声，句句痛心！</a></h3>
                        <p>记者：杨鑫倢来源：澎湃新闻（thepapernews）若无先生，不知是否还有阿里！10月30日，武侠泰斗金庸在香港病</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 11-01 07:58</span>
                        </div>
                    </li>
                    <li id="article-detail-10512904" class=""><i><a href="https://news.cnool.net/10512904.html" target="_blank" title="面对不断上涨的房价和不断调整的房产政策，许多购房者发现，除了购买新房二手房，还可以通过法院的司法拍卖" author="东方快讯" nodeid=""><img src="/h/picture/20181101073943004_1.jpg" alt="买的新房还没入住，就被物业告上法庭!慈溪30多位业主气愤：还有这操作" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512904.html" target="_blank" title="面对不断上涨的房价和不断调整的房产政策，许多购房者发现，除了购买新房二手房，还可以通过法院的司法拍卖" author="东方快讯" nodeid="">买的新房还没入住，就被物业告上法庭!慈溪30多位业主气愤：还有这操作</a></h3>
                        <p>面对不断上涨的房价和不断调整的房产政策，许多购房者发现，除了购买新房二手房，还可以通过法院的司法拍卖</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 07:48</span>
                        </div>
                    </li>
                    <li id="article-detail-10512911" class="">
                        <h3><a href="https://news.cnool.net/10512911.html" target="_blank" title="这段时间，很多媒体报道了各地学校家委会成员选举的事。个个皆出身名校，人人身怀权柄，上海某小学为竞选家" author="东方快讯" nodeid="">为了孩子纷纷加入 忙来忙去掉头想跑 宁波家委会的围城江湖</a></h3>
                        <p>这段时间，很多媒体报道了各地学校家委会成员选举的事。个个皆出身名校，人人身怀权柄，上海某小学为竞选家</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 08:32</span>
                        </div>
                    </li>
                    <li id="article-detail-10512903" class="">
                        <h3><a href="https://news.cnool.net/10512903.html" target="_blank" title="近日，江北、慈溪、象山通报5起违反中央八项规定精神问题的典型案例。王伟、程永福、陈习波、包春海违规接" author="东方快讯" nodeid="">违规吃喝有偿陪侍 宁波通报一批违反中央八项规定精神案例</a></h3>
                        <p>近日，江北、慈溪、象山通报5起违反中央八项规定精神问题的典型案例。王伟、程永福、陈习波、包春海违规接</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 07:37</span>
                        </div>
                    </li>
                    <li id="article-detail-10512902" class=""><i><a href="https://news.cnool.net/10512902.html" target="_blank" title="昨天，鄞州区东南小学金达路校区正式开建。该项目位于潘火街道，东至金达北路，南至潘火路，西至用地界线(" author="东方快讯" nodeid=""><img src="/h/picture/723cfb1d-0de6-4a75-8bf6-fa1953630ef0_1.jpg" alt="东南小学金达路校区今天开建 42班规模2020年投用" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512902.html" target="_blank" title="昨天，鄞州区东南小学金达路校区正式开建。该项目位于潘火街道，东至金达北路，南至潘火路，西至用地界线(" author="东方快讯" nodeid="">东南小学金达路校区今天开建 42班规模2020年投用</a></h3>
                        <p>昨天，鄞州区东南小学金达路校区正式开建。该项目位于潘火街道，东至金达北路，南至潘火路，西至用地界线(</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 07:35</span>
                        </div>
                    </li>
                    <li id="article-detail-10512927" class=""><i><a href="https://news.cnool.net/10512927.html" target="_blank" title="据台湾媒体报道，李安终于开始筹备电影版《邓丽君传》，选角找上王菲。众所周知，王菲之前所出演的电影大多" author="东方快讯" nodeid=""><img src="/h/picture/44cecfa4-e206-4696-bc84-643148c83407_1.jpeg" alt="李安被曝筹备《邓丽君传》 14年没拍电影的王菲或主演" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512927.html" target="_blank" title="据台湾媒体报道，李安终于开始筹备电影版《邓丽君传》，选角找上王菲。众所周知，王菲之前所出演的电影大多" author="东方快讯" nodeid="">李安被曝筹备《邓丽君传》 14年没拍电影的王菲或主演</a></h3>
                        <p>据台湾媒体报道，李安终于开始筹备电影版《邓丽君传》，选角找上王菲。众所周知，王菲之前所出演的电影大多</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 11-01 09:24</span>
                        </div>
                    </li>
                    <li id="article-detail-10512925" class=""><i><a href="https://news.cnool.net/10512925.html" target="_blank" title="10月30日，著名武侠小说家金庸在家人陪伴下逝世，享年94岁。据指金庸于养和医院与世长辞，不少媒体和读者守" author="东方快讯" nodeid=""><img src="/h/picture/389a90e50784c584fc913f70c397830623c3ce59_w950_h633_1.jpg" alt="武侠小说泰斗金庸去世 记者和读者医院门口聚集" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512925.html" target="_blank" title="10月30日，著名武侠小说家金庸在家人陪伴下逝世，享年94岁。据指金庸于养和医院与世长辞，不少媒体和读者守" author="东方快讯" nodeid="">武侠小说泰斗金庸去世 记者和读者医院门口聚集</a></h3>
                        <p>10月30日，著名武侠小说家金庸在家人陪伴下逝世，享年94岁。据指金庸于养和医院与世长辞，不少媒体和读者守</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 11-01 09:22</span>
                        </div>
                    </li>
                    <li id="article-detail-10512931" class=""><i><a href="https://news.cnool.net/10512931.html" target="_blank" title="据台湾媒体报道，张嘉倪在《延禧攻略》饰演顺嫔，被誉为“最美宠妃”，戏外的她，不久前才平安生下二胎，相" author="东方快讯" nodeid=""><img src="/h/picture/b95350ed-afc3-4d69-8dd2-463aabf19979_1.jpeg" alt="张嘉倪豪宅浴室曝光 微笑提醒：千万别迷路" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512931.html" target="_blank" title="据台湾媒体报道，张嘉倪在《延禧攻略》饰演顺嫔，被誉为“最美宠妃”，戏外的她，不久前才平安生下二胎，相" author="东方快讯" nodeid="">张嘉倪豪宅浴室曝光 微笑提醒：千万别迷路</a></h3>
                        <p>据台湾媒体报道，张嘉倪在《延禧攻略》饰演顺嫔，被誉为“最美宠妃”，戏外的她，不久前才平安生下二胎，相</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 11-01 09:27</span>
                        </div>
                    </li>
                    <li id="article-detail-10512913" class=""><i><a href="https://news.cnool.net/10512913.html" target="_blank" title="A股击穿2500点的时候，一位身居香港的江浙游资大佬在抄完底后，给我发来一条淡淡的报仓短信：子弹全部打出" author="东方快讯" nodeid=""><img src="/h/picture/20181101083115273_1.png" alt="徐翔案三周年：“交易之王”的多面人生" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512913.html" target="_blank" title="A股击穿2500点的时候，一位身居香港的江浙游资大佬在抄完底后，给我发来一条淡淡的报仓短信：子弹全部打出" author="东方快讯" nodeid="">徐翔案三周年：“交易之王”的多面人生</a></h3>
                        <p>A股击穿2500点的时候，一位身居香港的江浙游资大佬在抄完底后，给我发来一条淡淡的报仓短信：子弹全部打出</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 11-01 08:39</span>
                        </div>
                    </li>
                    <li id="article-detail-10512553" class="">
                        <h3><a href="https://news.cnool.net/10512553.html" target="_blank" title="30日网传招商银行宁波分行将首套房贷利率由原先较基准利率上浮25%调整为上浮15%。记者向招行方面求证，其相" author="东方快讯" nodeid="">好消息！房贷利率松动了，首套房贷利率最低为上浮15%</a></h3>
                        <p>30日网传招商银行宁波分行将首套房贷利率由原先较基准利率上浮25%调整为上浮15%。记者向招行方面求证，其相</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 10-31 09:30</span>
                        </div>
                    </li>
                    <li id="article-detail-10512546" class=""><i><a href="https://news.cnool.net/10512546.html" target="_blank" title="10月29日2时45分，在沈海高速杭州湾跨海大桥往宁波方向1402公里处，发生惊险一幕：一辆白色名爵轿车驾驶员" author="东方快讯" nodeid=""><img src="/h/picture/20181031091035180_1.jpg" alt="深夜,宁波一轿车失控撞上大货车!车上下来一男一女,接下来一幕让人傻眼…" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512546.html" target="_blank" title="10月29日2时45分，在沈海高速杭州湾跨海大桥往宁波方向1402公里处，发生惊险一幕：一辆白色名爵轿车驾驶员" author="东方快讯" nodeid="">深夜,宁波一轿车失控撞上大货车!车上下来一男一女,接下来一幕让人傻眼…</a></h3>
                        <p>10月29日2时45分，在沈海高速杭州湾跨海大桥往宁波方向1402公里处，发生惊险一幕：一辆白色名爵轿车驾驶员</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 09:19</span>
                        </div>
                    </li>
                    <li id="article-detail-10512468" class=""><i><a href="https://news.cnool.net/10512468.html" target="_blank" title="2018年10月，新派武侠小说一代宗师金庸逝世，享年94岁。金庸本名查良镛，1924年3月10日生于浙江海宁，1948" author="风兮兮" nodeid=""><img src="/h/picture/20181030191932719_1.jpg" alt="金庸逝世 享年94岁" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512468.html" target="_blank" title="2018年10月，新派武侠小说一代宗师金庸逝世，享年94岁。金庸本名查良镛，1924年3月10日生于浙江海宁，1948" author="风兮兮" nodeid="">金庸逝世 享年94岁</a></h3>
                        <p>2018年10月，新派武侠小说一代宗师金庸逝世，享年94岁。金庸本名查良镛，1924年3月10日生于浙江海宁，1948</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="风兮兮" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">风兮兮 10-30 19:23</span>
                        </div>
                    </li>
                    <li id="article-detail-10512509" class=""><i><a href="https://news.cnool.net/10512509.html" target="_blank" title="“孩子学校水痘爆发，明天开始全班停课，好抓狂啊……”一位小学家长在微信群里抱怨。天气一转冷，各种病毒" author="风兮兮" nodeid=""><img src="/h/picture/20181031071001821_1.jpg" alt="宁波有小学个别班级全班停课!家长抓狂…这种病进入高发期,传染性强!" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512509.html" target="_blank" title="“孩子学校水痘爆发，明天开始全班停课，好抓狂啊……”一位小学家长在微信群里抱怨。天气一转冷，各种病毒" author="风兮兮" nodeid="">宁波有小学个别班级全班停课!家长抓狂…这种病进入高发期,传染性强!</a></h3>
                        <p>“孩子学校水痘爆发，明天开始全班停课，好抓狂啊……”一位小学家长在微信群里抱怨。天气一转冷，各种病毒</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="风兮兮" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">风兮兮 10-31 07:17</span>
                        </div>
                    </li>
                    <li id="article-detail-10512343" class=""><i><a href="https://news.cnool.net/10512343.html" target="_blank" title="海曙分局公开悬赏通缉32名涉黑涉恶在逃人员涉黑涉恶在逃人员名单象山公安局悬赏通缉涉黑涉恶人员涉黑涉恶在" author="风兮兮" nodeid=""><img src="/h/picture/565a2196-a83e-47f7-be22-f6677fa46e60_1.jpg" alt="紧急扩散！宁波警方公开悬赏通缉41人，见到马上报警！" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512343.html" target="_blank" title="海曙分局公开悬赏通缉32名涉黑涉恶在逃人员涉黑涉恶在逃人员名单象山公安局悬赏通缉涉黑涉恶人员涉黑涉恶在" author="风兮兮" nodeid="">紧急扩散！宁波警方公开悬赏通缉41人，见到马上报警！</a></h3>
                        <p>海曙分局公开悬赏通缉32名涉黑涉恶在逃人员涉黑涉恶在逃人员名单象山公安局悬赏通缉涉黑涉恶人员涉黑涉恶在</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="风兮兮" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">风兮兮 10-30 14:51</span>
                        </div>
                    </li>
                    <li id="article-detail-10512520" class=""><i><a href="https://news.cnool.net/10512520.html" target="_blank" title="东部新城再放大招，总投20多亿元的中央公园破土动工了！它的启动，对于宁波城市新中心东部新城来说，将起到" author="东方快讯" nodeid=""><img src="/h/picture/20181031080132733_1.jpg" alt="中央公园开建了！东部新城将再添一座公园，计划 2021年完工" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512520.html" target="_blank" title="东部新城再放大招，总投20多亿元的中央公园破土动工了！它的启动，对于宁波城市新中心东部新城来说，将起到" author="东方快讯" nodeid="">中央公园开建了！东部新城将再添一座公园，计划 2021年完工</a></h3>
                        <p>东部新城再放大招，总投20多亿元的中央公园破土动工了！它的启动，对于宁波城市新中心东部新城来说，将起到</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 08:05</span>
                        </div>
                    </li>
                    <li id="article-detail-10512512" class=""><i><a href="https://news.cnool.net/10512512.html" target="_blank" title="浙江车友们注意啦就在昨日又有很多车将被召回！快来看看具体有哪些车吧日前，北京现代汽车有限公司根据《缺" author="风兮兮" nodeid=""><img src="/h/picture/20181031071756733_1.jpg" alt="@浙江车主 又有50多万辆车将被召回！可能有你的…" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512512.html" target="_blank" title="浙江车友们注意啦就在昨日又有很多车将被召回！快来看看具体有哪些车吧日前，北京现代汽车有限公司根据《缺" author="风兮兮" nodeid="">@浙江车主 又有50多万辆车将被召回！可能有你的…</a></h3>
                        <p>浙江车友们注意啦就在昨日又有很多车将被召回！快来看看具体有哪些车吧日前，北京现代汽车有限公司根据《缺</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="风兮兮" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">风兮兮 10-31 07:24</span>
                        </div>
                    </li>
                    <li id="article-detail-10512508" class=""><i><a href="https://news.cnool.net/10512508.html" target="_blank" title="放学时分，繁忙的十字路口，鄞州一名交警正在敬业地指挥交通，一个身穿校服背着书包的小女生走过马路向交警" author="风兮兮" nodeid=""><img src="/h/picture/20181031070547728_1.jpg" alt="宁波女孩在马路上做了这么一个动作，被网友们怒赞!" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512508.html" target="_blank" title="放学时分，繁忙的十字路口，鄞州一名交警正在敬业地指挥交通，一个身穿校服背着书包的小女生走过马路向交警" author="风兮兮" nodeid="">宁波女孩在马路上做了这么一个动作，被网友们怒赞!</a></h3>
                        <p>放学时分，繁忙的十字路口，鄞州一名交警正在敬业地指挥交通，一个身穿校服背着书包的小女生走过马路向交警</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="风兮兮" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">风兮兮 10-31 07:12</span>
                        </div>
                    </li>
                    <li id="article-detail-10512536" class=""><i><a href="https://news.cnool.net/10512536.html" target="_blank" title="赏芦季来临，蒲苇、芦苇、芦荻、芦竹……这些通常被叫做“芦苇”或者“芦花”的植物，到底有什么不一样？芦" author="东方快讯" nodeid=""><img src="/h/picture/20181031083726098_1.jpg" alt="秋色绚烂，这些地方可赏芦" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512536.html" target="_blank" title="赏芦季来临，蒲苇、芦苇、芦荻、芦竹……这些通常被叫做“芦苇”或者“芦花”的植物，到底有什么不一样？芦" author="东方快讯" nodeid="">秋色绚烂，这些地方可赏芦</a></h3>
                        <p>赏芦季来临，蒲苇、芦苇、芦荻、芦竹……这些通常被叫做“芦苇”或者“芦花”的植物，到底有什么不一样？芦</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 10-31 08:44</span>
                        </div>
                    </li>
                    <li id="article-detail-10512528" class=""><i><a href="https://news.cnool.net/10512528.html" target="_blank" title="有一种图书室，不在繁华的都市之中，它与山水相伴，与清风相随，屹立于乡村山野之间。花香茶香伴书香，这两" author="东方快讯" nodeid=""><img src="/h/picture/20181031082445457_1.jpg" alt="镇海这个乡村书吧成打卡胜地" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512528.html" target="_blank" title="有一种图书室，不在繁华的都市之中，它与山水相伴，与清风相随，屹立于乡村山野之间。花香茶香伴书香，这两" author="东方快讯" nodeid="">镇海这个乡村书吧成打卡胜地</a></h3>
                        <p>有一种图书室，不在繁华的都市之中，它与山水相伴，与清风相随，屹立于乡村山野之间。花香茶香伴书香，这两</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 08:32</span>
                        </div>
                    </li>
                    <li id="article-detail-10512539" class=""><i><a href="https://news.cnool.net/10512539.html" target="_blank" title="大家常说，车辆不是保险箱，贵重物品千万不要放在车内，可有的朋友不光放了，还直接放了一百万的现金！不出" author="东方快讯" nodeid=""><img src="/h/picture/20181031084738150_1.jpg" alt="心真大！竟然在车里放了100万现金！结果悲剧了！" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512539.html" target="_blank" title="大家常说，车辆不是保险箱，贵重物品千万不要放在车内，可有的朋友不光放了，还直接放了一百万的现金！不出" author="东方快讯" nodeid="">心真大！竟然在车里放了100万现金！结果悲剧了！</a></h3>
                        <p>大家常说，车辆不是保险箱，贵重物品千万不要放在车内，可有的朋友不光放了，还直接放了一百万的现金！不出</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 10-31 08:54</span>
                        </div>
                    </li>
                    <li id="article-detail-10512537" class=""><i><a href="https://news.cnool.net/10512537.html" target="_blank" title="虽说好天气延续不断，但是清晨的温度仅在10℃上下，体感较为清冷。好在等到九、十点钟，阳光倾洒大地，气温" author="东方快讯" nodeid=""><img src="/h/picture/20181031084550853_1.jpg" alt="好天气将持续到周五，下周起宁波市区公交实行冬令时" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512537.html" target="_blank" title="虽说好天气延续不断，但是清晨的温度仅在10℃上下，体感较为清冷。好在等到九、十点钟，阳光倾洒大地，气温" author="东方快讯" nodeid="">好天气将持续到周五，下周起宁波市区公交实行冬令时</a></h3>
                        <p>虽说好天气延续不断，但是清晨的温度仅在10℃上下，体感较为清冷。好在等到九、十点钟，阳光倾洒大地，气温</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 08:52</span>
                        </div>
                    </li>
                    <li id="article-detail-10512529" class="">
                        <h3><a href="https://news.cnool.net/10512529.html" target="_blank" title="全球经济不确定性增强，阿里巴巴如何作为？10月30日晚，阿里巴巴集团董事局主席马云发表致股东的公开信，这" author="东方快讯" nodeid="">马云最后一次以董事局主席身份致信阿里股东，说了啥？</a></h3>
                        <p>全球经济不确定性增强，阿里巴巴如何作为？10月30日晚，阿里巴巴集团董事局主席马云发表致股东的公开信，这</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=今日快讯" class="tag tag1">今日快讯</a>
                            </div><span class="info">东方快讯 10-31 08:34</span>
                        </div>
                    </li>
                    <li id="article-detail-10512532" class=""><i><a href="https://news.cnool.net/10512532.html" target="_blank" title="今年是“万里绿道网建设”部署的重要一年，绿道网建设工作列入省、市2018年《政府工作报告》和省政府十方面" author="东方快讯" nodeid=""><img src="/h/picture/20181031083223707_1.png" alt="可走可跑可骑！短短六年，宁波已编织起绿道近1000公里" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512532.html" target="_blank" title="今年是“万里绿道网建设”部署的重要一年，绿道网建设工作列入省、市2018年《政府工作报告》和省政府十方面" author="东方快讯" nodeid="">可走可跑可骑！短短六年，宁波已编织起绿道近1000公里</a></h3>
                        <p>今年是“万里绿道网建设”部署的重要一年，绿道网建设工作列入省、市2018年《政府工作报告》和省政府十方面</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 08:40</span>
                        </div>
                    </li>
                    <li id="article-detail-10512526" class=""><i><a href="https://news.cnool.net/10512526.html" target="_blank" title="29日深夜，慈溪人的朋友圈被一条特别的“求助”刷屏了，“求助人”是慈溪一派出所——“谁家的娃？这么晚了" author="东方快讯" nodeid=""><img src="/h/picture/20181031082126088_1.jpg" alt="慈溪派出所叔叔深夜“求助”：3岁“小客人”在所里睡到凌晨" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512526.html" target="_blank" title="29日深夜，慈溪人的朋友圈被一条特别的“求助”刷屏了，“求助人”是慈溪一派出所——“谁家的娃？这么晚了" author="东方快讯" nodeid="">慈溪派出所叔叔深夜“求助”：3岁“小客人”在所里睡到凌晨</a></h3>
                        <p>29日深夜，慈溪人的朋友圈被一条特别的“求助”刷屏了，“求助人”是慈溪一派出所——“谁家的娃？这么晚了</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 08:28</span>
                        </div>
                    </li>
                    <li id="article-detail-10512540" class=""><i><a href="https://bbs.cnool.net/10512540.html" target="_blank" title="据香港媒体报道，谢霆锋《锋味》第二季日前在顺德一处餐厅拍摄，并邀请了爸爸谢贤和汪明荃担任该集嘉宾，之" author="东方快讯" nodeid=""><img src="/h/picture/20181031090110116_1.jpg" alt="谢霆锋换衣被偷拍 公安彻查负责单位道歉" width="200"></a></i>
                        <h3><a href="https://bbs.cnool.net/10512540.html" target="_blank" title="据香港媒体报道，谢霆锋《锋味》第二季日前在顺德一处餐厅拍摄，并邀请了爸爸谢贤和汪明荃担任该集嘉宾，之" author="东方快讯" nodeid="">谢霆锋换衣被偷拍 公安彻查负责单位道歉</a></h3>
                        <p>据香港媒体报道，谢霆锋《锋味》第二季日前在顺德一处餐厅拍摄，并邀请了爸爸谢贤和汪明荃担任该集嘉宾，之</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://bbs.cnool.net/Home/Tag?tag=头条娱乐" class="tag tag1">头条娱乐</a>
                            </div><span class="info">东方快讯 10-31 09:07</span>
                        </div>
                    </li>
                    <li id="article-detail-10512534" class=""><i><a href="https://news.cnool.net/10512534.html" target="_blank" title="（资料图）昨日，市疾控中心发布11月健康防病提示：流感在我市已进入流行季节，流感病毒将进入活跃时期。又" author="东方快讯" nodeid=""><img src="/h/picture/20181031083548551_1.jpg" alt="预防接种进入高峰期，宁波的流感疫苗供应量仅为去年同期1/4" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512534.html" target="_blank" title="（资料图）昨日，市疾控中心发布11月健康防病提示：流感在我市已进入流行季节，流感病毒将进入活跃时期。又" author="东方快讯" nodeid="">预防接种进入高峰期，宁波的流感疫苗供应量仅为去年同期1/4</a></h3>
                        <p>（资料图）昨日，市疾控中心发布11月健康防病提示：流感在我市已进入流行季节，流感病毒将进入活跃时期。又</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 08:42</span>
                        </div>
                    </li>
                    <li id="article-detail-10512525" class=""><i><a href="https://news.cnool.net/10512525.html" target="_blank" title="记者今天从市公安局获悉，宁波即将开启新一轮烟花爆竹违规燃放专项整治。与往年相比，今年的整治行动来得更" author="东方快讯" nodeid=""><img src="/h/picture/20181031081853676_1.jpg" alt="时间更早，区域更大！宁波即将开启烟花爆竹违规燃放专项整治" width="200"></a></i>
                        <h3><a href="https://news.cnool.net/10512525.html" target="_blank" title="记者今天从市公安局获悉，宁波即将开启新一轮烟花爆竹违规燃放专项整治。与往年相比，今年的整治行动来得更" author="东方快讯" nodeid="">时间更早，区域更大！宁波即将开启烟花爆竹违规燃放专项整治</a></h3>
                        <p>记者今天从市公安局获悉，宁波即将开启新一轮烟花爆竹违规燃放专项整治。与往年相比，今年的整治行动来得更</p>
                        <div class="meta">
                            <div class="tags"><i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00;"></i><a target="_blank" author="东方快讯" nodeid="" href="https://news.cnool.net/Home/Tag?tag=看宁波" class="tag tag1">看宁波</a>
                            </div><span class="info">东方快讯 10-31 08:25</span>
                        </div>
                    </li>
                </ul>

                <div class="article_load_more" id="article_load_more">
                    <a href="javascript:void(0)" id="btnNextPage">加载更多...</a>
                </div>
                <input type="hidden" id="hiddenNewsPageId" value="1">
                <input type="hidden" id="hiddenNewsIndustry" value="">
                <input type="hidden" id="hiddenNewsBlackIndustry" value="">
                <script type="text/javascript">
                    var getNewsPageId = function () {
                        var pageId = 1;
                        try {
                            pageId = parseInt($("#hiddenNewsPageId").val());
                        } catch (e) {
                            pageId = 1;
                        }
                        pageId = pageId || 1;

                        return pageId;
                    };
                    var setNewsPageId = function (pageId) {
                        pageId = pageId || 1;
                        $("#hiddenNewsPageId").val(pageId);
                    };

                    var recGroupId = 0;
                    try {
                        recGroupId = parseInt($.cookie("CNOOL.LAST_ARTICLE_TIME").split(' ')[1]);
                        var recDate = new Date($.cookie("CNOOL.LAST_ARTICLE_TIME").split(' ')[0]);
                        var today = new Date((new Date()).toLocaleDateString());
                        if (recDate < today) {
                            recGroupId = 0;
                        }
                    } catch (ex) {
                        recGroupId = 0;
                    }
                    window.minRecGroupId = NaN;

                    var industryLikesStr = '';
                    var stateTab = "close";
                    var openRemind = "close";

                    function loadNewsList() {
                        var industry = $("#hiddenNewsIndustry").val();
                        var blackIndustry = $("#hiddenNewsBlackIndustry").val();
                        var pageId = getNewsPageId();
                        var pageSize = 30;

                        window.minRecGroupId = NaN;
                        $.getJSON("https://www.cnool.net/www_api/recommendednews.aspx?exceptnews=1&format=jsonp&callback=?", {
                            industry: industry,
                            blackindustry : blackIndustry,
                            pageId: pageId,
                            pageSize: pageSize
                        }).done(function (ret) {
                            if(!ret || !ret.List || ret.List.length == 0) {
                                alert("没有更多数据，请稍后再来");
                                return;
                            }

                            if(pageId == 1) {
                                $("#Categoryinfo").html("");
                            }
                            var articleidfostring = '[10512868,10512828,10512784,10512809,10512875,10512827,10504086,10512137,10512126,10512930,10500231,10512665,10512819,10512894,10512651,10512591,10512832,10512643,10512783,10512801,10512851,10512659,10512644,10512672,10512895,10500231,10511771,10497383,10506831,10512930,10510481,10512679,10512891,10512884,10512702,10512592]';
                            var articlearray = articleidfostring.substr(1, articleidfostring.length - 2).split(",");

                            var detailinfo = '';
                            for (var i = 0; i < ret.List.length; i++) {
                                var item = ret.List[i];
                                var flag = 0;
                                //判断id是不是发布点的
                                for(var h=0;h<articlearray.length;h++){
                                    if(item.Unitsys_ArticleId == articlearray[h]){
                                        flag = 1;
                                        break;
                                    }
                                }
                                if(flag == 1){
                                    continue;
                                }
                                var tagsHtml = '';

                                for (var m = 0; m < item.Tags.length; m++) {
                                    tagsHtml = tagsHtml + '<i class="fa fa-tag" style="width: 12px;height: 14px;margin: 4px 0px 2px 3px;color: #ffaa00; "></i><a target="_blank"  author="'+ item.CreateUser +'" nodeid="" href="' + item.Tags[m].TagUrl + '" class="tag tag' + (m + 1) + '">' + item.Tags[m].TagName + '</a>';
                                    break;
                                }
                                detailinfo = '<li id="article-detail-' + item.Unitsys_ArticleId + '" class="' + item.CssClass + '">';
                                if(item.ImageUrl.length>0){
                                    detailinfo+='<i>\
                                                <a href="'+ item.Url + '" target="_blank" title="' + item.Summary + '" author="'+ item.CreateUser +'" nodeid="">\
                                                     <img src="/h/'+ item.ImageUrl + '" alt="' + item.Title + '" width="200">\
                                                </a>\
                                            </i>';
                                }
                                detailinfo+='<h3><a href="' + item.Url + '" target="_blank" title="' + item.Summary + '" author="'+ item.CreateUser +'" nodeid="">' + item.Title + '</a></h3>\
                            <p>'+ item.Summary + '</p>\
                            <div class="meta">\
                                <div class="tags">'+ tagsHtml + '\
                                </div>\
                                <span class="info">'+ item.CreateUser + ' ' + item.Unitsys_PostDate.substr(5, 15) + '</span>\
                            </div>\
                        </li>';


                                $("#Categoryinfo").append(detailinfo);

                                (function(_articleId) {
                                    $.getJSON("https://viewscount.cnool.net/getcount?key=article-" + _articleId + "&initCount=250&format=jsonp&callback=?", function(viewCountRet) {
                                        $("#article-detail-" + _articleId + " .info c").html(viewCountRet.views);
                                    });
                                })(item.Unitsys_ArticleId);
                            };
                            var $newsBar = $(".newsBar");
                            var $newsMainSide = $(".newsMainSide");
                            //if ($newsBar[0].offsetHeight>$newsMainSide[0].offsetHeight&&pageId>1){
                            //    $(".newsMainSide").addClass("f-fixed").removeClass("f-pos");
                            //};
                        });
                    }

                    function loadNewsListLoop() {
                        var industry = $("#hiddenNewsIndustry").val();
                        var blackIndustry = $("#hiddenNewsBlackIndustry").val();
                        var pageId = getNewsPageId();

                        var targetGroupId = isNaN(window.minRecGroupId) ? recGroupId : window.minRecGroupId - 1;
                        $.getJSON("/www_api/recommendednewsLoop.aspx?format=jsonp&callback=?", {
                            industry: industry,
                            blackindustry: blackIndustry,
                            recGroupId: targetGroupId,
                            needFillUp: pageId == 1
                        }).done(function (ret) {
                            if (!ret || !ret.List || ret.List.length == 0) {
                                alert("没有更多数据，请稍后再来");
                                return;
                            }

                            var thisGroupCount = 0;
                            for (var i = 0; i < ret.List.length; i++) {
                                if (ret.List[i].GroupId == targetGroupId) {
                                    thisGroupCount++;
                                }
                            }
                            if (thisGroupCount > 10) {
                                $.getJSON("https://rec.cnool.net/Script/TraceRecGroupLog?callback=?", {
                                    groupId: recGroupId + 1
                                }, function (ret) {

                                });
                            }

                            if (pageId == 1) {
                                $("#Categoryinfo").html("");
                            }

                            var detailinfo = '';
                            for (var i = 0; i < ret.List.length; i++) {
                                var item = ret.List[i];
                                var tagsHtml = '';
                                for (var m = 0; m < item.Tags.length; m++) {
                                    tagsHtml = tagsHtml + '<a target="_blank"  author="' + item.CreateUser + '" nodeid="" href="' + item.Tags[m].TagUrl + '" class="tag tag' + (m + 1) + '">' + item.Tags[m].TagName + '</a>';
                                }
                                detailinfo = '<li id="article-detail-' + item.Unitsys_ArticleId + '" class="' + item.CssClass + '">\
                            <i>\
                                <a href="'+ item.Url + '" target="_blank" title="' + item.Summary + '" author="' + item.CreateUser + '" nodeid="">\
                                     <img src="/h/'+ replaceImageProtocol(item.ImageUrl) + '" alt="' + item.Title + '" width="200">\
                                </a>\
                            </i>\
                            <h3><a href="'+ item.Unitsys_IndustryUrl + '" target="_blank" title="' + item.Unitsys_IndustryName + '" author="' + item.CreateUser + '" nodeid="" class="tit">' + item.Unitsys_IndustryName + '</a><a href="' + item.Url + '" target="_blank" title="' + item.Summary + '" author="' + item.CreateUser + '" nodeid="">' + item.Title + '</a></h3>\
                            <p>'+ item.Summary + '</p>\
                            <div class="meta">\
                                <div class="tags">'+ tagsHtml + '\
                                </div>\
                                <span class="info" style="font-size: 14px;font-family:"微软雅黑";">'+ item.Unitsys_PostDate.substr(5, 15) + (item.CssClass == "www_ad" ? "" : ' | 阅读（<c>' + 0 + '</c>）') + '</span>\
                            </div>\
                        </li>';
                                $("#Categoryinfo").append(detailinfo);

                                if (isNaN(window.minRecGroupId) || item.GroupId < window.minRecGroupId) {
                                    window.minRecGroupId = item.GroupId;
                                }

                                (function (_articleId) {
                                    $.getJSON("https://viewscount.cnool.net/getcount?key=article-" + _articleId + "&initCount=250&format=jsonp&callback=?", function (viewCountRet) {
                                        $("#article-detail-" + _articleId + " .info c").html(viewCountRet.views);
                                    });
                                })(item.Unitsys_ArticleId);
                            }
                            var $newsBar = $(".newsBar");
                            var $newsMainSide = $(".newsMainSide");
                            //if ($newsBar[0].offsetHeight > $newsMainSide[0].offsetHeight && pageId > 1) {
                            //    $(".newsMainSide").addClass("f-fixed").removeClass("f-pos");
                            //};
                        });
                    }

                    var loading = false;
                    $("#btnNextPage").click(function () {
                        if (loading) return;

                        loading = true;

                        var pageId = getNewsPageId();
                        setNewsPageId(pageId + 1);
                        loadNewsList();

                        loading = false;
                    });

                    $("#btnLoadNew").click(function () {
                        setNewsPageId(1);
                        loadNewsList();
                    });


                    $("#categoryTab li a").click(function () {
                        var category = $(this).attr("data-value");
                        if (stateTab == "close") {
                            setNewsPageId(1);
                            $("#categoryTab li a").removeClass("on");
                            $(this).addClass("on");
                            if ($(this).html() == "推荐") {
                                $("#hiddenNewsIndustry").val("");
                                $("#btnLoadNew").show();
                                loadNewsList();
                            } else {
                                $("#hiddenNewsIndustry").val(category);
                                $("#btnLoadNew").hide();
                                loadNewsList();
                            }
                        } else {
                            var $partab = $(this).parent();
                            if (industryLikesStr.indexOf(category) < 0) {
                                $partab.addClass("hidein");
                                $partab.removeClass("showout");
                                industryLikesStr = industryLikesStr + "," + category;
                            } else {
                                $partab.removeClass("hidein");
                                $partab.addClass("showout");
                                industryLikesStr = industryLikesStr.replace(category, "");
                            }
                            $("#Recommend").attr("data-value", industryLikesStr);
                        }
                    });

                    function GetIndustryUserLikeString() {
                        $.getJSON(_cnoolProtocol + "www.cnool.net/www_api/industryUserLike.aspx?format=jsonp&callback=?", {}).done(function (ret) {
                            if (ret.ResponseCode == 1) {
                                LoadNormalInfo();
                            } else {
                                if (ret.ResponseContent == "") {
                                    LoadNormalInfo();
                                    return;
                                }
                                $("#hiddenNewsBlackIndustry").val(ret.ResponseContent);
                                loadNewsList();

                                $("#Recommend").attr("data-value", ret.ResponseContent);
                                industryLikesStr = ret.ResponseContent;
                                var $tablist = $("#categoryTab li a");
                                for (var i = 0; i < $tablist.length; i++) {
                                    $tabitem = $($tablist[i]);
                                    var htmlcontain = $tabitem.html();
                                    var valuecontain = $tabitem.attr("data-value");
                                    var $partab = $tabitem.parent();
                                    if (htmlcontain == "推荐") {
                                        $partab.addClass('showout');
                                        $("#Recommend").show();
                                        continue;
                                    }
                                    if (industryLikesStr.indexOf(valuecontain) < 0) {
                                        $partab.addClass('showout');
                                        $partab.removeClass('hidein');
                                    } else {
                                        $partab.removeClass('showout');
                                        $partab.addClass('hidein');
                                    }
                                }
                                HandleTabs();
                            }
                        }).always(function () {
                            BtnBinding();
                        }).fail(function () {
                            LoadNormalInfo();
                        });
                    }
                    function HandleTabs() {
                        $("#categoryTab .hidein").addClass("hidebox");
                        $("#categoryTab .showout").removeClass("hidebox");
                        var $tabShowOutList = $("#categoryTab .showout");

                        if ($tabShowOutList.length > 11) {
                            $("#handlebox").show();
                            if (openRemind == "close") {
                                for (var i = 11; i < $tabShowOutList.length; i++) {
                                    $($tabShowOutList[i]).addClass('hidebox');
                                }
                            }
                        } else {
                            $("#handlebox").hide();
                        }


                    }
                    function LoadNormalInfo() {
                        $("#hiddenNewsIndustry").val("");
                        $("#hiddenNewsBlackIndustry").val("");
                        loadNewsList();
                        $("#Recommend").attr("data-value", "");
                        $("#categoryTab li a").parent().addClass('showout');
                    }
                    function BtnBinding() {
                        var $btn = $("#btn");

                        $btn.click(function () {
                            var $this = $(this);
                            var txt = $this.html();
                            if (txt === '-') {
                                stateTab = "close";
                                $("#categoryTab li a").removeClass("on");

                                $("#categoryTab").addClass("outchoice");
                                $("#categoryTab").removeClass("onchoice");
                                HandleTabs();
                                $("#Recommend").show();
                                $("#Recommend").addClass("on");

                                $("#hiddenNewsIndustry").val("");
                                $("#hiddenNewsBlackIndustry").val(industryLikesStr);
                                loadNewsList();

                                $this.html('+');
                                $.getJSON(_cnoolProtocol + "www.cnool.net/www_api/IndustryEdit.aspx?format=jsonp&callback=?", {
                                    industrystr: industryLikesStr
                                }).done(function (ret) {
                                    console.log(ret.ResponseContent);
                                    return;
                                });
                            } else {
                                stateTab = "open";
                                $("#categoryTab li").removeClass("hidebox");
                                $("#categoryTab").addClass("onchoice");
                                $("#categoryTab").removeClass("outchoice");
                                //$("#categoryTab .showout a").addClass("on");
                                $("#Recommend").hide();
                                $("#handlebox").hide();
                                $this.html('-');
                            }
                        });
                    }
                    //by caowy 20170620
                    //GetIndustryUserLikeString();

                    $("#handlebox").click(function () {
                        if (openRemind == "close") {
                            openRemind = "open";
                            $("#categoryTab .showout").removeClass("hidebox");
                            $(this).find("img").attr("src", "/h/images/boxclose_1.png");
                            $(this).addClass("inopen");

                        } else {
                            openRemind = "close";
                            HandleTabs();
                            $(this).find("img").attr("src", "/h/images/boxopen_1.png");
                            $(this).removeClass("inopen");

                        }
                    });
                    window.onload = function () {
                        var close_ad = "<a onclick=javascript:this.parentNode.style.display='none'; style='cursor: pointer; background-image: url(/h/images/close_1.png); width: 17px; height: 17px; position: absolute; bottom: 0; right: 0;'></a>"
                        $(".www_ad").append(close_ad);
                    };
                </script>
            </div>
            <!-- 信息广场左边 结束 -->

            <!-- 信息广场右边 开始 -->
            <div id="fixedDomWrap" style="">
                <div class="newsMainSide">
                    <!-- 广告 -->
                    <div class="content jiaoyi">
                        <div class="hd">
                            <h3><a href="http://market.cnool.net/index" target="_blank">信息广场</a></h3>
                            <span class="infoMarket">
                                <a href="javascript:void(0);" data-id="">全部</a>
                                <a href="javascript:void(0);" data-id="闲置">闲置</a>
                                <a href="javascript:void(0);" data-id="宠物">宠物</a>
                                <a href="javascript:void(0);" data-id="食品">食品</a>
                                <a href="javascript:void(0);" data-id="旅游">旅游</a>
                                <a href="javascript:void(0);" data-id="二手车">二手车</a>
                                <a href="javascript:void(0);" data-id="招聘">招聘</a>
                                <a href="javascript:void(0);" data-id="培训">培训</a>
                                <a href="javascript:void(0);" data-id="票务">票务</a>
                            </span>
                        </div>
                        <div class="bd">
                            <ul class="NumberList NumberJiaoyi">   
                            </ul>
                        </div>
                        <script type="text/javascript">
                            function infoMarket(cid) {

                                $.getJSON('https://www.cnool.net/www_api/market_recommend.aspx?format=jsonp&callback=?&pgsize=19&tagname=' + encodeURIComponent(cid), function (ret) {
                                    //alert(JSON.stringify(ret));
                                    var marketHtml = "";
                                    // alert(ret.length);
                                    for (var i = 0; i < ret.length; i++) {
                                        if (ret[i].cataName.length == 2) {
                                            ret[i].cataName = ret[i].cataName[0] + "　" + ret[i].cataName[1];
                                        }
                                        var style = "";
                                        if (ret[i].isBusinessRecommend == "1") {
                                            style = " style='color:red'";
                                        }
                                        marketHtml = marketHtml + "<li><i>[<a target='_blank' href='" + ret[i].cataUrl + "'>" + ret[i].cataName + "</a>]</i><a " + style + " target='_blank' title='" + ret[i].title + "' href='" + ret[i].url + "'>" + ret[i].title + "<span class='fr'>" + ret[i].content + "</span></a></li>";
                                        //alert(i+marketHtml);
                                    };
                                    //alert(marketHtml);
                                    $(".NumberJiaoyi").append(marketHtml);
                                });
                            };
                            infoMarket("");
                            $(".infoMarket a").click(function () {
                                $(".NumberJiaoyi").html("");
                                var Mcid = $(this).attr("data-id");
                                infoMarket(Mcid);
                            })
                        </script>
                    </div>

                </div>
            </div>
            <!-- 信息广场右边 结束 -->
        </div>
    <!-- 分类上边的左右新闻模块 结束 -->

    <!--板块地图 分类 开始 str-->
        <div class="mapBox" style="margin-top:20px;">
            <div class="categoryTop" id="homeBook-menu01">
                <h2 class="homemenutitle">
                    <span class="on">版块地图</span>
                </h2>
            </div>
            <div class="categoryBody">
                <div class="homeBook-body01" style="display: block;">
                    <ul class="linkListItem-list08">
                         @foreach($common_cates_data as $k=>$v)
                        <li class="line05 line07">
                            <h3>
                                <a href="/column/21" target="_blank"><font color="#ec8a10">{{$v->cname}}</font></a>
<<<<<<< HEAD
                            </h3>
                            <span>
                                @foreach($v['sub'] as $kk=>$vv)
                                <a href="/forum/{{$vv->cname}}" target="_blank">{{$vv->cname}}</a>
                                @endforeach
                            </span>
                        </li>
                        @endforeach
                        <li class="line05">
                            <h3>
                                <a href="/column/34" target="_blank"><font color="#984343">爱好</font></a>
                            </h3>
                            <span>
                                <a href="/forum/宠物宝贝" target="_blank">宠物宝贝</a>
                                <a href="/forum/花鸟鱼虫" target="_blank">花鸟鱼虫</a>
                                <a href="/forum/钓鱼" target="_blank">钓鱼</a>
                                <a href="/forum/艺术品收藏" target="_blank">艺术品收藏</a>
                                <a href="/forum/宁波书画" target="_blank">宁波书画</a>
                                <a href="/forum/甬城随拍" target="_blank">甬城随拍</a>
                                <a href="/forum/人像人文" target="_blank">人像人文</a>
                                <a href="/forum/贴图视界" target="_blank">贴图视界</a>
                                <a href="/forum/风景摄影" target="_blank">风景摄影</a>
                            </span>
                        </li>
=======
                            </h3>
                            <span>
                                @foreach($v['sub'] as $kk=>$vv)
                                <a href="/forum/{{$vv->cname}}" target="_blank">{{$vv->cname}}</a>
                                @endforeach
                            </span>
                        </li>
                        @endforeach
>>>>>>> origin/abzhangzhipeng
                    </ul>
                </div>
            </div>
        </div>
    <!--板块地图 分类 结束 end -->
    <!--页尾开始 -->
        <style>
            #footerfooter .footer-bg {width: 100%;background: #fff;font-size: 12px;}
            #footerfooter #footer {clear: both;margin: 10px auto 0;width: 1170px;padding: 10px 0 20px;text-align: center;line-height: 20px;color: #999;border: 0px solid #fff; background: #fff;}
            #footerfooter .cnool-footer a, .cnool-footer a:visited {color: #999;}
            #footerfooter body, textarea {font: 400 12px/1.5 Simsun,Arial;color: black;}
            #footerfooter .cnoolBottom-box01 {width: 1170px;padding-top: 15px;margin: 4px auto 0px auto;height: 100px;border-top: #FF9B00 2px solid;text-align: center;line-height: 24px;}
            #footerfooter .cnoolBottom-box02 {width: 622px;margin: 0px auto 0px auto;height: 100px;text-align: center;line-height: 25px;padding-left: 110px;}
            #footerfooter .images-left {float: left;height: 75px;border: 1px solid #e7e7e7;border-width: 1px 0 1px 1px;}
            #footerfooter .images-left-one {margin: 5px 5px 0 5px;}
            #footerfooter .images-right {float: left;border: 1px solid #e7e7e7;height: 75px;}
            #footerfooter .sub-list a, .sub-list a:visited {color: #333;}
        </style>
        <div class="footer-bg" id="footerfooter">
            <div id="footer" class="cnool-footer">
                <div class="cnoolBottom-box01 sub-list">
                    <a href="http://nbpi.chinaccs.cn/about.aspx" target="_blank">公司简介</a> 
                    - <a href="http://gg.cnool.net/lxwm.html" target="_blank">联系我们</a> 
                    - <a href="http://suggest.cnool.net/" target="_blank">投诉建议</a> 
                    - <a href="http://gg.cnool.net/" target="_blank">广告服务</a> 
                     <br />  
                    <a>违法和不良信息举报电话: 0574—87300169</a> 
                    - <a href="mailto:webmaster@cnool.net">举报邮箱: webmaster@cnool.net</a> 
                     <br /> 
                    ICP证浙B2-20100453 浙网文[2018]7353-592号 Since 1996.11.21 版权所有 
                    <a href="http://nbpi.chinaccs.cn/" target="_blank">宁波公众信息产业有限公司</a> Copyright © 1996-
                    <script type="text/javascript">document.write((new Date()).getFullYear());</script> CNOOL.NET All Rights
                    Reserved
                    <br />
                    <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33020002001002" style="color:#666; width:205px; height:20px; line-height:20px; text-align:left; display:inline-table;"><img src="/h/picture/1708311646264605925_1.png" style="float: left;margin: 0 2px 0 0;">浙公网安备：33020002001002号</a>
                </div>
                <div class="cnoolBottom-box02">
                    <div class="images-left">
                        <a target="_blank" href="http://182.131.21.137/ccnt-apply/admin/business/preview/business-preview!lookUrlRFID.action?main_id=70B2F259F3DE4CA5B8F3C5CC06241677">
                            <img height="72" width="71" src="/h/picture/gr_1.png" alt="" />
                        </a>
                    </div>
                    <div class="images-left">
                        <a target="_blank" href="http://wangjing.nbsgaj.gov.cn/">
                            <img height="72" width="119" src="/h/picture/ppaa_1.jpg" alt="" />
                        </a>
                    </div>
                    <div class="images-left">
                        <a target="_blank" href="http://www.hd315.gov.cn/beian/view.asp?bianhao=018202001013100002">
                            <img height="72" width="52" src="/h/picture/biaoshi_1.gif" alt="" />
                        </a>
                    </div>
                    <div class="images-left">
                        <a target="_blank" href="http://wangjing.nbsgaj.gov.cn/">
                            <img height="72" width="80" border="0" alt="" src="/h/picture/dtgt_1.gif" />
                        </a>
                    </div>
                    <div class="images-left">
                        <div class="images-left-one">
                            <a target="_blank" href="#">
                                <img height="30" width="127" src="/h/picture/wmbw_1.gif" alt="" />
                            </a>
                        </div>
                        <div class="images-left-one">
                            <a target="_blank" href="http://net.china.com.cn/index.htm">
                                <img height="30" width="127" src="/h/picture/jbzx_1.gif" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="images-right">
                        <a target="_blank" href="http://idinfo.zjaic.gov.cn/bscx.do?method=hddoc&amp;id=33021500000395">
                            <img height="71" width="66" src="/h/picture/wlgs_1.gif" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="/h/js/language.js" type="text/javascript"></script>
    <!-- 页尾结束 -->

    <!-- 电脑版 极速版 客户端 开始 -->
        <div style="width: 1000px; height:30px; text-align: center; margin: 0px auto">
            <a href="http://bbs.cnool.net/" id="gotoDesktop" title="电脑版">电脑版</a>
             | <a href="http://bbs.cnool.net/m/" id="gotoM" title="极速版">极速版</a>
             | <a href="http://bbs.cnool.net/static/appdown/">客户端</a>
            <script type="text/javascript">
                $("#gotoDesktop").attr("href", "javascript:void(0);");
                //$("#gotoM").attr("href", "javascript:void(0);");
                $("#gotoMobile").attr("href", "javascript:void(0);");
                $("#gotoDesktop").click(function () {
                    $.cookie("bbs_prefer_version", "desktop", {
                        path: "/",
                        domain: "cnool.net"
                    });
                    // m -> pc
                    if (window.location.pathname.toLowerCase() == "/m" || window.location.pathname.toLowerCase() == "/m/")
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port);
                    if (window.location.pathname.toLowerCase().indexOf("/m/") == 0)
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port) + window.location.pathname.substr(2, window.location.pathname.length - 2) + window.location.search + window.location.hash;

                    //mobile -> pc
                    if (window.location.pathname.toLowerCase() == "/mobile" || window.location.pathname.toLowerCase() == "/mobile/")
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port);
                    if (window.location.pathname.toLowerCase().indexOf("/mobile/") == 0)
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port) + window.location.pathname.substr(7, window.location.pathname.length - 7) + window.location.search + window.location.hash;
                    window.location.href = "http://bbs.cnool.net/";
                });


                $("#gotoMobile").click(function () {
                    $.cookie("bbs_prefer_version", "mobile", {
                        path: "/",
                        domain: "cnool.net"
                    });
                    // pc -> mobile
                    if (window.location.pathname.toLowerCase() == "/" || window.location.pathname.toLowerCase() == "")
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port) + "/mobile/";
                    if (window.location.pathname.toLowerCase().replace("/", "").indexOf("/") < 0)
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port) + "/mobile" + window.location.pathname + window.location.search + window.location.hash;

                    // m -> mobile
                    if (window.location.pathname.toLowerCase() == "/m" || window.location.pathname.toLowerCase() == "/m/")
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port) + "/mobile/";
                    if (window.location.pathname.toLowerCase().indexOf("/m/") == 0)
                        window.location.href = window.location.protocol + "//" + window.location.hostname + (window.location.port == "" ? "" : ":" + window.location.port) + "/mobile" + window.location.pathname.substr(2, window.location.pathname.length - 2) + window.location.search + window.location.hash;
                    window.location.href = "http://bbs.cnool.net/mobile/";
                });
            </script>
        </div>
    <!-- 电脑版 极速版 客户端 结束 -->


    <script type="text/javascript">
        $("#btnCloseQrCode").click(function () {
            $("#web-fixed").hide();
        });

        $.getJSON("https://ida.cnool.net/AdShowCache2013?bbs-index-qrcode|1|2559&callback=?", function (ret) {
            try {
                if (ret.Src == "") {
                    return;
                }
                $("#web-fixed-link").attr("href", ret.Url)
                $("#web-fixed").css("background-image", "url(" + ret.Src + ")").show();
            } catch (e) {
            }
        });
    </script>

    <!-- 返回顶部 go-top str -->
        <div style="width:1000px; margin:0 auto; position:relative;">
            <div class="go-top">
                <div class="box-go02">
                    <a href="javascript:void(0);" id="phone-cdkey"></a>
                    <div class="web-cdkey">
                        <img src="/h/picture/default_1.aspx" />
                        <span>扫描东论手机版</span>
                    </div>
                </div>
                <div class="box-go03">
                    <a href="http://suggest.cnool.net/" target="_blank"></a>
                </div>
                <div class="box-go01">
                    <a href="#"></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $("#phone-cdkey").hover(function () {
                    $(".web-cdkey").show()
                },
                    function () {
                        $(".web-cdkey").hide()
                    })
            });
            //统计代码
            try {
                var target = document.location.href;
                var category = "bbsindex";
                $.getJSON("https://clickcount.cnool.net?callback=?", {
                    target: target,
                    category: category,
                    author: " ",
                    nodeId: " ",
                    forumId: "0",
                    forumName: " ",
                    referer: document.referrer
                }, function (ret) {
                    //console.log(ret);
                });
            }
            catch (e) {
            }
            $("a").click(function () {
                try {
                    var $this = $(this);
                    var target = $this.attr("href");
                    var category = $this.attr("countcategory");
                    var author = $this.attr("author");
                    var nodeId = $this.attr("node");
                    if (!category) {
                        category = " ";
                    }
                    if (!author) {
                        author = " ";
                    }
                    if (!nodeId) {
                        nodeId = " ";
                    }
                    $.getJSON("https://clickcount.cnool.net?callback=?", {
                        target: target,
                        category: category,
                        author: author,
                        nodeId: nodeId
                    }, function (ret) {
                        //console.log(ret);
                    });
                }
                catch (e) {
                }
            });
            $(".menu li").hover(function () {
                $(this).children().eq(1).show();
            }, function () {
                $(this).children().eq(1).hide();
            });
        </script>
    <!-- 返回顶部 go-top end -->

    <!-- 底部的script 开始 -->
        <script>
            var EventUtil = {
                addHandler: function (element, type, handler) {
                    if (element.addEventListener) {
                        element.addEventListener(type, handler, false);
                    }
                    else if (element.attachEvent) {
                        element.attachEvent("on" + type, handler);
                    } else {
                        element["on" + type] = handler;
                    }
                },
                removeHandler: function (element, type, handler) {
                    if (element.removeEventListener) {
                        element.removeEventListener(type, handler, false);
                    }
                    else if (element.detachEvent) {
                        element.detachEvent("on" + type, handler);
                    } else {
                        element["on" + type] = null;
                    }
                }
            }
            $(".menu li").hover(function () {
                $(this).children().eq(1).show();
            }, function () {
                $(this).children().eq(1).hide();
            });
        </script>
        <script src="/h/js/qpxl_1.js" type="text/javascript"></script>
        <!-- 统计 -->
        <div style="display: none;" id="stat_code">
            <script>
                var _hmt = _hmt || [];
                (function () {
                    var hm = document.createElement("script");
                    hm.src = "https://hm.baidu.com/hm.js?0615844ecbe6f0ff57c237e83788e50c";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(hm, s);
                })();
            </script>
        </div>
    <!-- 底部的script 结束 -->

<!-- 首页 end -->
@endsection



