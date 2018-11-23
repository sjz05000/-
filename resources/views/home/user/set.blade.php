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
      <a href="http://www.dongyu.com/home/user/indexa/{{session('homeinfo')['id']}}">
        <i class="layui-icon">&#xe612;</i>
        用户中心
      </a>
    </li>
    <li class="layui-nav-item layui-this">
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
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title" id="LAY_mine">
        <li class="layui-this" lay-id="info">我的资料</li>
        <!-- <li lay-id="avatar">头像</li> -->
        <li lay-id="pass" >密码</li>
        <li lay-id="bind">帐号绑定</li>
        <li lay-id="email">激活邮箱</li>
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-form layui-form-pane layui-tab-item layui-show">
          <form class="mws-form" action="/home/user/{{session('homeinfo')['id']}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value="{{session('homeinfo')['id']}}">
            <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">邮箱</label>
              <div class="layui-input-inline">
                <input type="text" id="L_email" name="email" required lay-verify="email" autocomplete="off" value="{{session('email')}}" class="layui-input" placeholder="{{session('email')}}">
              </div>
              <div class="layui-form-mid layui-word-aux">如果您在邮箱已激活的情况下，变更了邮箱，需<a href="activate.html" style="font-size: 12px; color: #4f99cf;">重新验证邮箱</a>。</div>
            </div>
            <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">手机号</label>
              <div class="layui-input-inline">
                <input type="text" id="L_phone" name="phone" required lay-verify="required" autocomplete="off" value="{{session('phone')}}" placeholder="{{session('homeinfo')['phone']}}" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">昵称</label>
              <div class="layui-input-inline">
                <input type="text" id="L_username" name="username" required lay-verify="required" autocomplete="off" value="{{session('homeinfo')['username']}}" placeholder="{{session('homeinfo')['username']}}" class="layui-input">
              </div>
              <div class="layui-inline">
                <div class="layui-input-inline">
                  <input type="radio" name="sex" value="2"  @if( session('sex') == 2 ) checked @endif  title="男">
                  <input type="radio" name="sex" value="1" @if( session('sex') == 1 ) checked @endif  title="女">
                </div>
              </div>
            </div>
            <div class="layui-form-item">
              <label for="L_city" class="layui-form-label">城市</label>
              <div class="layui-input-inline">
                <input type="text" id="L_city" name="city" placeholder="{{session('city')}}" autocomplete="off" value="{{session('city')}}" class="layui-input">
              </div>
            </div>
           <!--  <div class="layui-form-item layui-form-text">
              <label for="L_sign" class="layui-form-label">签名</label>
              <div class="layui-input-block">
                <textarea placeholder="随便写些什么刷下存在感" id="L_sign"  name="sign" autocomplete="off" class="layui-textarea" style="height: 80px;"></textarea>
              </div>
            </div> -->
            <div class="layui-form-item">
              <!-- <label for="L_photo" class="layui-form-label">头像</label> -->
              <!-- <div class="layui-input-inline"> -->
                <img style="width: 100px; height: 100px; border-radius: 50%; border: 1px solid #ccc;" src="{{session('photo')}}">
                <!-- <input type="file" id="L_photo" name="photo" placeholder="{{session('photo')}}" autocomplete="off" value="{{session('photo')}}" class="layui-input"> -->
                <input type="file"name="photo" value="{{session('photo')}}" >
              <!-- </div> -->
            </div>
            <div class="layui-form-item">
              <a href="">
              <input type="submit" class="layui-btn" name="" value="确认修改">
              <!-- <button class="layui-btn" key="set-mine" lay-filter="*" lay-submit>确认修改</button> -->
              </a>
            </div>
          </form>
        </div>
          
        <!-- <div class="layui-form layui-form-pane layui-tab-item">
          <div class="layui-form-item">
            <div class="avatar-add" id="mws-user-info">
              <form class="mws-form" action="/home/user/{{session('homeinfo')['id']}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="id" value="{{session('homeinfo')['id']}}">
                <p>建议尺寸168*168，支持jpg、png、gif，最大不能超过50KB</p>
                {{csrf_field()}}
                <button type="button" class="layui-btn upload-img" id="test1">
                  <i class="layui-icon">&#xe67c;</i>上传头像
                </button>
                <img for="test1" id="imgimg" src="{{session('photo')}}" alt="User Photo" onerror="javascript:this.src='/d/example/profile.jpg';this.onerror = null">
                <span class="loading"></span>
                <input type="file" name="photo" value="" class="small">
                <input type="submit" name="" class="layui-btn upload-img"><i class="layui-icon">&#xe67c;</i>上传头像
                    <script src="/d/layui-v2.4.5/layui/layui.js"></script>
                    <script>
                      layui.use('upload', function(){
                        var upload = layui.upload;
                         
                        //执行实例
                        var uploadInst = upload.render({
                          elem: '#test1' //绑定元素
                          ,url: '/home/login/uploads' //上传接口
                          ,data: {'_token':$('input[name=_token]').eq(0).val()}
                          ,field: 'profile'
                          ,done: function(res){
                            //上传完毕回调
                            if(res.code==0){
                              layer.alert(res.msg);
                              $('#imgimg').eq(0).attr('src',res.data.src);
                            }else{
                              layer.alert(res.msg);
                            }
                          }
                          ,error: function(){
                            //请求异常回调
                          }
                        });
                      });
                    </script>
                
              </form>
            </div>
          </div>
        </div> -->
        
        <div class="layui-form layui-form-pane layui-tab-item">
          <form action="/home/login/update/{{$id}}" method="post">
            <div class="layui-form-item">
              <label for="L_nowpass" class="layui-form-label">当前密码</label>
              <div class="layui-input-inline">
                <input type="password" id="L_nowpass" name="nowpass" required lay-verify="required" autocomplete="off" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">新密码</label>
              <div class="layui-input-inline">
                <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">6到16个字符</div>
            </div>
            <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">确认密码</label>
              <div class="layui-input-inline">
                <input type="password" id="L_repass" name="repassword" required lay-verify="required" autocomplete="off" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <a href="" class="layui-btn">确认修改</a>
              <!-- <button  key="set-mine" lay-filter="*" lay-submit></button> -->
            </div>
          </form>
        </div>
        
        <div class="layui-form layui-form-pane layui-tab-item">
          <ul class="app-bind">
            <li class="fly-msg app-havebind">
              <i class="iconfont icon-qq"></i>
              <span>已成功绑定，您可以使用QQ帐号直接登录Fly社区，当然，您也可以</span>
              <a href="javascript:;" class="acc-unbind" type="qq_id">解除绑定</a>
              
              <!-- <a href="" onclick="layer.msg('正在绑定微博QQ', {icon:16, shade: 0.1, time:0})" class="acc-bind" type="qq_id">立即绑定</a>
              <span>，即可使用QQ帐号登录Fly社区</span> -->
            </li>
            <li class="fly-msg">
              <i class="iconfont icon-weibo"></i>
              <!-- <span>已成功绑定，您可以使用微博直接登录Fly社区，当然，您也可以</span>
              <a href="javascript:;" class="acc-unbind" type="weibo_id">解除绑定</a> -->
              
              <a href="" class="acc-weibo" type="weibo_id"  onclick="layer.msg('正在绑定微博', {icon:16, shade: 0.1, time:0})" >立即绑定</a>
              <span>，即可使用微博帐号登录Fly社区</span>
            </li>
          </ul>
        </div>

        <div class="layui-form layui-form-pane layui-tab-item">
          <div class="layui-form-item">
            <ul class="layui-form">
              <li class="layui-form-li">
                <label for="activate">您的邮箱：</label>
                <span class="layui-form-text">xx@xx.com
                  <!-- <em style="color:#999;">（已成功激活）</em> -->
                  <em style="color:#c00;">（尚未激活）</em>
                </span>
              </li>
              <li class="layui-form-li" style="margin-top: 20px; line-height: 26px;">
                <div>
                  1. 如果您未收到邮件，或激活链接失效，您可以
                  <a class="layui-form-a" style="color:#4f99cf;" id="LAY-activate" href="javascript:;" email="{user.email}}">{user.email}}重新发送邮件</a>，或者
                  <a class="layui-form-a" style="color:#4f99cf;" href="set.html">更换邮箱</a>；
                </div>
                <div>
                  2. 如果您始终没有收到 Fly 发送的邮件，请注意查看您邮箱中的垃圾邮件；
                </div>
                <div>
                  3. 如果你实在无法激活邮件，您还可以联系：admin@xx.com
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
      

      

    </div>
  </div>
</div>

@include('home.layout.footer')
@endif