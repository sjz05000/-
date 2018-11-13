<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Config;

class ConfigController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=1)
    {
        // 查询数据
        $data = Config::find($id);
        // 加载模板 分配数据
        return view('admin.config.edit',['title'=>'修改配置','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=1)
    {
        // 查询数据
        $config = Config::find($id);
        // 修改数据
        $config->title = $request->input('title','');
        $config->keywords = $request->input('keywords','');
        $config->content = $request->input('content','');
        $config->status = $request->input('status',1);
        // 判断有无文件上传
        if($request->hasFile('file')){
                $file = $request->file('file');
                $file_path = './d/uploads/'.date('Ymd',time());
                $file_name =str_random(20).'.'.$file->getClientOriginalExtension();
                $res = $file->move($file_path,$file_name);
                $file_addr = ltrim($file_path.'/'.$file_name,'.');
                $config->file = $file_addr;
        }
        // 保存到数据库
        $res = $config->save();
        // 判断
        if($res){
            return redirect('/admin/config/edit')->with('success','修改成功');
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
        //
    }
}
