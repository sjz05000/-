<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Cate;
use DB;

class CateController extends Controller
{
    /**
     * 获取分类类别
     */
    public static function getCate()
    {
        $cate = Cate::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
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
        $cname = $request->input('cname','');
        $cate_count =  $request->input('cate_count',5);
        $cate = Cate::select('*',DB::raw("concat(path,',',id) as paths"))->where('cname','like','%'.$cname.'%')->orderBy('paths','asc')->paginate($cate_count);
        foreach ($cate as $key => $value) {
            $n = substr_count($value->path,',');
            $cate[$key]->cname=str_repeat('|----',$n).$value->cname;
        }
        return view('admin.cate.index',['title'=>'浏览类别','cate'=>$cate,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Cate::all();
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
        $pid = $request->input('pid','');
        if($pid == 0){
            $path = 0;
        }else{
            $parents_path = Cate::find($pid);
            $path = $parents_path->path.','.$parents_path->id;
        }
        $cate = new Cate;
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        $cate->status = $request->input('status',1);
        $res = $cate->save();
        if($res){
            return redirect('/admin/cate')->with('success','添加成功');
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
        $cate = Cate::find($id); 
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
        $child_cate = Cate::where('pid','=',$id)->first();
        if($child_cate){
            return back()->with('error','此类别下有子分类');
        }
        $pid = $request->input('pid','');
        if($pid == 0){
            $path = 0;
        }else{
            $parents_path = Cate::find($pid);
            $path = $parents_path->path.','.$parents_path->id;
        }
        $cate = Cate::find($id);
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        $cate->status = $request->input('status',1);
        $res = $cate->save();
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
       $child_cate = Cate::where('pid','=',$id)->first();
        if($child_cate){
            return back()->with('error','此类别下有子分类');
        }
        $res = Cate::destroy($id);
         if($res){
            return redirect('/admin/cate')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
