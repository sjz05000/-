@if(session('config')['status']==2)
@include('home.layout.back')
@else
@include('home.layout.header')
<link rel="stylesheet" type="text/css" href="/h/ad/css/ad.css">
<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8 content detail">
<!-- 文章开始 -->
@foreach($data->Article as $k=>$v)
    <div class="fly-panel detail-box">
        <h1 style="text-align:center;color:orange;">{{$v->title}}</h1>
        <div class="detail-body photos">
          <p style="text-align: center;font-size:13px;font-color:#ccc;">
            来源:{{$v->path}}作者:{{$v->auth}}创建时间:{{$v->created_at}}更新时间:{{$v->updated_at}}
          </p>
          <p style="text-align:center;">{!!$v->content!!}</p>          
        </div>
    </div>
 @endforeach
 <!-- 文章结束 -->
     </div>
    <div class="layui-col-md4">
      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">本周热议</dt>
        <dd>
          <a href="">基于 layui 的极简社区页面模版</a>
          <span><i class="iconfont icon-pinglun1"></i> 16</span>
        </dd>
        <!-- 无数据时 -->
        <!--
        <div class="fly-none">没有相关数据</div>
        -->
      </dl>

      <div class="fly-panel">
        <div class="fly-panel-title">
          广告
        </div>
    <!-- 广告开始 -->
    <ul id="ad_ul">
      @foreach($common_advertisements_data as $k=>$v)
      <li><img src="{{$v->adfile}}" title="联系电话:{{$v->adphone}}"></li>
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
    </div>
  </div>
</div>
@include('home.layout.footer')
@endif