<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Article;
use DB;
use App\Model\Collect;

class CollectController extends Controller
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
        $id = $request->input('show_page',5);
        $name = $request->input('username','');
        $collect = DB::table('dy-collect')->get();
        foreach ($collect as $k=> $v) {
            $uid[] = $v->uid;
        }
        $uid = array_unique($uid); 
        $data = User::whereIn('id', $uid)->where('username','like','%'.$name.'%')->paginate($id);
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
            'title' => 'required|exists:dy-articles',
        ],[
            'username.required'=>'用户名必填',
            'username.exists'=>'用户名不存在',
            'username.required'=>'用户名必填',
            'title.required'=>'标题必填',
            'title.exists'=>'文章不存在',
        ]);
        $name = $request->input('username');
        $title = $request->input('title');
        $data = User::where('username','=',$name)->get();
        $uid = $data[0]->id;
        $data1 = Article::where('title','=',$title)->get();
        $tid = $data1[0]->id;
        // $res = DB::table('dy-collect')->insert(['uid' =>$uid,'tid' =>$id]);
        $res = new Collect;
        $res->uid = $uid;
        $res->tid = $tid;
        $res->save();
        if($res){
            return redirect('admin/collect')->with('success', '添加成功!');
        }else{
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
}
