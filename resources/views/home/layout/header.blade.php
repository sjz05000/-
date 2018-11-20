<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>{{session('config')['title']}}</title>
  <meta name="keywords" content="{{session('config')['keywords']}}" />
  <meta name="description" content="{{session('config')['content']}}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/h/res/layui/css/layui.css">
  <link rel="stylesheet" href="/h/res/css/global.css">
  <script type="text/javascript" src="/h/ad/jquery-1.8.3.min.js"></script>
</head>
<script src="/h/res/layui/layui.all.js"></script>
<body>
<div class="fly-header layui-bg-black">
  <div class="layui-container">
    <a class="fly-logo" href="/">
      <img src="{{session('config')['file']}}" alt="layui" style="width:77px;">
    </a>
    <ul class="layui-nav fly-nav layui-hide-xs">
      <li class="layui-nav-item layui-this">
        <a href="/"><i class="iconfont icon-jiaoliu"></i>交流</a>
      </li>
      <li class="layui-nav-item">
        <a href="case/case.html"><i class="iconfont icon-iconmingxinganli"></i>案例</a>
      </li>
      <li class="layui-nav-item">
        <a href="http://www.layui.com/" target="_blank"><i class="iconfont icon-ui"></i>框架</a>
      </li>
    </ul>
    
   <ul class="layui-nav fly-nav-user">
      @if(empty(session('home')))
      <!-- 未登入的状态 -->
      <li class="layui-nav-item">
        <a class="iconfont icon-touxiang layui-hide-xs" href="/home/user/login"></a>
      </li>
      <li class="layui-nav-item">
        <a href="/home/login">登入</a>
      </li>
      <li class="layui-nav-item">
        <a href="/home/reg">注册</a>
      </li>
      <li class="layui-nav-item layui-hide-xs">
        <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" title="QQ登入" class="iconfont icon-qq"></a>
      </li>
      <li class="layui-nav-item layui-hide-xs">
        <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" title="微博登入" class="iconfont icon-weibo"></a>
      </li>
      @else
      <!-- 登入后的状态 -->
      
      <li class="layui-nav-item">
        <a class="fly-nav-avatar" href="javascript:;">
          <cite class="layui-hide-xs">{{session('homeinfo')['username']}}</cite>
          <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：layui 作者"></i>
          <i class="layui-badge fly-badge-vip layui-hide-xs">VIP3</i>
          <img src="{{session('photo')}}">
        </a>
        <dl class="layui-nav-child">
          <dd><a href="/home/user/set/{{session('homeinfo')['id']}}"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
          <dd><a href="/home/user/message/{{session('homeinfo')['id']}}"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
          <dd><a href="/home/user/home/{{session('homeinfo')['id']}}"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
          <hr style="margin: 5px 0;">
          <dd><a href="/home/login/checkdown" style="text-align: center;">退出</a></dd>
        </dl>
      </li>
      
      @endif
    </ul>
  </div>
</div>
<!-- 导航 开始 -->
<!-- <div class="fly-panel fly-column">
  <div class="layui-container">
    <ul class="layui-clear">
      <li class="layui-hide-xs layui-this"><a href="/home">首页</a></li> 
      <li><a href="jie/index.html">提问</a></li> 
      <li><a href="jie/index.html">分享<span class="layui-badge-dot"></span></a></li> 
      <li><a href="jie/index.html">讨论</a></li> 
      <li><a href="jie/index.html">建议</a></li> 
      <li><a href="jie/index.html">公告</a></li> 
      <li><a href="jie/index.html">动态</a></li> 
      <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><span class="fly-mid"></span></li> 
      
       用户登入后显示
      <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="user/index.html">我发表的贴</a></li> 
      <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="user/index.html#collection">我收藏的贴</a></li> 
    </ul> 
    
    <div class="fly-column-right layui-hide-xs"> 
      <span class="fly-search"><i class="layui-icon"></i></span> 
      <a href="jie/add.html" class="layui-btn">发表新帖</a> 
    </div> 
    <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;"> 
      <a href="jie/add.html" class="layui-btn">发表新帖</a> 
    </div> 
  </div>
</div> -->
<ul class="layui-nav layui-bg-cyan"  lay-filter="" style="padding-left:170px; ">
  <li class="layui-nav-item" id="navigation"><a href="/home">首页</a></li>
  @foreach($common_navigation_data as $k=>$v)
  <li class="layui-nav-item" id="navigation">
    <a href="/home/navigation/show/{{$v->id}}">{{$v->navname}}</a>
    <dl class="layui-nav-child"> 
      <!-- 二级菜单 -->
      @foreach($v->sub as $kk=>$vv)
      <dd><a href="/home/navigation/show/{{$vv->id}}">{{$vv->navname}}</a></dd>
      @endforeach
    </dl>
  </li>
  @endforeach
</ul>
<!-- <script>
//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
;!function(){
  var layer = layui.layer
  ,form = layui.form;
  
  layer.msg('Hello World');
}();
</script>  -->
<!-- <script>
//注意：导航 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
  });
</script> -->
<!-- 导航 结束 -->
