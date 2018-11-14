<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
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
        // 分页搜索
        $show_page = $request->input('show_page',5);
        $title = $request->input('title','');
        // 查询数据
        $data = Article::where('title','like','%'.$title.'%')->paginate($show_page);
        // 加载模板
        return view('admin.article.index',['title'=>'浏览文章','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模板
        return view('admin.article.create',['title'=>'文章添加']);
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
            'title' => 'required',
            'auth' => 'required',
            'path' => 'required',
            'content' => 'required',
        ],[
            'title.required' => '文章标题必填',
            'auth.required' => '作者必填',
            'path.required' => '路径必填',
            'content.required' => '内容必填',
        ]);
        // 接收表单数据保存
        $article = new Article;
        $article->title = $request->input('title','');
        $article->auth = $request->input('auth','');
        $article->path = $request->input('path','');
        $article->content = $request->input('content','');
        $res = $article->save();
        // 判断
        if($res){
            return redirect('/admin/article')->withInput($request->all())->with('success','文章添加成功');
        }else{
            return back()->with('error','文章添加失败');
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
        // 查询数据
        $data = Article::find($id);
        // 加载模板
        return view('admin.article.show',['data'=>$data]);
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
        $data = Article::find($id);
        // 加载模板
        return view('admin.article.edit',['title'=>'文章修改','data'=>$data]);
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
            'title' => 'required',
            'auth' => 'required',
            'path' => 'required',
            'content' => 'required',
        ],[
            'title.required' => '文章标题必填',
            'auth.required' => '作者必填',
            'path.required' => '路径必填',
            'content.required' => '内容必填',
        ]);
        // 查询保存数据
        $article = Article::find($id);
        $article->title = $request->input('title','');
        $article->auth = $request->input('auth','');
        $article->path = $request->input('path','');
        $article->content = $request->input('content','');
        $res = $article->save();
        // 判断
        if($res){
            return redirect('/admin/article')->with('success','文章修改成功');
        }else{
            return back()->with('error','文章修改失败');
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
        // 删除数据
        $res = Article::destroy($id);
        // 判断
         if($res){
            return redirect('/admin/article')->with('success','文章删除成功');
        }else{
            return back()->with('error','文章删除失败');
        }
    }
}
