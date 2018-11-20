<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use App\Model\Userdetail;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function  getUser()
    {
        return User::all(); 
        // return User::paginate(20);      
        // 加载列表页面
        // return view('home.index.index',['user'=>$user]);
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
        // echo $id;
        // $user = User::find($id);
        // dump($user);
        // 加载添加模板
        // return view('admin.users.edit',['user'=>$user,'title'=>'用户修改']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $some = $request->all();
        // dump($some);
        // die;

        // 开启事务 作为回滚点
        DB::beginTransaction();
        // 验证表单在UsersStoreRequest中
        $this->validate($request, [
            'username' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
            'email' => 'email',
        ],[
            'username.required' => '用户名必填',
            'username.regex' => '用户名格式错误',
            'phone.required' => '手机号必填',
            'phone.regex' => '手机号格式错误',
            'email.email' => '邮箱格式错误',
        ]);

        if($request->hasFile('photo')){ 
            $profile = $request->file('photo');
            $ext = $profile->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res2 = $profile->move($dir_name,$file_name);
        }
        $id = $request->input('id');
        // 获取数据 进行添加
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->status = $request->input('status','');
        $res1 = $user->save();//bool

        $id = $user->id;//获取最后插入的id号

        $userdetail = Userdetail::where('uid',$id)->first();
        $userdetail->uid = $id;
        $userdetail->phone = $request->input('phone');
        $userdetail->email = $request->input('email');
        $userdetail->qq = $request->input('qq');
        $userdetail->city = $request->input('city');
        $userdetail->birthday = $request->input('birthday');
        $userdetail->sex = $request->input('sex');
        // 拼接数据库存放路径
        if($request->hasFile('photo')){
            $userdetail->photo = ltrim($dir_name.'/'.$file_name,'.');
        }
        $res2 = $userdetail->save();
        
        // 逻辑判断
        if ($res1 && $res2) {
            // 提交事务
            DB::commit();
            return redirect('/home')->with('success','修改成功');
        } else {
            // 回滚
            DB::rollBack;
            return back()->with('error','修改失败');
        }
        
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
