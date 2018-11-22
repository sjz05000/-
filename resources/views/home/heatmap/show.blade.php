@include('home.layout.header')
<link rel="stylesheet" type="text/css" href="/h/ad/css/ad.css">
<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md8 content detail">
<!-- 文章开始 -->
    <div class="fly-panel detail-box">
        <h1 style="text-align:center;color:orange;">{{ $data->title }}</h1>
        <div class="detail-body photos">
          <p style="text-align: center;font-size:13px;font-color:#ccc;">
            来源:{{ $data->path }}作者:{{ $data->auth }}创建时间:{{ $data->created_at }}更新时间:{{ $data->updated_at }}
          </p>
          <p style="text-align:center;">{!!$data->content!!}</p>          
        </div>
    </div>
 <!-- 文章结束 -->
<!-- 回帖开始 -->
   <div class="fly-panel detail-box" id="flyReply">
        <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
          <legend>回帖</legend>
        </fieldset>
        <h1></h1>
        <ul class="jieda" id="jieda">
          <li data-id="111" class="jieda-daan">
            <a name="item-1111111111"></a>
            <div class="detail-about detail-about-reply">
              <div class="fly-detail-user">
                <a href="" class="fly-link">
                  <cite>贤心</cite>
                  <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                  <i class="layui-badge fly-badge-vip">VIP3</i>              
                </a>
                <span style="color:#5FB878">(管理员)</span>
              </div>

              <div class="detail-hits">
                <span>2017-11-30</span>
              </div>
<!--  <i class="iconfont icon-caina" title="最佳答案"></i> -->
            </div>
            <div class="detail-body jieda-body photos">
              <p>香菇那个蓝瘦，这是一条被采纳的回帖</p>
            </div>
            <div class="jieda-reply">
              <span class="jieda-zan zanok" type="zan">
                <i class="iconfont icon-zan"></i>
                <em>66</em>
              </span>
              <span type="reply">
                <i class="iconfont icon-svgmoban53"></i>
                回复
              </span>
              <div class="jieda-admin">
                <span type="edit">编辑</span>
                <span type="del">删除</span>
                <!-- <span class="jieda-accept" type="accept">采纳</span> -->
              </div>
            </div>
          </li>
         </ul>
        
          
          <!-- 无数据时 -->
          <li class="fly-none">消灭零回复</li>
  
        <div class="layui-form layui-form-pane">
          <form action="" method="post">
            {{csrf_field()}}
            <div class="layui-form-item layui-form-text">
              <a name="comment"></a>
              <div class="layui-input-block">
                <textarea id="L_content" name="content" required lay-verify="required" placeholder="请输入内容"  class="layui-textarea fly-editor" style="height: 150px;"></textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <input type="submit" class="layui-btn" value="提交回复">
            </div>
          </form>
        </div>
    </div>
 <!-- 回帖结束 -->
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
			<li><img style="width:100%;height:100%;" src="{{$v->adfile}}" title="联系电话:{{$v->adphone}}"></li>
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
      // 发送ajax
      $('input[type=submit]').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         }); 
        var textarea = $('#L_content').val();
        $.ajax({
        url: "/home/navigation/show/{{$id}}",
        type: 'get',
        data:{'textarea':textarea},
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
      // 阻止表单提交
      $('form').submit(function(){
        return false;
      });
		</script>
		<!-- 广告结束 -->
      </div>
    </div>
  </div>
</div>
@include('home.layout.footer')