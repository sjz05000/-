<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Banner;

class bannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取数据
        $data = Banner::all();
        // 加载页面
        return view('admin/banner/index',['data'=>$data,'title'=>'轮播列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载页面
        return view('admin/banner/create',['title'=>'添加轮播图']);
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
            'burl' => 'required|unique:dy-banner',
            'bpic'  => 'required|image'
        ],[
            'burl.required' => '链接地址必填',
            'burl.unique' => '链接地址已存在',
            'bpic.required' => '图片必填',
            'bpic.image' => '图片格式错误'
        ]);
        // 创建文件上传对象
        $profile = $request -> file('bpic');
        $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
        $file_name = str_random('20').'.'.$ext;         //重命名
        $dir_name = './uploads/'.date('Ymd',time());    //存储目录
        $res = $profile->move($dir_name,$file_name);    //移动文件到指定目录
        // 提交到数据库
        $banner = new Banner;
        $banner->burl = $request->input('burl'); 
        // 拼接数据库存放路径
        $banner->bpic = ltrim($dir_name.'/'.$file_name,'.');
        $res = $banner->save();
        if($res){
            return redirect('admin/banner')->with('success', '添加成功!');
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
        //
        echo '11';
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
