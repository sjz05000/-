<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Navigation;
use DB;

class NavigationController extends Controller
{
    /**
     * 获取分类类别
     */
    public static function getNavigation()
    {
        $Navigation = Navigation::select('*',DB::raw("concat(path,',',pid) as paths"))->orderBy('paths','asc')->get();
            foreach($Navigation as $k=>$v){
                $m = substr_count($v->path,',');
                $Navigation[$k]->navname = str_repeat('|----',$m).$v->navname;
            }
        return $Navigation;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $show_page = $request->input('show_page',5);
        $status = $request->input('status','');
        $data = Navigation::select('*',DB::raw("concat(path,',',pid) as paths"))->where('status','like','%'.$status.'%')->orderBy('paths','asc')->paginate($show_page);
            foreach($data as $k=>$v){
                $n = substr_count($v->path,',');
                $data[$k]->navname = str_repeat('|----',$n).$v->navname;
            }
        return view('admin.navigation.index',['title'=>'浏览导航','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Navigation::all();
        return view('admin.navigation.create',['title'=>'添加导航','data'=>self::getNavigation()]);
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
            'navname' => 'required|unique:dy-navigation',
            'url' => 'required|url',
        ],[
            'navname.required' => '导航名称必填',
            'navname.unique' => '导航名称已存在',
            'url.required' => 'URL不能为空',
            'url.url' => 'URL格式错误',
        ]);
        $navigation = new Navigation;
        if($request->input('pid')==0){
            $navigation->path = 0;
        }else{
             $pid = Navigation::find($request->input('pid',''));
             $path_count = substr_count($pid->path,',');
             if($path_count>0){
                return back()->with('error','导航最高二级');
             }
           $parent_path = Navigation::find($request->input('pid'));
            $navigation->path = $parent_path->path.','.$parent_path->id;
        }
        $navigation->navname = $request->input('navname','');
        $navigation->pid = $request->input('pid','');
        $navigation->status = $request->input('status','');
        $navigation->url = $request->input('url','');
        $res = $navigation->save();
        if($res){
            return redirect('/admin/navigation')->withInput($request->all())->with('success','添加成功');
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
        $data = Navigation::all();
        $navigation = Navigation::find($id);
        return view('admin.navigation.edit',['title'=>'修改导航','data'=>self::getNavigation(),'navigation'=>$navigation]);
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
            'navname' => 'required',
            'url' => 'required|url',
        ],[
            'navname.required' => '导航名称必填',
            'url.required' => 'URL不能为空',
            'url.url' => 'URL格式错误',
        ]);
        $child = Navigation::where('pid','=',$id)->first();
        if($child){
            return back()->with('error','该类别下有子分类');
        }
        $navigation = Navigation::find($id);
        if($request->input('pid')==0){
            $navigation->path = 0;
        }else{
            $pid = Navigation::find($request->input('pid',''));
             $path_count = substr_count($pid->path,',');
             if($path_count>0){
                return back()->with('error','导航最高二级');
             }
           $parent_path = Navigation::find($request->input('pid'));
            $navigation->path = $parent_path->path.','.$parent_path->id;
        }
        $navigation->navname = $request->input('navname','');
        $navigation->pid = $request->input('pid','');
        $navigation->status = $request->input('status','');
        $navigation->url = $request->input('url','');
        $res = $navigation->save();
         if($res){
            return redirect('/admin/navigation')->with('success','修改成功');
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
        $child = Navigation::where('pid','=',$id)->first();
        if($child){
            return back()->with('error','该类别下有子分类');
        }
        $res = Navigation::destroy($id);
          if($res){
            return redirect('/admin/navigation')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
