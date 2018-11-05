<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\User;
use Hash;
use App\Models\Userdetail;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 设置搜索分页
        // dump($request->all());
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        $user = User::where('username','like','%'.$search.'%')->paginate($showCount);

        // $user = User::all();
        // $user = User::paginate(5);
        // 加载列表页面
        return view('admin.users.index',['title'=>'用户列表','user'=>$user,'request'=>$request->all()]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加模板
        return view('admin.users.create',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        // 开启事务 作为回滚点
        DB::beginTransaction();

        // 验证表单在UsersStoreRequest中
        // 获取数据 进行添加
        $user = new User;
        $user->username=$request->input('username');
        $user->password=Hash::make($request->input('password'));
        $res1 = $user->save();//bool
        $id = $user->id;//获取最后插入的id号
        $userdetail = new Userdetail;
        $userdetail->uid = $id;
        $userdetail->phone = $request->input('phone');
        $userdetail->email = $request->input('email');
        $res2 = $userdetail->save();
        // 逻辑判断
        if ($res1 && $res2) {
            // 提交事务
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
        } else {
            // 回滚
            DB::rollBack;
            return back()->with('success','添加失败');
        }

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
        // echo $id;
        $user = User::find($id);
        // dump($user);
        // 加载添加模板
        return view('admin.users.edit',['user'=>$user,'title'=>'用户修改']);

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
        // 开启事务 作为回滚点
        DB::beginTransaction();
        // 验证表单在UsersStoreRequest中
        $this->validate($request, [
            'username' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
            'email' => 'required|email',
        ],[
            'username.required' => '用户名必填',
            'username.regex' => '用户名格式错误',
            'phone.required' => '手机号必填',
            'phone.regex' => '手机号格式错误',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式错误',
        ]);


        // 获取数据 进行添加
        $user = User::find($id);
        // $user->username=$request->input('username');
        // $user->password=$request->input('password');
        $res1 = $user->save();//bool

        $id = $user->id;//获取最后插入的id号

        $userdetail = Userdetail::where('id',$id)->first();
        $userdetail->uid = $id;
        $userdetail->phone = $request->input('phone');
        $userdetail->email = $request->input('email');
        $res2 = $userdetail->save();

        // $some = $request->all();
        // dump($some);
        
        // 逻辑判断
        if ($res1 && $res2) {
            // 提交事务
            DB::commit();
            return redirect('admin/users')->with('success','修改成功');
        } else {
            // 回滚
            DB::rollBack;
            return back()->with('success','修改失败');
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
        // 开启事务 作为回滚点
        DB::beginTransaction();

        $res1 = User::destroy($id);
        $res2 = Userdetail::where('uid',$id)->delete();

        // 逻辑判断
        if ($res1 && $res2) {
            // 提交事务
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
        } else {
            // 回滚
            DB::rollBack;
            return back()->with('success','添加失败');
        }
    }
}
