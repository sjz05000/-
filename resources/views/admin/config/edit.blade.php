@extends('admin.layout.layout')
@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>{{$title or ''}}</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/config/update" method="post" enctype="multipart/form-data">
        		{{csrf_field()}}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">网站标题</label>
        				<div class="mws-form-item">
        					<input type="text" class="medium" name="title" value="{{$data->title}}">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">网站关键字</label>
        				<div class="mws-form-item">
        					<input type="text" class="medium" name="keywords" value="{{$data->keywords}}">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">网站描述</label>
        				<div class="mws-form-item">
        					<input type="text" class="medium" name="content" value="{{$data->content}}">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">网站状态</label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline">
        						<li><input type="radio" name="status" @if($data->status == 1) checked @endif value="1"> <label>激活</label></li>
        						<li><input type="radio" name="status" value="2" @if($data->status == 2) checked @endif> <label>未激活</label></li>
        					</ul>
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">网站logo</label>
        				<div class="mws-form-item">
        					<input type="file" class="medium" name="file">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">预览</label>
        				<div class="mws-form-item">
        					<img src="{{$data->file}}" width="100px">
        				</div>
        			</div>
        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="修改" class="btn btn-danger">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection