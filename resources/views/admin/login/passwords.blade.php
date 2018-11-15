@extends('admin.layout.layout')
@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding" >
                    	<form class="mws-form" action="/admin/login/update/{{$id}}" method="post">
                    		{{ csrf_field() }}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">密码</label>
                    				<div class="mws-form-item">
                    					<input type="password" class="medium" name="password">
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">确认密码</label>
                    				<div class="mws-form-item">
                    					<input type="password" class="medium" name="repassword">
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