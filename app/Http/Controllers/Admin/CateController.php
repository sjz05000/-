<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use DB;

class CateController extends Controller
{
    //构造方法 为了网站安全 防止地址栏直接访问后台模块
    public function __construct()
    {
        if(!session('admin')){
              echo '<script>alert("请先登录");window.location.href="/admin/login";</script>';
        }
    }
    /**
     * 前台分类
     */
    public  static function getPidCates($pid = 0)
    {
        // 查询数据
        $data = Cate::where('pid',$pid)->get();
        $temp = [];
        // 遍历
        foreach($data as $k=>$v)
        {
            $v['sub'] = self::getPidCates($v->id);
            $temp[] = $v;
        }
        return $temp;
    }
    /**
     * 获取分类类别
     */
    public static function getCate()
    {
        // 获取数据
        $cate = Cate::select('*',DB::raw("concat(path,',',id) as paths"))
                ->orderBy('paths','asc')
                ->get();
        // 遍历
        foreach ($cate as $key => $value) {
            $n = substr_count($value->path,',');
            $cate[$key]->cname=str_repeat('|----',$n).$value->cname;
        }
        return $cate;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收表单数据
        $cname = $request->input('cname','');
        $cate_count =  $request->input('cate_count',5);
        // 搜索分页
        $cate = Cate::select('*',DB::raw("concat(path,',',id) as paths"))
                ->where('cname','like','%'.$cname.'%')
                ->orderBy('paths','asc')
                ->paginate($cate_count);
        // 遍历
        foreach ($cate as $key => $value) {
            $n = substr_count($value->path,',');
            $cate[$key]->cname=str_repeat('|----',$n).$value->cname;
        }
        // 加载模板
        return view('admin.cate.index',['title'=>'浏览类别','cate'=>$cate,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模板
        return view('admin.cate.create',['title'=>'添加类别','data'=>self::getCate()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  验证表单
        $this->validate($request, [
            'cname' => 'required|unique:dy-cates',
        ],[
            'cname.required' => '类别名称必填',
            'cname.unique' => '类别名称已存在',
        ]);
        $pid = $request->input('pid','');
        // 判断是否是一级分类
        if($pid == 0){
            $path = 0;
        }else{
            $pid_path = Cate::find($pid);
            $m = substr_count($pid_path->path,',');
            if($m > 0){
                return back()->with('error','最高两级分类');
            }
            $parents_path = Cate::find($pid);
            $path = $parents_path->path.','.$parents_path->id;
        }
        // 接收并保存数据
        $cate = new Cate;
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        $cate->status = $request->input('status',1);
        $res = $cate->save();
        // 判断
        if($res){
            return redirect('/admin/cate')->withInput('request',$request->all())->with('success','添加成功');
        }else{
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
        // 查询数据
        $cate = Cate::find($id);
        // 加载模板
        return view('admin.cate.edit',['title'=>'修改类别','data'=>self::getCate(),'cate'=>$cate]);
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
          //  验证表单
        $this->validate($request, [
            'cname' => 'required',
        ],[
            'cname.required' => '类别名称必填',
        ]);
        // 判断是否有子类
        $child_cate = Cate::where('pid','=',$id)->first();
        if($child_cate){
            return back()->with('error','此类别下有子分类');
        }
        // 判断分类级别
        $pid = $request->input('pid','');
        if($pid == 0){
            $path = 0;
        }else{
             $pid_path = Cate::find($pid);
            $m = substr_count($pid_path->path,',');
            if($m > 0){
                return back()->with('error','最高两级分类');
            }
            $parents_path = Cate::find($pid);
            $path = $parents_path->path.','.$parents_path->id;
        }
        // 查询保存数据
        $cate = Cate::find($id);
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        $cate->status = $request->input('status',1);
        $res = $cate->save();
        // 判断
        if($res){
            return redirect('/admin/cate')->with('success','修改成功');
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
        // 判断有无子分类
       $child_cate = Cate::where('pid','=',$id)->first();
        if($child_cate){
            return back()->with('error','此类别下有子分类');
        }
        // 删除数据
        $res = Cate::destroy($id);
        // 判断
         if($res){
            return redirect('/admin/cate')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
