@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/cate" method="post">
                    		{{csrf_field()}}
                    		<div class="mws-form-block">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">类别名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="medium" name="cname" value="{{old('cname')}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">父级类别</label>
                    				<div class="mws-form-item">
                    					<select class="medium" name="pid">
                    						<option value="0" @if(old('pid') == 0) selected @endif>--请选择--</option>
                    						@foreach($data as $k=>$v)
                    							<option value="{{$v->id}}" @if(old('pid') == $v->id) selected @endif>{{$v->cname}}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">状态</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list">
                    						<li><input type="radio" name="status"  id="up" checked value="1"> <label for="up">激活</label></li>
                    						<li><input type="radio" name="status"  id="down" value="2" @if(old('status')==2) checked @endif> <label for="down">未激活</label></li>
                    					</ul>
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