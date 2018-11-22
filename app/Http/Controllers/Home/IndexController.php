<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cate;
use App\Model\Heatmap;
use App\Model\Config;
use App\Model\Article;
use App\Model\Comment;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查询数据
        // 24小时热议
        $time = date('Y-m-d ',time());
        $time1 = date('Y-m-d ',(time()+60*60*24));
        $comment = Comment::orderBy('zan', 'desc')->whereBetween('created_at', [$time,$time1])->paginate(10);
        $temp = [];
        foreach($comment as $k=>$v){
            $temp[] = $v->aid;
        }
        $article = Article::whereIn('id',$temp)->get();
        // 本周热议
        $time2 = '7'-date('w',time());
        $time3 = date('Y-m-d',time()+60*60*24*$time2);     // 最大不超
        $time4 = date('w',time());                      
        $time5 = date('Y-m-d',(time()-60*60*24*$time4));     // 最小不超
        $comment1 = Comment::orderBy('zan', 'desc')->whereBetween('created_at', [$time5,$time3])->paginate(10);
        $temp1 = [];
        foreach($comment1 as $k=>$v){
            $temp1[] = $v->aid;
        }
        $article1 = Article::whereIn('id',$temp1)->get();
        $config = Config::find(1);
        session(['config'=>$config]);
        return view('home/index/index',['config'=>$config,'article'=>$article,'comment'=>$comment,'article1'=>$article1,'comment1'=>$comment1]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
