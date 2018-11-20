<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Navigation;
use App\Model\Comment;

class NavigationController extends Controller
{
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
    public function show(Request $request,$id)
    {
        // 获取数据
        $textarea = $request->query('textarea', '');
        if($textarea){
            if(session('home')){
                $comment = new Comment;
                $comment->content = $textarea;
                $comment->uid = session('homeinfo')['id'];
                $comment->aid = $id;
                $res = $comment->save();
                if($res){
                    echo '发表成功';
                }else{
                    echo '发表失败';
                }
            }else{
                echo 'error';
            }
        }else{
           $data = Navigation::find($id);
           $comment_article = Comment::where('aid','=',$id)->get();
           
           return view('home.navigation.show',['data'=>$data,'comment_article'=>$comment_article,'id'=>$id]); 
        }
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
