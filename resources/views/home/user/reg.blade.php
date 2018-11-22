@if(session('config')['status']==2)
@include('home.layout.back')
@else
@include('home.layout.header')

<div class="layui-container fly-marginTop">
  <div class="fly-panel fly-panel-user" pad20>
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title">
        <li><a href="/home/user/login">登入</a></li>
        <li class="layui-this">注册</li>
      </ul>
      <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <div class="layui-form layui-form-pane">
            <form method="post" enctype="multipart/form-data" action="/home/user/reg/update" >
              {{csrf_field()}}
            <input type=hidden name=enews value=register>
              <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">邮箱</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_email" name="email" required lay-verify="email" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">昵称</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_username" name="username" placeholder="将会成为您唯一的登入名" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" placeholder="6到16个字符" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_repass" name="repassword" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <button class="layui-btn" lay-filter="formDemo" lay-submit>立即注册</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">
     // 验证两次密码是否相同
    var password = $('input[name=password]').val();
    var repassword = $('input[name=repassword]').val();
   
    $('#L_username').blur(function(){
    var username = $('input[name=username]').val();
    // 发送ajax验证数据库是否用户名已存在
    $.ajax({
      url: "/home/reg/checkusername",
      type: 'get',
      data:{'username':username},
      success: function(data){
        if(data==0){
            layer.msg('用户名已存在', function(){
             $('form').submit(function(){
               return false;
              });
            });
        }
      },
      dataType: 'html',
      async:false,
      });
    });
    $('form').submit(function(){
      if(password != repassword){
        layer.msg('您两次密码不一致', {icon: 5});
        return false;
      }
    });
 
</script>
@include('home.layout.footer')
@endif