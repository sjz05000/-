<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Userdetail;
use App\User;
use Hash;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class LoginController extends Controller
{
     /**
     * Display a listing of the resource.验证码
     *
     * @return Response
     */
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
 
        //把内容存入session
        Session::flash('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    /**
     * 加载登录页面
     */
    public function login()
    {
        return view('home.user.login');
    }
    /**
    * 验证信息
    */
    public function checkup(Request $request)
    {
        // 接收表单数据
        $username = $request->input('username','');
        $password = $request->input('password','');
        // 验证数据库
        $check = User::select()->where('username',$username)->first();
        // 判断状态
        if($check->status==4){
          return view('home.user.status');
        }
        if(Hash::check($password,$check->password)){
            // 保存信息到session
            session(['home'=>true]);
            // 保存用户信息
            session(['homeinfo'=>$check]);
            $status = session('homeinfo')['status'];
            // 查找id
            $id = session('homeinfo')['id'];
            // 保存详情信息
            // $Userdetail = Userdetail::select('photo','email','qq','phone','sex','birthday','city','fas','following','integral')->where('uid',$id)->first();
            $Userdetail = Userdetail::where('uid',$id)->first();
            // dump($Userdetail);die;

            $photo = $Userdetail->photo;
            $email = $Userdetail->email;
            $qq = $Userdetail->qq;
            $phone = $Userdetail->phone;
            $sex = $Userdetail->sex;
            $birthday = $Userdetail->birthday;
            $city = $Userdetail->city;
            $fas = $Userdetail->fas;
            $fasn = substr_count($Userdetail->fas,',');//判断粉丝数量
            if ($fasn<0){
              $fasn = 0;
            }
            $following = $Userdetail->following;
            $followingn = substr_count($Userdetail->following,',');//判断关注数量
            if ($followingn<0){
              $followingn = 0;
            }
            $integral = $Userdetail->integral;
            $created_at = $Userdetail->created_at;
            $updated_at = $Userdetail->updated_at;
            $deleted_at = $Userdetail->deleted_at;

            session(['photo'=>$photo,'email'=>$email,'qq'=>$qq,'phone'=>$phone,'sex'=>$sex,'birthday'=>$birthday,'city'=>$city,'fas'=>$fas,'fasn'=>$fasn,'following'=>$following,'followingn'=>$followingn,'integral'=>$integral,'created_at'=>$created_at,'updated_at'=>$updated_at,'deleted_at'=>$deleted_at]);
            
            // 跳转
            return redirect('/home')->with('success','登录成功');
        }else{
            // 保存信息到session
            session(['home'=>false]);
            return back()->withInput($request->all())->with('error','登录失败');
        }

    }
    /**
    * 用户退出
    */
    public function checkdown()
    {
        // 保存信息到session
        session(['home'=>false]);
        // 清除用户信息
        session(['homeinfo'=>'']);
        session(['photo'=>'']);
        return redirect('/home')->with('error','请登录');
    }
    /**
    * 修改密码
    */
    public function passwords($id)
    {
      // 加载模板
      return view('home.user.set',['title'=>'修改密码','id'=>$id]);
    }
    /**
    * 保存密码
    */
    public function update(Request $request,$id)
    {
      //  验证表单
      $this->validate($request, [
          'password' => 'required',
          'repassword' => 'required|same:password',
      ],[
          'password.required' => '密码必填',
          'repassword.required' => '确认密码必填',
          'repassword.same' => '两次密码不一致'
      ]);
     // 保存修改信息
      $password = Hash::make($request->input('password',''));
      $user = User::find($id);
      $user->password = $password;
      $res = $user->save();
      if($res){
        return redirect('/home')->with('success','密码修改成功');
      }else{
        return back()->with('error','密码修改失败');
      }
    }
    /**
    * 修改头像
    */
    public function uploads(Request $request)
    {
     // 判断有无文件上传
      if($request->hasFile('profile')){
              $profile = $request->file('profile');
              $profile_path = './d/uploads/'.date('Ymd',time());
              $profile_name =str_random(20).'.'.$profile->getClientOriginalExtension();
              $res = $profile->move($profile_path,$profile_name);
              $profile_addr = ltrim($profile_path.'/'.$profile_name,'.');
              // 保存到数据库
              $id = session('homeinfo')['id'];
              $Userdetail = Userdetail::select()->where('uid',$id)->first();
              $Userdetail->photo = $profile_addr;
              session(['photo'=>$profile_addr]);
              $res = $Userdetail->save();
              if($res){
                $str = [
                  'code'=>0,
                  'msg'=>'上传头像成功',
                  'data'=>[
                  'src'=>$Userdetail->photo
                  ]
                ];
              }else{
              $str = [
                  'code'=>1,
                  'msg'=>'上传头像失败',
                  'data'=>[
                  'src'=>$Userdetail->photo
                  ]
                ];
              }
      }
      return response()->json($str);
    }


}
