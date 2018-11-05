@extends('admin/layout/layout')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/banner" method="post" enctype="multipart/form-data">
    		{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">轮播图片</label>
    				<div class="mws-form-item">
    					<input type="file" class="small" name="bpic" value="">
    				</div>
    			</div>
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">轮播详情地址</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="burl" value="">
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-success">
    			<input type="reset" value="重置" class="btn btn-info">
    		</div>
    	</form>
    </div>    	
</div>
@endsection