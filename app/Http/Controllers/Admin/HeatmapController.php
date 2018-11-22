<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Heatmap;
use App\Model\Article;
use DB;

class HeatmapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取数据
        $data = Heatmap::all();
        // 加载页面
        return view('admin.heatmap.index',['title'=>'热点列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Heatmap::count() >= 6)
        {
            return back()->with('error','热点图片不能超过6个');
        }
        // 加载页面
        return view('admin.heatmap.create',['title'=>'添加热点图片']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // 开启事务 作为回滚点
        DB::beginTransaction();
        // 验证表单
        $this->validate($request, [
        'title' => 'required',
        'content' => 'required',
        'hpic' => 'image',
        'path' =>'required',
        'auth' => 'required'
        ],[
            'title.required' => '标题必填',
            'content.required' => '文章内容必填',
            'hpic.image' => '图片格式不对',
            'path.required' => '来源必填',
            'auth.required' => '作者必填',
        ]);
        // 往热图表放数据 创建文件上传对象
            $profile = $request->file('hpic');
            $ext = $profile->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;        //设置文件名字
            $dir_name = './uploads/'.date('Ymd',time());   //存放目录
            $res = $profile->move($dir_name,$file_name);   //移动文件到指定目录
        // 数据库存放路径
            $heatmap = new Heatmap;
            $heatmap->hpic = ltrim($dir_name.'/'.$file_name,'.');
        // 往文章表放数据
            $article = new Article;
            $article->uid = session('admininfo')['id'];
            $article->title = $request->input('title');
            $article->path = $request->input('path');
            $article->auth = $request->input('auth');
            $article->content = $request->input('content');
            $res2 = $article->save();
            $id = $article->id;
        // 往热图表放外键
            $heatmap->tid = $id;
            $res1 = $heatmap->save();
            if($res1 && $res2){
                // 提交事务
                DB::commit();
                return redirect('admin/heatmap')->with('success', '添加成功!');
            }else{
                // 回滚
                DB::rollBack();
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
        $data = Heatmap::find($id);
        return view('admin.heatmap.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据
         $data = Heatmap::find($id);
        // 加载页面
        return view('admin.heatmap.edit',['title'=>'热点图修改','data'=>$data]);
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

        // 验证表单
        // dump($request->all());
        $this->validate($request, [
        'title' => 'required',
        'content' => 'required',
        'hpic' => 'image',
        'path' =>'required',
        'auth' => 'required'
        ],[
            'title.required' => '标题必填',
            'content.required' => '文章内容必填',
            'hpic.image' => '图片格式不对',
            'path.required' => '来源必填',
            'auth.required' => '作者必填',

        ]);
        $heatmap = Heatmap::find($id);
        // 创建文件上传对象
        if($request->hasFile('hpic')){ 
            $profile = $request->file('hpic');
            $ext = $profile->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;        //设置文件名字
            $dir_name = './uploads/'.date('Ymd',time());   //存放目录
            $res = $profile->move($dir_name,$file_name);   //移动文件到指定目录
        }
        // 数据库存放路径
        if($request->hasFile('hpic')){
            $heatmap->hpic = ltrim($dir_name.'/'.$file_name,'.');
        }
        $res1 = $heatmap->save();
        $id = $heatmap->tid;

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->path = $request->input('path');
        $article->auth = $request->input('auth');
        $article->content = $request->input('content');
        $res2 = $article->save();
        if($res1 && $res2){
            // 提交事务
            DB::commit();
            return redirect('admin/heatmap')->with('success', '修改成功!');
        }else{
            // 回滚
            DB::rollBack();
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
        //
        $heatmap = Heatmap::find($id);
        $res = $heatmap->delete();
         if($res){
            return redirect('admin/heatmap')->with('success', '删除成功!');
        }else{
            return back()->with('error', '删除失败!');
        }

    }
}
