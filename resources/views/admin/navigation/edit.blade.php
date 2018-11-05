@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/navigation/{{$navigation->id}}" method="post">
                    		{{csrf_field()}}   {{method_field('PUT')}}
                    		<div class="mws-form-inline">
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">导航名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="navname" value="{{$navigation->navname}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">父级导航</label>
                    				<div class="mws-form-item">
                    					<select class="medium" name="pid">
                    						<option value="0">--请选择--</option>
                    						@foreach($data as $k=>$v)
                    						<option value="{{$v->id}}" @if($v->id == $navigation->pid) selected  @endif
                                                       @if($v->navname == '|----'.$navigation->navname || $v->navname == $navigation->navname) disabled @endif>{{$v->navname}}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">状态</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="radio" id="s1" name="status" @if($navigation->status==1) checked @endif value="1"> <label for="s1">激活</label></li>
                    						<li><input type="radio" name="status" id="s2" @if($navigation->status==2) checked @endif value="2"> <label for="s2">未激活</label></li>
                    					</ul>
                    				</div>
                    			</div>
                                      <div class="mws-form-row">
                                        <label class="mws-form-label">导航地址</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="medium" name="url" value="{{$navigation->url}}">
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