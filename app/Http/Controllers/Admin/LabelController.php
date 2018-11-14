<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Label;
use App\Http\Requests\LabelStoreRequest;
use Hash;
use DB;

class LabelController extends Controller
{
    //构造方法 为了网站安全 防止地址栏直接访问后台模块
    public function __construct()
    {
        if(!session('admin')){
              echo '<script>alert("请先登录");window.location.href="/admin/login";</script>';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // echo "LabelControllerjyjyjyjyjyjyjyjyjyjyjjy==";
        
        // 设置搜索分页
        // dump($request->all());
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        $label = Label::where('labelname','like','%'.$search.'%')->paginate($showCount);

        // $user = User::all();
        // $user = User::paginate(5);
        // 加载列表页面
        return view('admin.label.index',['title'=>'标签列表','label'=>$label,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加模板
        return view('admin.label.create',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabelStoreRequest $request)
    {
                // 开启事务 作为回滚点
        DB::beginTransaction();

        // 验证表单在UsersStoreRequest中
        // 获取数据 进行添加
        $label = new Label;
        $label->labelname=$request->input('labelname');
        $label->labelcolor=$request->input('labelcolor');
        $label->articlecount = $request->input('articlecount');
        $label->articlenumber = $request->input('articlenumber');
        $res1 = $label->save();//bool
        // $id = $user->id;//获取最后插入的id号
        // $userdetail = new Userdetail;
        // $userdetail->uid = $id;
        // $userdetail->email = $request->input('email');
        // $res2 = $userdetail->save();
        // && $res2

        // 逻辑判断
        if ($res1) {
            // 提交事务
            DB::commit();
            return redirect('admin/label')->with('success','添加成功');
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
        // echo $id;
        $label = Label::find($id);
        // dump($user);
        // 加载添加模板
        return view('admin.label.edit',['label'=>$label,'title'=>'用户修改']);
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
            'labelname' => 'required',   
            'labelcolor' => 'required|regex:/^#{1}[\w]{6}$/',
            'articlenumber' => 'regex:/^(.*?),{1}$/',

        ],[
            'label.required' => '标签名必填',
            'labelcolor.required' => '标签显示背景色必填',
            'labelcolor.regex' => '颜色格式错误',
            'articlenumber.regex' => '文章编号格式错误',
        ]);


        // 获取数据 进行添加
        $label = Label::find($id);
        $label->labelname=$request->input('labelname');
        $label->labelcolor=$request->input('labelcolor');
        $label->articlecount = $request->input('articlecount');
        $label->articlenumber = $request->input('articlenumber');
        $res1 = $label->save();//bool

        // $some = $request->all();
        // dump($some);
        // die;
        
        // 逻辑判断
        if ($res1) {
            // 提交事务
            DB::commit();
            return redirect('admin/label')->with('success','修改成功');
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

        $res1 = Label::destroy($id);
        // $res2 = Userdetail::where('uid',$id)->delete();     && $res2

        // 逻辑判断
        if ($res1) {
            // 提交事务
            DB::commit();
            return redirect('admin/label')->with('success','添加成功');
        } else {
            // 回滚
            DB::rollBack;
            return back()->with('success','添加失败');
        }
    }
}
