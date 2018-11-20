@if(session('config')['status']==2)
@include('home.layout.back')
@else
@include('home.layout.header')

<div class="fly-home fly-panel" style="background-image: url();">
  <img src="{{ $userdetail->photo }}" alt="{{ $user->username }}">
  @if(  substr_count($userdetail->fas,',') >= 5 ) 
  <i class="iconfont icon-renzheng" title="社区认证：（粉丝大于5）"></i>
  @endif
  

  <h1>
    {{ $user->username }}
    @if( $userdetail->sex == 2 )  
    <i class="iconfont icon-nan"></i>
    @elseif( $userdetail->sex == 1 ) 
    <i class="iconfont icon-nv"></i> 
    @endif

    <i class="layui-badge fly-badge-vip"> 粉丝 : {{ substr_count($userdetail->fas,',') }} </i>
    @if(  substr_count($userdetail->fas,',') >= 5 ) 
    <!-- <span style="color:#c00;">（管理员）</span> -->
    <span style="color:#5FB878;">（社区之光）</span>
    @endif

    @if( $user->status == 5 ) 
    <span>（该号已被封）</span>
    @endif
    
  </h1>

  @if( $user->status == 1)
  <p style="padding: 10px 0; color: #5FB878;">认证信息： 超级管理员 </p>
  @elseif( $user->status == 2)
  <p style="padding: 10px 0; color: #5FB878;">认证信息： 论坛管理员 </p>
  @else
  <p style="padding: 10px 0; color: #5FB878;">认证信息： 普通用户 </p>
  @endif

  <p class="fly-home-info">
    <i class="iconfont icon-kiss" title="飞吻"></i><span style="color: #FF7200;">{{ $userdetail->followingn }} 关注</span>
    <i class="iconfont icon-kiss" title="飞吻"></i><span style="color: #FF7200;">{{ $userdetail->integral }} 积分</span>

    <i class="iconfont icon-shijian"></i><span>{{ $userdetail->created_at }} 加入</span>
    <i class="iconfont icon-chengshi"></i><span>来自{{ $userdetail->city }}</span>
  </p>

  <p class="fly-home-sign">{{$userdetail->email}}</p>

  <div class="fly-sns" data-user="">
    <a href="javascript:;" class="layui-btn layui-btn-primary fly-imActive" data-type="addFriend">加为好友</a>
    <a href="javascript:;" class="layui-btn layui-btn-normal fly-imActive" data-type="chat">发起会话</a>
  </div>

</div>

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md6 fly-home-jie">
      <div class="fly-panel">
        <h3 class="fly-panel-title">{{ $user->username }} 最近的提问</h3>
        <ul class="jie-row">

          

          @foreach( $common_article_data as $karticles=>$varticles)
            @if( $varticles->uid == $user->id )
            <li>
              @if( $varticles->zan >= 60 )
              <span class="fly-jing">精</span>
              @endif
              <a href="/home/article/show/{{ $varticles->id }}" class="jie-title"> {{ $varticles->title }} </a>
              <i>{{ $varticles->created_at }}</i>
              <em class="layui-hide-xs">1136阅/27答/{{ $varticles->zan }}赞</em>
            </li>
            @endif
          @endforeach  

          @if( $articleuid === false ) 
            <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何求解</i></div>
          @endif
 
        </ul>
      </div>
    </div>
    
    <div class="layui-col-md6 fly-home-da">
      <div class="fly-panel">
        <h3 class="fly-panel-title">贤心 最近的回答</h3>
        <ul class="home-jieda">
          <li>
          <p>
          <span>1分钟前</span>
          在<a href="" target="_blank">tips能同时渲染多个吗?</a>中回答：
          </p>
          <div class="home-dacontent">
            尝试给layer.photos加上这个属性试试：
<pre>
full: true         
</pre>
            文档没有提及
          </div>
        </li>
        <li>
          <p>
          <span>5分钟前</span>
          在<a href="" target="_blank">在Fly社区用的是什么系统啊?</a>中回答：
          </p>
          <div class="home-dacontent">
            Fly社区采用的是NodeJS。分享出来的只是前端模版
          </div>
        </li>
        
          <!-- <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何问题</span></div> -->
        </ul>
      </div>
    </div>
  </div>
</div>

@include('home.layout.footer')
@endif