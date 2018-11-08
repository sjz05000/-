@extends('admin.layout.layout')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名(必填)</label>
                    <div class="mws-form-item">
                        <input type="text" name="username" value="{{ old('username') }}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">密码(必填)</label>
                    <div class="mws-form-item">
                        <input type="password" name="password" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码(必填)</label>
                    <div class="mws-form-item">
                        <input type="password" name="repassword" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机(必填)</label>
                    <div class="mws-form-item">
                        <input type="text" name="phone" value="{{ old('phone') }}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                    <div class="mws-form-item">
                        <input type="text" name="email" value="{{ old('email') }}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">QQ号</label>
                    <div class="mws-form-item">
                        <input type="text" name="qq" value="{{ old('qq') }}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">所在城市</label>
                    <div class="mws-form-item">
                        <input type="text" name="city" value="{{ old('city') }}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">出生日期</label>
                    <div class="mws-form-item">
                        <input type="date" name="birthday" value="{{ old('birthday') }}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="sex" value="1" id="sex1"> <label for="sex1">女</label></li>
                            <li><input type="radio" name="sex" value="2" id="sex2"> <label for="sex2">男</label></li>
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">权限</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="status" value="1" id="status1"> <label for="status1">超级管理员</label></li>
                            <li><input type="radio" name="status" value="2" id="status2"> <label for="status2">论坛管理员</label></li>
                            <li><input type="radio" name="status" value="3" id="status3" checked> <label for="status3">普通用户</label></li>
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">头像</label>
                    <div class="mws-form-item">
                        <input type="file" name="photo" value="" class="small">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
@endsection