@extends('admin.layout.layout')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> {{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <form action="/admin/users" method="get">
                <div id="showCount" class="dataTables_length">
                    <label>显示 
                        <select size="1" name="showCount" aria-controls="DataTables_Table_1">
                            <option value="5" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 5) selected @endif >5</option>
                            <option value="10" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 10) selected @endif >10</option>
                            <option value="15" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 15) selected @endif >15</option>
                            <option value="20" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 20) selected @endif >20</option>
                        </select> 条
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>关键字: 
                        <input type="text" name="search" value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1">
                    </label>
                    <input type="submit" value="提交" class="btn btn-success btn-small">
                </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <!-- <th>uid</th> -->
                        <th>用户名</th>
                        <th>头像</th>
                        <th>性别</th>
                        <th>手机号</th>
                        <th>邮箱</th>
                        <th>QQ号</th>
                        <th>出生日期</th>
                        <th>城市</th>
                        <th>关注</th>
                        <th>粉丝</th>
                        <th>积分</th>
                        <th>状态</th>
                        <th>注册时间</th>
                        <th>操作</th>
  
                    </tr>
                </thead>
                
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($user as $k=>$v)
                        <tr class="odd">
                            <td>{{ $v->id }}</td>
                            <!-- <td>{{ $v->userinfo->uid }}</td> -->
                            <td>{{ $v->username }}</td>


                            <!-- <td>{{ $v->userinfo->photo }}</td> -->
                            <td align="center"><img  style="width:60px;height:50px;" src="{{ $v->userinfo->photo }}"></td>



                            @if( $v->userinfo->sex == 1)
                            <td><span>女</span></td>
                            @elseif($v->userinfo->sex == 2)
                            <td><span>男</span></td>
                            @else
                            <td><span></span></td>
                            @endif
                            <td>{{ $v->userinfo->phone }}</td>
                            <td>{{ $v->userinfo->email }}</td>
                            <td>{{ $v->userinfo->qq }}</td>
                            <td>{{ $v->userinfo->birthday }}</td>
                            <td>{{ $v->userinfo->city }}</td>
                            <td>{{ $v->userinfo->following }}</td>
                            <td>{{ $v->userinfo->fas }}</td>
                            <td>{{ $v->userinfo->integral }}</td>
                            @if( $v->status == 1)
                            <td><span style="background: yellowgreen;">超级管理员</span></td>
                            @elseif( $v->status == 2)
                            <td><span style="background: orange;">论坛管理员</span></td>
                            @else
                            <td><span style="background: yellow;">普通用户</span></td>
                            @endif
                            <!-- <td>{{ $v->status == 1 ? '未激活' : '激活' }}</td> -->
                            <td>{{ $v->userinfo->created_at }}</td>
                            <td>
                                <a href="/admin/users/{{ $v->id }}/edit" class="btn btn-warning btn-small">修改</a>
                                <form action="/admin/users/{{$v->id}}" method="post" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="删除" onclick="return confirm('确定要删除吗?')" class="btn btn-danger btn-small">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- <tr class="even">
                        <td class="  sorting_1">Gecko</td>
                        <td class=" "></td>
                        <td class=" "></td>
                        <td class=" "></td>
                        <td class=" "></td>
                    </tr> -->
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries有几页共几条</div>
            <style type="text/css">
                #pagepage .disabled{color: #666666;cursor: default;}
                #pagepage .active{background-color: #c5d52b;cursor: default;}
                #pagepage{color: #ffffff;float: right;padding: 2px;margin: 10px 8px 10px 0;background-color: rgba(0, 0, 0, 0.15);
                    -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;
                    -webkit-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.15), inset 0px 1px 2px rgba(0, 0, 0, 0.5);
                    -moz-box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.15), inset 0px 1px 2px rgba(0, 0, 0, 0.5);
                    box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.15), inset 0px 1px 2px rgba(0, 0, 0, 0.5);
                }
                #pagepage ul,li{margin: 0;}
                #pagepage li{
                    color: #323232;border: none;background-image: none;
                    -webkit-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    -moz-box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    float: left;height: 20px;padding: 0 10px;display: block;font-size: 12px;line-height: 20px;text-align: center;
                    cursor: pointer;outline: none;background-color: #444444;color: #fff;text-decoration: none;
                    border-right: 1px solid #232323;border-left: 1px solid #666666;
                    border-right: 1px solid rgba(0, 0, 0, 0.5);border-left: 1px solid rgba(255, 255, 255, 0.15);
                    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                }
            </style>
            <div id="pagepage">
                {!! $user->appends($request)->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection