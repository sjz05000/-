@extends('admin.layout.layout')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/users/{{$user->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" name="username" value="{{$user->username}}" readonly="readonly" class="small medium">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机</label>
                    <div class="mws-form-item">
                        <input type="text" name="phone" value="{{$user->userinfo->phone}}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                    <div class="mws-form-item">
                        <input type="text" name="email" value="{{$user->userinfo->email}}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">QQ号</label>
                    <div class="mws-form-item">
                        <input type="text" name="qq" value="{{$user->userinfo->qq}}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">所在城市</label>
                    <div class="mws-form-item">
                        <input type="text" name="city" value="{{$user->userinfo->city}}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">出生日期</label>
                    <div class="mws-form-item">
                        <input type="date" name="birthday" value="{{$user->userinfo->birthday}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="sex" value="1"  id="sex1" @if( $user->userinfo->sex == 1 ) checked @endif > <label for="sex1">女</label></li>
                            <li><input type="radio" name="sex" value="2"  id="sex2" @if( $user->userinfo->sex == 2 ) checked @endif > <label for="sex2">男</label></li>
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">权限</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="status" value="1" id="status1" @if( $user->status == 1 ) checked @endif > <label for="status1">超级管理员</label></li>
                            <li><input type="radio" name="status" value="2" id="status2" @if( $user->status == 2 ) checked @endif > <label for="status2">论坛管理员</label></li>
                            <li><input type="radio" name="status" value="3" id="status3" @if( $user->status == 3 ) checked @endif > <label for="status3">普通用户</label></li>
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">头像</label>
                    <div class="mws-form-item">
                        <img style="width: 80px;height: 80px;" src="{{$user->userinfo->photo}}">
                        <input type="file" name="photo" value="" class="small">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交修改" class="btn btn-success">
                <!-- <input type="reset" value="重置" class="btn btn-info"> -->
            </div>
        </form>
    </div>      
</div>
@endsection
