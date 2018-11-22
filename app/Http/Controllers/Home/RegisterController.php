<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Userdetail;
use Mail;
use DB;
use Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.user.reg');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // 开启事务 作为回滚点
        DB::beginTransaction();
        // 接收表单数据
        $user = new User;
        $user->username = $request->input('username','');
        $user->password = Hash::make($request->input('password',''));
        $token = str_random(60);
        $user->token = $token;
        $res1 = $user->save();
        $id = $user->id;//获取最后插入的id号
        $userdetail = new Userdetail;
        $userdetail->uid = $id;
        $userdetail->email = $request->input('email','');
        $res2 = $userdetail->save();
        // 逻辑判断
        if ($res1 && $res2) {
            // 提交事务
            DB::commit();
            //  查询数据
            $user = User::findOrFail($id);
            $username = User::find($id)->username;
            $email = User::find($id)->userinfo->email;
            // 发送邮件
            Mail::send('home.email.reminder', ['id'=>$id,'email'=>$email,'token'=>$token], function ($m) use ($email) {
                $m->to($email)->subject('[冬雨论坛]');
            });
            return view('home.user.success');
        } else {
            // 回滚
            DB::rollBack();
            return view('home.user.error');
        }
    }

    /**
     * 激活
     */
    public function up($id,$token)
    {
        // 修改数据
        $user = User::find($id);
        // 判断用户状态
        if($user->status==5){
            return  view('home.email.up');
        }
        $user->status = 5;
        // 判断是否是正确的方式访问
        if($user->token != $token){
           return  view('home.email.token');
        }
        // 给token重新赋值 保证安全
        $token = str_random(60);
        $user->token = $token;
        $res = $user->save();
        // 判断
        if($res){
            return view('home.email.save');
        }else{
            return view('home.email.back');
        }
    }
      /**
     * 判断用户名是否已存在
     */
     public function checkusername(Request $request)
     {
        // 获取数据
        $username = $request->query('username', '');
        // 表单验证
        $res = User::select()->where('username',$username)->first();
        if($res){
            echo 0;
        }else{
            echo 1;
        }
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
