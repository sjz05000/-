@extends('admin.layout.layout')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/users/{{$user->id}}" method="post">
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
                        <input type="text" name="phone" value="{{$user->userinfo->phone}}" class="medium">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                    <div class="mws-form-item">
                        <input type="text" name="email" value="{{$user->userinfo->email}}" class="medium">
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
