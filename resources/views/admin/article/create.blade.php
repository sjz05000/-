@extends('admin.layout.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title or ''}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/article" method="post">
    		{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">标题</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="title" value="{{old('title')}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">作者</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="auth" value="{{old('auth')}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">来源</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="path" value="{{old('path')}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">内容</label>
    				<div class="mws-form-item">
    					 <!-- 加载编辑器的容器 -->
					    <script id="container" name="content" type="text/plain" class="medium">
					    </script>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
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