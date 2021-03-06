@if(session('config')['status']==2)
@include('home.layout.back')
@else
@include('home.layout.header')
<link rel="stylesheet" type="text/css" href="/h/ad/css/ad.css">
    <div class="layui-container">
      <div class="layui-row layui-col-space15">
    

    <div class="layui-col-md8">
    <!-- 轮播图 开始 -->
        <center>
        <link rel="stylesheet" href="/h/banner/css/style.css">
        <div class="demo">
           <!-- <a class="control prev"></a><a class="control next abs"></a>    --><!--自定义按钮，移动端可不写!-->
          <div class="slider" style="margin:20px; border: 2px solid black">  <!--主体结构，请用此类名调用插件，此类名可自定义-->
            <ul>
              @foreach($common_banner_data as $k=>$v)
               <li><img style="width: 90%;height: 100%;" src="{{ $v->bpic }}"></li>
              @endforeach 
            </ul>
          </div>
        </div>
      </center>
        <script src="/h/banner/js/jquery.min.js"></script>
        <script src="/h/banner/js/YuxiSlider.jQuery.min.js"></script>
        <script>
        $(".slider").YuxiSlider({
          width:700, //容器宽度
          height:400, //容器高度
          control:$('.control'), //绑定控制按钮
          during:3500, //间隔4秒自动滑动
          speed:800, //移动速度0.8秒
          mousewheel:true, //是否开启鼠标滚轮控制
          direkey:false //是否开启左右箭头方向控制
        });
        </script>
        </center>
        <!-- 轮播图 结束 -->  
      <div class="fly-panel">
        <div class="fly-panel-title fly-filter">
          <a>置顶</a>
          <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
        </div>
        <ul class="fly-list">
          
          <li>
            <a href="user/home.html" class="fly-avatar">
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
            </a>
            <h2>
              <a class="layui-badge">动态</a>
              <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
            </h2>
            <div class="fly-list-info">
              <a href="user/home.html" link>
                <cite>贤心</cite>
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
              </a>
              <span>刚刚</span>
              
              <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
              <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
            </div>
            <div class="fly-list-badge">
              <!--
              <span class="layui-badge layui-bg-black">置顶</span>
              <span class="layui-badge layui-bg-red">精帖</span>
              -->
            </div>
          </li>
  
        </ul>
      </div>

      <!-- 热点图片 开始-->
        <div class="fly-panel fly-link">
        <h3 class="fly-panel-title">热点图片</h3>
        <ul class="fly-case-list">
          @foreach($common_heatmap_data as $kh=>$vh)
          <li data-id="123" style="width:230px;margin: 0px;margin-left: 10px;">
            <a class="fly-case-img" href="/home/heatmap/{{ $vh->tid }}" target="_blank">
              <img style="width: 100%;" src="{{ $vh->hpic }}" alt="{{ $vh->hamap->title }}">
              <!-- <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite> -->
            </a>
            <div class="fly-case-info">
              <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">{{ $vh->hamap->title }}</span></p>
              <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
            </div>
             </li> 
            @endforeach
           </ul>
        </div> 
      <!-- 热点图片 结束-->

      <div class="fly-panel" style="margin-bottom: 0;">
        
        <div class="fly-panel-title fly-filter">
          <a href="" class="layui-this">综合</a>
          <span class="fly-mid"></span>
          <a href="">未结</a>
          <span class="fly-mid"></span>
          <a href="">已结</a>
          <span class="fly-mid"></span>
          <a href="">精华</a>
          <span class="fly-filter-right layui-hide-xs">
            <a href="" class="layui-this">按最新</a>
            <span class="fly-mid"></span>
            <a href="">按热议</a>
          </span>
        </div>

        <ul class="fly-list">  

          <li>
            <a href="user/home.html" class="fly-avatar">
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
            </a>
            <h2>
              <a class="layui-badge">分享</a>

              <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
            </h2>
            <div class="fly-list-info">
              <a href="user/home.html" link>
                <cite>贤心</cite>
                <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
              </a>
              <span>刚刚</span>
              
              <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
              <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
            </div>
            <div class="fly-list-badge">
              <!--<span class="layui-badge layui-bg-red">精帖</span>-->
            </div>
          </li>

          <li>
            <a href="user/home.html" class="fly-avatar">
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
            </a>
            <h2>
              <a class="layui-badge">动态</a>
              <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
            </h2>
            <div class="fly-list-info">
              <a href="user/home.html" link>
                <cite>贤心</cite>

                <!--<i class="iconfont icon-renzheng" title="认证信息：XXX"></i>-->
                <i class="layui-badge fly-badge-vip">VIP3</i>
              </a>
              <span>刚刚</span>
              
              <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>

              <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
            </div>
            <div class="fly-list-badge">
              <!--<span class="layui-badge layui-bg-red">精帖</span>-->
            </div>
          </li>
 

          <li>
            <a href="user/home.html" class="fly-avatar">
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
            </a>
            <h2>
              <a class="layui-badge">动态</a>
              <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
            </h2>
            <div class="fly-list-info">
              <a href="user/home.html" link>
                <cite>贤心</cite>
                <!--<i class="iconfont icon-renzheng" title="认证信息：XXX"></i>-->
                <i class="layui-badge fly-badge-vip">VIP3</i>
              </a>
              <span>刚刚</span>
              
              <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
              <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
            </div>
            <div class="fly-list-badge">

              <span class="layui-badge layui-bg-red">精帖</span>
            </div>
          </li>
          <li>
            <a href="user/home.html" class="fly-avatar">
              <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
            </a>
            <h2>
              <a class="layui-badge">动态</a>
              <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
            </h2>
            <div class="fly-list-info">
              <a href="user/home.html" link>
                <cite>贤心</cite>
                <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
              </a>
              <span>刚刚</span>
              
              <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
              <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
              <span class="fly-list-nums"> 
                <i class="iconfont icon-pinglun1" title="回答"></i> 66
              </span>
            </div>
            <div class="fly-list-badge">
              <!--<span class="layui-badge layui-bg-red">精帖</span>-->
            </div>
          </li>


        </ul>
        <div style="text-align: center">
          <div class="laypage-main">
            <a href="jie/index.html" class="laypage-next">更多求解</a>
          </div>
        </div>
      </div>
    </div>

    
    <div class="layui-col-md4">
      <!-- 温馨通道 -->
      <div class="fly-panel">
        <h3 class="fly-panel-title">温馨通道</h3>
        <ul class="fly-panel-main fly-list-static">
             @foreach($common_cates_data as $k=>$v)
            <li class="line05 line07" style="list-style:none">
                <h3 style="display: inline-block;">
                    <a href="/home/cate/{{$v->id}}" target="_blank"><font color="#ec8a10">{{$v->cname}}</font></a>
                </h3>
                <span style="display: inline-block;margin-left: 8px;" class="layui-breadcrumb" lay-separator="/">
                    @foreach($v['sub'] as $kk=>$vv)
                    <a href="/home/cate/{{$vv->id}}" target="_blank">{{$vv->cname}}</a>
                    @endforeach
                    @foreach($vv['sub'] as $kkk=>$vvv)
                    <a href="/home/cate/{{$vvv->id}}" target="_blank">{{$vvv->cname}}</a>
                    @endforeach
                </span>
            </li>
            @endforeach       
        </ul>
      </div>
      <!-- 温馨通道结束 -->
      <div class="fly-panel">
        <h3 class="fly-panel-title">热门标签</h3>
        <ul class="fly-panel-main fly-list-static">
            @foreach($common_label_data as $klabel=>$vlabel)
              <a href="/home/label/index/{{$vlabel->id}}">
                <button class="layui-btn layui-btn-xs layui-btn-radius" style="margin: 5px; opacity: 0.6; background-color: {{$vlabel->labelcolor}}"> {{$vlabel->labelname}}（{{$vlabel->articlecount}})</button>
              </a>
            @endforeach       
        </ul>
      </div>
        <!-- qd -->
      <div class="fly-panel fly-signin">
        <div class="fly-panel-title">
          签到
          <i class="fly-mid"></i> 
          <a href="javascript:;" class="fly-link" id="LAY_signinHelp">说明</a>
          <i class="fly-mid"></i> 
          <!-- <a href="javascript:;" class="fly-link" id="LAY_signinTop">活跃榜<span class="layui-badge-dot"></span></a> -->
          <span class="fly-signin-days">已连续签到<cite>16</cite>天</span>
        </div>
        <div class="fly-panel-main fly-signin-main">
          <a class="layui-btn layui-btn-danger" href="javascript:;" id="qiandao">今日签到
            <!-- <input   type="submit" name="" value="">/session('homeinfo')['id'] -->
            <!-- <button class="layui-btn layui-btn-danger" >今日签到</button> -->
          </a>

          <span>可获得<cite>5+</cite>经验</span>
          <!-- 已签到状态 -->
          <!--
          <button class="layui-btn layui-btn-disabled">今日已签到</button>
          <span>获得了<cite>20</cite>飞吻</span>
          -->
        </div>
      </div>
