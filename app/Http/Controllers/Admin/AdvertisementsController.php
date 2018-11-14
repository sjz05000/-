<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Advertisements;


class AdvertisementsController extends Controller
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
        // 搜索分页
        $show_page = $request->input('show_page',5);
        $adname = $request->input('adname','');
        // 查询数据
        $data = Advertisements::select()
                ->where('adname','like',"%{$adname}%")
                ->paginate($show_page);
        // 加载模板
        return view('admin.advertisements.index',['title'=>'浏览广告','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模板
        return view('admin.advertisements.create',['title'=>'广告添加']);
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
            'adname' => 'required|unique:dy-advertisements',
            'adphone'  => 'required|regex:/1[3-8]{1}[0-9]{9}/',
            'url' => 'required'
        ],[
            'adname.required' => '广告名称必填',
            'adname.unique' => '广告名称已存在',
            'adphone.required' => '手机号必填',
            'adphone.regex'=>'手机号格式错误',
            'url.required' => 'URL不能为空',
        ]);
        // 判断有无文件上传
        if($request->hasFile('adfile')){
            // 保存文件
            $adfile = $request->file('adfile');
            $adfile_path = './d/uploads/'.date('Ymd',time());
            $adfile_name =str_random(20).'.'.$adfile->getClientOriginalExtension();
            $res = $adfile->move($adfile_path,$adfile_name);
            $adfile_addr = ltrim($adfile_path.'/'.$adfile_name,'.');
            // 接收数据保存
            $advertisements = new Advertisements;
            $advertisements->adname = $request->input('adname','');
            $advertisements->adphone = $request->input('adphone','');
            $advertisements->adfile = $adfile_addr;
            $advertisements->status = $request->input('status','');
            $advertisements->url = $request->input('url');
            $res = $advertisements->save();
            // 判断
            if($res){
                return redirect('/admin/advertisements')->withInput($request->all())->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->with('error','请选择图片');
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
        // 查询数据
        $data = Advertisements::find($id);
        // 加载模板
        return view('admin.advertisements.edit',['title'=>'修改广告','data'=>$data]);
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
            'adname' => 'required',
            'adphone'  => 'required|regex:/1[3-8]{1}[0-9]{9}/',
            'url' => 'required'
        ],[
            'adname.required' => '广告名称必填',
            'adphone.required' => '手机号必填',
            'adphone.regex'=>'手机号格式错误',
            'url.url' => 'URL格式错误',
        ]);
        // 判断有无文件上传
        if($request->hasFile('adfile')){
                $adfile = $request->file('adfile');
                $adfile_path = './d/uploads/'.date('Ymd',time());
                $adfile_name =str_random(20).'.'.$adfile->getClientOriginalExtension();
                $res = $adfile->move($adfile_path,$adfile_name);
                $adfile_addr = ltrim($adfile_path.'/'.$adfile_name,'.');
        }
        // 接收数据保存
        $advertisements = Advertisements::find($id);
        $advertisements->adname = $request->input('adname');
        $advertisements->adphone = $request->input('adphone');
        if($request->hasFile('adfile')){
            $advertisements->adfile = $adfile_addr;
        }
        $advertisements->status = $request->input('status');
        $advertisements->url = $request->input('url');
        $res = $advertisements->save();
        // 判断
        if($res){
            return redirect('/admin/advertisements')->with('success','修改成功');
        }else{
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
        // 查询数据
        $res = Advertisements::destroy($id);
        // 判断
        if($res){
            return redirect('/admin/advertisements')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
