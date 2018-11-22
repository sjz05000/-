<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Http\Requests\CommentStoreRequest;
use Hash;
use DB;
use App\User;

class CommentController extends Controller
{
    //构造方法 为了网站安全 防止地址栏直接访问后台模块
    public function __construct()
    {
        if(!session('admin')){
              echo '<script>alert("请先登录");window.location.href="/admin/login";</script>';
        }
    }
    public static function getComment()
    {
        return Comment::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // echo 'comment123';
        // 设置搜索分页
        // dump($request->all());
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        // $comment = User::where('username','like','%'.$search.'%')->paginate($showCount);
        $comment = Comment::where('uid','like','%'.$search.'%')->paginate($showCount);

        // $user = User::all();
        // $user = User::paginate(5);
        // 加载列表页面
        return view('admin.comment.index',['title'=>'评论列表','comment'=>$comment,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加模板
        // return view('admin.comment.create',['title'=>'评论添加']);
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
            // DB::beginTransaction();

        // 验证表单在UsersStoreRequest中
        // 获取数据 进行添加
            // $comment = new Comment;
            // $comment->commentname=$request->input('commentname');

            // $res1 = $comment->save();//bool

        // $id = $user->id;//获取最后插入的id号
        // $userdetail = new Userdetail;
        // $userdetail->uid = $id;
        // $userdetail->email = $request->input('email');
        // $res2 = $userdetail->save();
        // && $res2

        // 逻辑判断
            // if ($res1) {
            //     // 提交事务
            //     DB::commit();
            //     return redirect('admin/comment')->with('success','添加成功');
            // } else {
            //     // 回滚
            //     DB::rollBack;
            //     return back()->with('success','添加失败');
            // }
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
        // echo $id;
            // $comment = Comment::find($id);
        // dump($user);
        // 加载添加模板
            // return view('admin.comment.edit',['comment'=>$comment,'title'=>'用户修改']);
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
            // DB::beginTransaction();
        // 验证表单在UsersStoreRequest中
            // $this->validate($request, [
            //     'commentname' => 'required',   
            // ],[
            //     'comment.required' => '标签名必填',
            // ]);


        // 获取数据 进行添加
            // $comment = Comment::find($id);
            // $comment->commentname=$request->input('commentname');
           
            // $res1 = $comment->save();//bool

        // $some = $request->all();
        // dump($some);
        // die;
        
        // 逻辑判断
            // if ($res1) {
            //     // 提交事务
            //     DB::commit();
            //     return redirect('admin/comment')->with('success','修改成功');
            // } else {
            //     // 回滚
            //     DB::rollBack;
            //     return back()->with('success','修改失败');
            // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务 作为回滚点
        DB::beginTransaction();

        $res1 = Comment::destroy($id);
        // $res2 = Userdetail::where('uid',$id)->delete();     && $res2

        // 逻辑判断
        if ($res1) {
            // 提交事务
            DB::commit();
            return redirect('admin/comment')->with('success','删除成功');
        } else {
            // 回滚
            DB::rollBack;
            return back()->with('success','删除失败');
        }
    }
}
