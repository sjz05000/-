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
        $check_password = User::select()->where('username',$username)->first();
        if(Hash::check($password,$check_password->password)) {
            // 保存信息到session
            session(['admin'=>true]);
            // 保存用户信息
            session(['admininfo'=>$check_password]);
            // 保存头像
            $id = session('admininfo')['id'];
            $Userdetail = Userdetail::find($id);
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
}
