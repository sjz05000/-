@extends('admin.layout.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title or ''}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/article/{{$data->id}}" method="post">
    		{{csrf_field()}}   {{method_field('PUT')}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">标题</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="title" value="{{$data->title}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">作者</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="auth"  value="{{$data->auth}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">来源</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="path"  value="{{$data->path}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">内容</label>
    				<div class="mws-form-item">
    					 <!-- 加载编辑器的容器 -->
					    <script id="container" name="content" type="text/plain" class="medium">
					       {!! $data->content !!}
					    </script>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="修改" class="btn btn-danger">
    		</div>
    	</form>
    </div>    	
</div>
<!-- 配置文件 -->
 <script type="text/javascript" src="/d/utf8-php/ueditor.config.js"></script>
 <!-- 编辑器源码文件 -->
 <script type="text/javascript" src="/d/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
var ue = UE.getEditor('container');
</script>
@endsection