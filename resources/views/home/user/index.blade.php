@if(session('config')['status']==2)
@include('home.layout.back')
@else
@include('home.layout.header')

<div class="layui-container fly-marginTop fly-user-main">
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item">
      <a href="http://www.dongyu.com/home/user/home/{{session('homeinfo')['id']}}">
        <i class="layui-icon">&#xe609;</i>
        我的主页
      </a>
    </li>
    <li class="layui-nav-item layui-this">
      <a href="http://www.dongyu.com/home/user/indexa/{{session('homeinfo')['id']}}">
        <i class="layui-icon">&#xe612;</i>
        用户中心
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="http://www.dongyu.com/home/user/set/{{session('homeinfo')['id']}}">
        <i class="layui-icon">&#xe620;</i>
        基本设置
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="http://www.dongyu.com/home/user/message/{{session('homeinfo')['id']}}">
        <i class="layui-icon">&#xe611;</i>
        我的消息
      </a>
    </li>
  </ul>

  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  
  <div class="fly-panel fly-panel-user" pad20>
    <!--
    <div class="fly-msg" style="margin-top: 15px;">
      您的邮箱尚未验证，这比较影响您的帐号安全，<a href="activate.html">立即去激活？</a>
    </div>
    -->
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title" id="LAY_mine">
        <li data-type="mine-jie" lay-id="index" class="layui-this">我发的帖（<span>{{ $fabu }}</span>）</li>
        <li data-type="collection" data-url="/collection/find/" lay-id="collection">我收藏的帖（<span>{{ $shoucang }}</span>）</li>
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <ul class="mine-view jie-row">
            @foreach($collect->usera  as $kc=>$vc)
            <li>
              <a class="jie-title" href="/home/article/show/{{ $vc->id }}" target="_blank">{{ $vc->title }}</a>
              <i>{{ $vc->created_at }}</i>
              <a class="mine-edit" href="/home/article/{{$vc->id}}">删除</a>
              <!-- <em>10答</em> -->
            </li>
            @endforeach
          </ul>
          <div id="LAY_page"></div>
        </div>
        <div class="layui-tab-item">
          <ul class="mine-view jie-row">
            @foreach($collect->usercollect as $ku=>$vu)
            <li>
              <a class="jie-title" href="/home/article/show/{{ $vu->id }}" target="_blank">{{ $vu->title }}</a>
              <i>{{ $vu->created_at }}收藏</i> 
              <a class="mine-edit" href="/home/articlel/{{$vu->uid}}/{{$vu->id}}">删除</a>
            </li>
            @endforeach
          </ul>
          <div id="LAY_page1"></div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('home.layout.footer')
@endif