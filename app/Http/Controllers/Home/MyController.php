<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use App\Model\Userdetail;
use App\Model\Article;

use DB;

class MyController extends Controller
{
    public function indexa($id)
    {
        $id = $id;
        $user = User::find($id);
        // $id = $user->id;//获取最后插入的id号

        $userdetail = Userdetail::where('uid',$id)->first();
        $article = DB::table('dy-articles')->get();
        foreach ($article as $k => $v) {
            $uid[] = $v->uid;
        }
        $articleuid = array_unique($uid); 
        $articleuid = array_search($id,$articleuid);
        
        return view('home.user.index',['id'=>$id,'articleuid'=>$articleuid]);       
    }
    public function set($id)
    {
        return view('home.user.set',['id'=>$id]);
    }
    public function message($id)
    {
        return view('home.user.message',['id'=>$id]);
    }
    public function home($id)
    {
        // dd($id);die
        $id = $id;
        $user = User::find($id);
        // $id = $user->id;//获取最后插入的id号

        $userdetail = Userdetail::where('uid',$id)->first();
        $article = DB::table('dy-articles')->get();
        foreach ($article as $k => $v) {
            $uid[] = $v->uid;
        }
        $articleuid = array_unique($uid); 
        $articleuid = array_search($id,$articleuid);

        $comment = DB::table('dy-comment')->get();
        foreach ($comment as $kcomment => $vcomment) {
            $uid[] = $vcomment->uid;
        }
        $commentuid = array_unique($uid); 
        $commentuid = array_search($id,$commentuid);
        // dump($articleuid);
        // false/0/7
        // 
        // dump(in_array('27',$articleuid ));

        // dump($user);
        // 加载添加模板
        return view('home.user.home',['user'=>$user,'userdetail'=>$userdetail,'articleuid'=>$articleuid,'commentuid'=>$commentuid,'id'=>$id]);
        // return view('home.user.home',['id'=>$id]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function qiandao(Request $request)
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
                echo '签到成功';
            }else{
                echo '已签到';
            }
        }else{
            // return redirect('/home')->with('error','请先登录');
            return redirect('/home')->withErrors(['请先登录！']);
            
        }
      
       
    }
}
