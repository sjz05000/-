<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
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
        // 创建文件上传对象
        $profile = $request -> file('photo');
        $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
        $file_name = str_random('20').'.'.$ext;         //重命名
        $dir_name = './uploads/'.date('Ymd',time());    //存储目录
        $res2 = $profile->move($dir_name,$file_name);    //移动文件到指定目录
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
        $userdetail->qq = $request->input('qq');
        $userdetail->city = $request->input('city');
        $userdetail->birthday = $request->input('birthday');
        $userdetail->sex = $request->input('sex');
        $userdetail->photo = $request->input('photo');// 提交到数据库
        // 拼接数据库存放路径
        $userdetail->photo = ltrim($dir_name.'/'.$file_name,'.');
        $res2 = $userdetail->save();
        // 逻辑判断
        if ($res1 && $res2) {
            // 提交事务
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
        } else {
            // 回滚
            DB::rollBack;
            return back()->with('error','添加失败');
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
        $userdetail->qq = $request->input('qq');
        $userdetail->city = $request->input('city');
        $userdetail->birthday = $request->input('birthday');
        $userdetail->sex = $request->input('sex');
        // 拼接数据库存放路径
        if($request->hasFile('photo')){
            $userdetail->photo = ltrim($dir_name.'/'.$file_name,'.');
            // $userdetail->photo = $request->input('photo');
        }
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
            return back()->with('error','添加失败');
        }
    }
}
