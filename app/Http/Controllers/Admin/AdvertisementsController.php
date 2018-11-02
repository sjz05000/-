<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Advertisements;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $show_page = $request->input('show_page',5);
        $adname = $request->input('adname','');
        $data = Advertisements::select()->where('adname','like',"%{$adname}%")->paginate($show_page);
        return view('admin.advertisements.index',['title'=>'浏览广告','data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisements.create',['title'=>'广告添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('adfile')){
                    $adfile = $request->file('adfile');
                    $adfile_path = './uploads/'.date('Ymd',time());
                    $adfile_name =str_random(20).'.'.$adfile->getClientOriginalExtension();
                    $res = $adfile->move($adfile_path,$adfile_name);
                    $adfile_addr = ltrim($adfile_path.'/'.$adfile_name,'.');
                    $advertisements = new Advertisements;
                    $advertisements->adname = $request->input('adname');
                    $advertisements->adphone = $request->input('adphone');
                    $advertisements->adfile = $adfile_addr;
                    $advertisements->status = $request->input('status');
                    $advertisements->url = $request->input('url');
                    $res = $advertisements->save();
                    if($res){
                        return redirect('/admin/advertisements')->with('success','添加成功');
                    }else{
                        return back()->with('error','添加失败');
                    }
        }else{
            return back()->with('error','请选择图片');
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
        $data = Advertisements::find($id);
        return view('admin.advertisements.edit',['title'=>'修改广告','data'=>$data]);
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
        if($request->hasFile('adfile')){
                $adfile = $request->file('adfile');
                $adfile_path = './uploads/'.date('Ymd',time());
                $adfile_name =str_random(20).'.'.$adfile->getClientOriginalExtension();
                $res = $adfile->move($adfile_path,$adfile_name);
                $adfile_addr = ltrim($adfile_path.'/'.$adfile_name,'.');
        }
        $advertisements = Advertisements::find($id);
        $advertisements->adname = $request->input('adname');
        $advertisements->adphone = $request->input('adphone');
        if($request->hasFile('adfile')){
            $advertisements->adfile = $adfile_addr;
        }
        $advertisements->status = $request->input('status');
        $advertisements->url = $request->input('url');
        $res = $advertisements->save();
        if($res){
            return redirect('/admin/advertisements')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        $res = Advertisements::destroy($id);
        if($res){
            return redirect('/admin/advertisements')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
