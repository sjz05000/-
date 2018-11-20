<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use App\Model\Userdetail;
use DB;

class MyController extends Controller
{
        public function indexa($id)
    {
        return view('home.user.index',['id'=>$id]);       
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
        // dump($articleuid);
        // false/0/7
        // 
        // dump(in_array('27',$articleuid ));

        // dump($user);
        // 加载添加模板
        return view('home.user.home',['user'=>$user,'userdetail'=>$userdetail,'articleuid'=>$articleuid,'id'=>$id]);
        // return view('home.user.home',['id'=>$id]);
    }
}
