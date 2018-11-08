@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/advertisements" method="post" enctype="multipart/form-data">
                    		{{csrf_field()}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">广告名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="adname" value="{{old('adname')}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">联系电话</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="adphone" value="{{old('adphone')}}">
                    				</div>
                    			</div>
                    		　　<label for="file_file" class="mws-form-label" style="margin-left: 25px;">广告图片</label>
                    			<input type="file" name="adfile" style="margin-left: -15px;">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">状态</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="radio" name="status" id="s1" value="1" checked> <label for="s1">激活</label></li>
                    						<li><input type="radio" name="status" id="s2" value="2"> <label for="s2">未激活</label></li>
                    					</ul>
                    				</div>
                    			</div>
                    		     <div class="mws-form-row">
                                        <label class="mws-form-label">网站地址</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="medium" name="url" value="{{old('url')}}">
                                        </div>
                                   </div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="添加" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection