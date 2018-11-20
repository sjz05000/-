@include('home.layout.header')
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
                
                <span>(楼主)</span>
                <!--
                <span style="color:#5FB878">(管理员)</span>
                <span style="color:#FF9E3F">（社区之光）</span>
                <span style="color:#999">（该号已被封）</span>
                -->
              </div>

              <div class="detail-hits">
                <span>2017-11-30</span>
              </div>

              <i class="iconfont icon-caina" title="最佳答案"></i>
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
          
          <li data-id="111">
            <a name="item-1111111111"></a>
            <div class="detail-body jieda-body photos">
              <p>蓝瘦那个香菇，这是一条没被采纳的回帖</p>
            </div>
            <div class="jieda-reply">
              <span class="jieda-zan" type="zan">
                <i class="iconfont icon-zan"></i>
                <em>0</em>
              </span>
              <span type="reply">
                <i class="iconfont icon-svgmoban53"></i>
                回复
              </span>
              <div class="jieda-admin">
                <span type="edit">编辑</span>
                <span type="del">删除</span>
                <span class="jieda-accept" type="accept">采纳</span>
              </div>
            </div>
          </li>
          
          <!-- 无数据时 -->
          <!-- <li class="fly-none">消灭零回复</li> -->
        </ul>
        
        <div class="layui-form layui-form-pane">
          <form action="/jie/reply/" method="post">
            <div class="layui-form-item layui-form-text">
              <a name="comment"></a>
              <div class="layui-input-block">
                <textarea id="L_content" name="content" required lay-verify="required" placeholder="请输入内容"  class="layui-textarea fly-editor" style="height: 150px;"></textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <input type="hidden" name="jid" value="123">
              <button class="layui-btn" lay-filter="*" lay-submit>提交回复</button>
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
          这里可作为广告区域
        </div>
        <!-- 轮播图开始 -->
        <center>
		<div class="demo">
			<a class="control prev"></a><a class="control next abs"></a><!--自定义按钮，移动端可不写-->
			<div class="slider"><!--主体结构，请用此类名调用插件，此类名可自定义-->
				<ul>
					<li><a href=""><img src="images/1.jpg" alt="两弯似蹙非蹙笼烟眉，一双似喜非喜含情目。" /></a></li>
					<li><a href=""><img src="images/2.jpg" alt="态生两靥之愁，娇袭一身之病。" /></a></li>
					<li><a href=""><img src="images/3.jpg" alt="泪光点点，娇喘微微。" /></a></li>
					<li><a href=""><img src="images/4.jpg" alt="闲静似娇花照水，行动如弱柳扶风。" /></a></li>
					<li><a href=""><img src="images/5.jpg" alt="心较比干多一窍，病如西子胜三分。" /></a></li>
				</ul>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/YuxiSlider.jQuery.min.js"></script>
		<script>
		$(".slider").YuxiSlider({
			width:800, //容器宽度
			height:450, //容器高度
			control:$('.control'), //绑定控制按钮
			during:4000, //间隔4秒自动滑动
			speed:800, //移动速度0.8秒
			mousewheel:true, //是否开启鼠标滚轮控制
			direkey:true //是否开启左右箭头方向控制
		});
		</script>
		</center>
		<!-- 轮播图结束 -->
      </div>
    </div>
  </div>
</div>
@include('home.layout.footer')