<div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
        <h3 class="fly-panel-title">活跃用户</h3>
        <dl style="height: 300px;">
          <!-- <form action="/home/user" method="get"> -->
          <!--<i class="layui-icon fly-loading">&#xe63d;</i>-->
          @foreach($common_user_data as $kuser=>$vuser)
            @if(  substr_count($vuser->userinfo->fas,',') >= rand(2,4) )
            <dd>
              <a href="http://www.dongyu.com/home/user/home/{{ $vuser->id }}">
                <img src="{{ $vuser->userinfo->photo }}" style="border-radius: 5px;border: 1px solid #ccc;">
                <cite>
                  <k>{{ $vuser->username }}</k>
                </cite>
                  @if( $vuser->userinfo->sex == 1)
                  <p>
                    <i class="iconfont icon-nv" style="color: pink;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                    <div style="float: right;">粉丝 : {{ substr_count($vuser->userinfo->fas,',') }}</div></p>
                  @elseif($vuser->userinfo->sex == 2)
                  <p>
                    <i class="iconfont icon-nan" style="color: skyblue;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>
                    <div style="float: right;">粉丝 : {{ substr_count($vuser->userinfo->fas,',') }}</div></p>
                  @else
                  106次回答
                  @endif
              </a>
            </dd>
            @endif
          @endforeach
          <!-- </form> -->
        </dl>
      </div>
      
     <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">本周热议</dt>
        @foreach($article11 as $kq=>$vq)
        <dd>
          <a href="/home/article/show/{{ $vq->id }}">{{ $vq->title }}</a>

        </dd>
        @endforeach
        <!-- 无数据时 -->
        <!--
        <div class="fly-none">没有相关数据</div>
        -->
      </dl>

      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">24小时热议</dt>
        @foreach($article as $kr=>$vr )
        <dd>
          <a href="/home/article/show/{{ $vr->id }}">{{ $vr->title }}</a>
        </dd>
        @endforeach
        <!-- 无数据时 -->
        <!--
        <div class="fly-none">没有相关数据</div>
        -->
      </dl>

      <div class="fly-panel">
        <div class="fly-panel-title">
          广告区域
        </div>
          <!-- 广告开始 -->
          <ul id="ad_ul">
            @foreach($common_advertisements_data as $k=>$v)

            @if($v->status == 1)
            <li><a href="http://{{$v->url}}"><img src="{{$v->adfile}}" title="联系电话:{{$v->adphone}}"></a></li>
            @endif
            @endforeach
          </ul>
          <script type="text/javascript" src="/h/ad/jquery-1.8.3.min.js"></script>
          <script type="text/javascript">
            setInterval(function(){
              // 获取一个li 上滑动隐藏
              $('#ad_ul li').first().slideUp('slow',function(){
                // 追加到ul 末尾 显示
                $('#ad_ul').append($('#ad_ul li').first().show());
              });
            },2000);
          </script>
          <!-- 广告结束 -->
      </div>
      <script type="text/javascript">
        $('#qiandao').click(function(){
          // 发送ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             }); 
          $.ajax({
          url: "/home/qiandao",
          type: 'get',
          data:{},
          success: function(data){
              if(data=='error'){
                layer.alert('您还未登陆请登录');
              }else{
                layer.alert(data);
              }
            },
            dataType: 'html',
            async:false,
          });
   
        });
      
      </script>
      <div class="fly-panel fly-link">
        <h3 class="fly-panel-title">友情链接</h3>
        <dl class="fly-panel-main">
          @foreach($common_link_data  as $k=>$v)
          <dd><a href="{{ $v->yqlink }}" target="_blank"><img style="width: 100px;height: 72px;" src="{{ $v->yqpic }}" title="{{ $v->yqname }}"></a><dd>
          @endforeach
        </dl>
      </div>
    </div>

  </div>
</div>
@include('home.layout.footer')
@endif
