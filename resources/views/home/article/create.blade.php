@include('home.layout.header')
<div class="layui-container fly-marginTop">
  <div class="fly-panel" pad20 style="padding-top: 5px;">
    <!--<div class="fly-none">没有权限</div>-->
    <div class="layui-form layui-form-pane">
      <div class="layui-tab layui-tab-brief" lay-filter="user">
        <ul class="layui-tab-title">
          <li class="layui-this">发表新帖<!-- 编辑帖子 --></li>
        </ul>
        <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
          <div class="layui-tab-item layui-show">
            <form action="/home/article/store" method="post">
            	{{csrf_field()}}
              <div class="layui-row layui-col-space15 layui-form-item">
                
                <div class="layui-col-md9">
                  <label for="L_title" class="layui-form-label">标题</label>
                  <div class="layui-input-block">
                    <input type="text" id="L_title" name="title" required lay-verify="required" autocomplete="off" class="layui-input">
                  </div>
                </div>
              </div>
               <!-- 加载编辑器的容器 -->
			    <script id="container" name="content" type="text/plain" style="width:840px;height:350px;">
			    </script>
              <div class="layui-form-item">
              	<input type="submit"  class="layui-btn"  value="立即发布">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 配置文件 -->
<script type="text/javascript" src="/d/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/d/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
	 var ue = UE.getEditor('container',{
	    toolbars: [
	    ['fullscreen', 'source', 'undo', 'redo'],
	    ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
		],
	    autoHeightEnabled: true,
	    autoFloatEnabled: true
	});
</script>
<script type="text/javascript">
	
        ue.ready(function(){
        	// 发送ajax
		      $('input[type=submit]').click(function(){
		        $.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
		         }); 
       		var title = $('#L_title').val();
        	var content = ue.getPlainTxt();
	        $.ajax({
	        url: "/home/article/store",
	        type: 'post',
	        data:{'title':title,'content':content},
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
   
        });
	    
</script>
@include('home.layout.footer')