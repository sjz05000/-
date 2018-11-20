
7<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>{{session('config')['title']}}</title>
  <meta name="keywords" content="{{session('config')['keywords']}}" />
  <meta name="description" content="{{session('config')['content']}}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <link rel="stylesheet" href="/h/res/layui/css/layui.css">
  <link rel="stylesheet" href="/h/res/css/global.css">
</head>
<body>
<div class="fly-header layui-bg-black">
  <div class="layui-container">
    <a class="fly-logo" href="http://www.dongyu.com/home">
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
        <a class="iconfont icon-touxiang layui-hide-xs" href="../user/login.html"></a>
      </li>
      <li class="layui-nav-item">
        <a href="/home/user/login">登入</a>
      </li>
      <li class="layui-nav-item">
        <a href="/home/user/reg">注册</a>
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
          @if( session('fasn') >= 5 ) 
          <i class="iconfont icon-renzheng layui-hide-xs"></i>
          @endif
         
          @if( session('homeinfo')['status'] == 1)
          <i class="layui-badge fly-badge-vip layui-hide-xs">超级管理员</i>
          @elseif( session('homeinfo')['status'] == 2)
          <i class="layui-badge fly-badge-vip layui-hide-xs">论坛管理员</i>
          @else
          <i class="layui-badge fly-badge-vip layui-hide-xs">普通用户</i>          
          @endif 
          <!-- <i class="layui-badge fly-badge-vip layui-hide-xs">VIP3</i> -->
          <img src="{{session('photo')}}">
        </a>
        <dl class="layui-nav-child">
          <dd><a href="http://www.dongyu.com/home/user/set/{{session('homeinfo')['id']}}"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
          <dd><a href="http://www.dongyu.com/home/user/message/{{session('homeinfo')['id']}}"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
          <dd><a href="http://www.dongyu.com/home/user/home/{{session('homeinfo')['id']}}"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
          <hr style="margin: 5px 0;">
          <dd><a href="/home/login/checkdown" style="text-align: center;">退出</a></dd>
        </dl>
      </li>
      
      @endif
    </ul>
  </div>
</div>
<!-- 导航 开始 -->
<style type="text/css">
  #shouye-nav .layui-nav .layui-nav-item a{
    color: #000;
  }
  #shouye-nav .layui-nav .layui-nav-item a:hover{
    color: green;
  }
</style>
<div id="shouye-nav">
<ul class="layui-nav" lay-filter="" style="padding-left:170px; background-color: #fff; color: #000; border-radius: 2px; font-size: 0; box-sizing: border-box;">
  <li class="layui-nav-item layui-this"><a href="http://www.dongyu.com/home">首页</a></li>
  @foreach($common_navigation_data as $k=>$v)
  <li class="layui-nav-item">
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
</div> 
<div class="fly-column">
  <div class="layui-container"> 
    <div class="fly-column-right layui-hide-xs"> 
      <span class="fly-search"><i class="layui-icon"></i></span> 
      <a href="jie/add.html" class="layui-btn">发表新帖</a> 
    </div> 
    <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;"> 
      <a href="jie/add.html" class="layui-btn">发表新帖</a> 
    </div> 
  </div>
</div>
 
<!-- <script>
//注意：导航 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
  
  //…
});
</script> -->
<!-- 导航 结束 -->