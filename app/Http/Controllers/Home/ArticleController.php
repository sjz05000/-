<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use DB;
use App\User;
use App\Model\Userdetail;

class ArticleController extends Controller
{
    /**
     * 删除发布与收藏的文章 
     */
    public function delete($tid=0)
    {
        $flight =Article::find($tid);
        $flight->delete();
        return back();
    }
    public function deletel($uid,$tid)
    {
        $res = DB::table('dy-collect')->where('uid', $uid)->orWhere('tid',$tid)->delete();
       return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('home.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(session('home')){
            // 获取数据
            $title = $request->input('title','');
            $content = $request->input('content','');
            // 接收表单数据
            $article = new Article;
            $article->uid = session('homeinfo')['id'];
            $article->title = $title;
            $article->content = $content;
            $res = $article->save();
            $userdetail = Userdetail::find(session('homeinfo')['id']);
            $userdetail->integral += 20;
            $res2 = $userdetail->save();
            if($res&&$res2){
                echo '发表成功';
            }else{
                echo '发表失败';
            }
        }else{
            echo 'error';
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
        // 加载页面
        $data = Article::find($id);
        return view('home.article.show',['data'=>$data,'id'=>$id]);
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

    }
}
