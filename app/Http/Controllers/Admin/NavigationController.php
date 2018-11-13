<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Navigation;
use DB;

class NavigationController extends Controller
{
    /**
     * 获取导航数据
     */
    public static function getNavigations($id=0)
    {
        // 查询导航
        $navigations = Navigation::where('pid',$id)->get();
        $temp = [];
        // 遍历数据
        foreach ($navigations as $key => $value) {
            $value['sub'] = self::getNavigations($value->id);
            $temp[] = $value;
        }
        return $temp;
    }
    /**
     * 获取导航类别
     */
    public static function getNavigation()
    {
        // 查询数据 排序
        $Navigation = Navigation::select('*',DB::raw("concat(path,',',id) as paths"))
                      ->orderBy('paths','asc')
                      ->get();
            // 遍历
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
        // 分页查询
        $show_page = $request->input('show_page',5);
        $status = $request->input('status','');
        $data = Navigation::select('*',DB::raw("concat(path,',',id) as paths"))->where('status','like','%'.$status.'%')->orderBy('paths','asc')->paginate($show_page);
            // 遍历
            foreach($data as $k=>$v){
                $n = substr_count($v->path,',');
                $data[$k]->navname = str_repeat('|----',$n).$v->navname;
            }
        // 加载模板
        return view('admin.navigation.index',['title'=>'浏览导航','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 查询数据
        $data = Navigation::all();
        // 返回模板
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
            'url' => 'required',
        ],[
            'navname.required' => '导航名称必填',
            'navname.unique' => '导航名称已存在',
            'url.required' => 'URL不能为空',
        ]);
        // 接收表单数据保存到数据库
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
        // 判断
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
        // 查询数据
        $data = Navigation::all();
        $navigation = Navigation::find($id);
        // 返回模板
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
        // 查询 判断是否有子类
        $child = Navigation::where('pid','=',$id)->first();
        if($child){
            return back()->with('error','该类别下有子分类');
        }
        // 查找修改保存数据
        $navigation = Navigation::find($id);
        if($request->input('pid')==0){
            $navigation->path = 0;
        }else{
            $pid = Navigation::find($request->input('pid',''));
             $path_count = substr_count($pid->path,',');
             // 最高二级导航
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
        // 判断
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
        // 查询数据 
        $child = Navigation::where('pid','=',$id)->first();
        // 判断是否有子类
        if($child){
            return back()->with('error','该类别下有子分类');
        }
        // 查找数据删除
        $res = Navigation::destroy($id);
        // 判断
          if($res){
            return redirect('/admin/navigation')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
