<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Article;
use DB;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('show_page',5);
        $title = $request->input('title','');
        // $tid = Article::where('title','like','%'.$title.'%')
        $data = User::paginate($id);
        // $data = User::where('title','like','%'.$title.'%')->paginate($id);
        // 加载页面
        return view('admin.collect.index',['title'=>'收藏列表','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载页面
        return view('admin.collect.create',['title'=>'添加收藏']);
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
        // dump($request->all());
        $request->input('username');
         $this->validate($request, [
            'username' => 'required|exists:dy-users',
            'title' => 'required|exists:dy-users',
        ],[
            'username.required'=>'用户名必填',
            'username.exists'=>'用户名不存在',
            'username.required'=>'用户名必填',
            'title.required'=>'标题必填',
            'title.exists'=>'标题不存在',
        ]);die;
        $name = $request->input('username');
        $title = $request->input('title');
        
        DB::table('dy-collect')->insert(['uid' => , 'tid' => 0]
);
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
    public function destroy(Request $request,$id)
    {
        $uid = $request->input('uid');
        $tid = $request->input('tid');
        $res = DB::table('dy-collect')->where('uid', '=', $uid)->where('tid','=',$tid)->delete();
         if($res){
            return redirect('admin/collect')->with('success', '删除成功!');
        }else{
            return back()->with('error', '删除失败!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id,$tid)
    {
        echo $id;
        echo $tid;
        dump($request->all);
        // dump($id);
        // dump($tid);
        // DB::table('users')->where('id', '<', 100)->delete();
    }
}
