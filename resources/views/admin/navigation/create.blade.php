@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/navigation" method="post">
                    		{{csrf_field()}}
                    		<div class="mws-form-inline">
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">导航名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="navname" value="{{old('navname')}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">父级导航</label>
                    				<div class="mws-form-item">
                    					<select class="medium" name="pid">
                    						<option value="0" @if(old('pid')==0) selected @endif>--请选择--</option>
                    						@foreach($data as $k=>$v)
                    						<option value="{{$v->id}}" @if(old('pid')==$v->id) selected @endif>{{$v->navname}}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">状态</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="radio" id="s1" name="status" checked value="1"> <label for="s1">激活</label></li>
                    						<li><input type="radio" name="status" id="s2" value="2" @if(old('status')==2) checked @endif> <label for="s2">未激活</label></li>
                    					</ul>
                    				</div>
                    			</div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">导航地址</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="medium" name="url" value="{{old('url')}}">
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
@endsection