<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Userdetail;
use App\User;
use Hash;

class LoginController extends Controller
{
    /**
     * 加载登录页面
     */
   public function login()
   {
        return view('admin.login.login');
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
        if(Hash::check($password,$check->password)){
            // 保存信息到session
            session(['admin'=>true]);
            // 保存用户信息
            session(['admininfo'=>$check]);
            // 判断是否是普通用户
            if(session('admininfo')['status'] == 3){
              return redirect('/admin/login')->with('error','普通用户不能登录网站后台');
            }
            // 保存头像
            $id = session('admininfo')['id'];
            $Userdetail = Userdetail::select('photo')->where('uid',$id)->first();
            $photo = $Userdetail->photo;
            session(['photo'=>$photo]);
            // 跳转
            return redirect('/admin')->with('success','登录成功');
        }else{
            // 保存信息到session
            session(['admin'=>false]);
            return back()->withInput($request->all())->with('error','登录失败');
        }

   }
   /**
    * 用户退出
    */
   public function checkdown()
   {
        // 保存信息到session
        session(['admin'=>false]);
        // 清除用户信息
        session(['admininfo'=>'']);
        session(['photo'=>'']);
        return redirect('/admin/login')->with('error','请登录');
   }
   /**
    * 修改密码
    */
   public function passwords($id)
   {
      // 加载模板
      return view('admin.login.passwords',['title'=>'修改密码','id'=>$id]);
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
        return redirect('/admin')->with('success','密码修改成功');
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
              $id = session('admininfo')['id'];
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
