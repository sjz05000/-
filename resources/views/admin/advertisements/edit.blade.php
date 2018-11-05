@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/advertisements/{{$data->id}}" method="post" enctype="multipart/form-data">
                    		{{csrf_field()}}
                    		{{method_field('PUT')}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">公司名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="adname" value="{{$data->adname}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">联系电话</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="adphone" value="{{$data->adphone}}">
                    				</div>
                    			</div>
                    		　　<label for="file_file" class="mws-form-label" style="margin-left: 25px;">广告图片</label>
                    				<img src="{{$data->adfile}}" style="width: 100px;height:70px;">
                    			<input type="file" name="adfile">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">状态</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="radio" name="status" id="s1" value="1" @if($data->status == 1) checked @endif> <label for="s1">激活</label></li>
                    						<li><input type="radio" name="status" id="s2" value="2" @if($data->status == 2) checked @endif> <label for="s2">未激活</label></li>
                    					</ul>
                    				</div>
                    			</div>
                    		     <div class="mws-form-row">
                                        <label class="mws-form-label">网站地址</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="medium" name="url" value="{{$data->url}}">
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