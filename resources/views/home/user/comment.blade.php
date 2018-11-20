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
    <li class="layui-nav-item">
      <a href="http://www.dongyu.com/home/user/{{session('homeinfo')['id']}}">
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
    <li class="layui-nav-item layui-this">
      <a href="http://www.dongyu.com/home/user/comment/{{session('homeinfo')['id']}}">
        <i class="layui-icon">&#xe611;</i>
        我的评论
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
	  <div class="layui-tab layui-tab-brief" lay-filter="user" id="LAY_msg" style="margin-top: 15px;">
	    <div  id="LAY_minemsg" style="margin-top: 10px;">
        <!--<div class="fly-none">您暂时没有最新消息</div>-->
        @foreach($data as $k=>$v)
        <ul class="mine-msg">
          <li data-id="123">
            <blockquote class="layui-elem-quote">
              <a href="/jump?username=Absolutely" target="_blank"><cite>{{session('homeinfo')['username']}}</cite></a>{{$v->content}}
            </blockquote>
          </li>
        </ul>
        @endforeach
        <!-- 消息结束 -->
      </div>
	  </div>
	</div>

</div>


@include('home.layout.footer')
@endif
