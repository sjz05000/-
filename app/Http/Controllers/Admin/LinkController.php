<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Link;

class LinkController extends Controller
{

    //构造方法 为了网站安全 防止地址栏直接访问后台模块
    public  function __construct()
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
    public function index()
    {
        
        // 获取数据
        $data = Link::paginate(6);
        // 加载页面
        return view('admin/link/index',['data'=>$data,'title'=>'链接列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载页面
        return view('admin/link/create',['title'=>'添加链接']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证表单
        $this->validate($request, [
            'yqname' => 'required|unique:dy-link',
            'yqlink' => 'required|unique:dy-link',
            'yqpic'  => 'required|image'
        ],[
            'yqname.required' => '链接名称必填',
            'yqname.unique' => '链接名称已存在',
            'yqlink.required' => '链接地址必填',
            'yqlink.unique' => '链接地址已存在',
            'yqpic.required' => '图片必填',
            'yqpic.image' => '图片格式错误'
        ]);
        // 创建文件上传对象
        $profile = $request->file('yqpic');
        $ext = $profile->getClientOriginalExtension(); //获取文件后缀
        $file_name = str_random('20').'.'.$ext;         //重命名
        $dir_name = './uploads/'.date('Ymd',time());    //存储目录
        $res = $profile->move($dir_name,$file_name);    //移动文件到指定目录
        // 提交到数据库
        $link = new Link;
        $link->yqname = $request->input('yqname');
        $link->yqlink = $request->input('yqlink'); 
        // 拼接数据库存放路径
        $link->yqpic = ltrim($dir_name.'/'.$file_name,'.');
        $res = $link->save();
        if($res){
            return redirect('admin/link')->with('success', '添加成功!');
        }else{
            return back()->with('error', '添加失败!');
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
        // 通过主键取回一个数据
        $data = Link::find($id);
        //加载页面
        return view('admin/link/edit',['data'=>$data,'title'=>'修改链接']);
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
        //验证表单
        $this->validate($request, [
            // 'yqname' => 'required|unique:dy-link',
            // 'yqlink' => 'required|unique:dy-link',
            'yqname' => 'required',
            'yqlink' => 'required',
            'yqpic'  => 'image'
        ],[
            'yqname.required' => '链接名称必填',
            // 'yqname.unique' => '链接名称已存在',
            'yqlink.required' => '链接地址必填',
            // 'yqlink.unique' => '链接地址已存在',
            // 'yqpic.required' => '图片必填',
            'yqpic.image' => '图片格式错误'
        ]);
        // 创建文件上传对象
        if($request->hasFile('yqpic')){ 
            $profile = $request->file('yqpic');
            $ext = $profile->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile->move($dir_name,$file_name);
        }
       
        // 提交到数据库
        $link = Link::find($id);
        $link->yqname = $request->input('yqname');
        $link->yqlink = $request->input('yqlink'); 
        // 拼接数据库存放路径
        if($request->hasFile('yqpic')){
            $link->yqpic = ltrim($dir_name.'/'.$file_name,'.');
        }
        
        $res = $link->save();
        if($res){
            return redirect('admin/link')->with('success', '修改成功!');
        }else{
            return back()->with('error', '修改失败!');
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
        
        $data = Link::find($id);
        $res = $data->delete();
         if($res){
            return redirect('admin/link')->with('success', '删除成功!');
        }else{
            return back()->with('error', '删除失败!');
        }
    }
}
