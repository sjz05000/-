@extends('admin.layout.layout')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
	        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
	        	<form action="/admin/collect" method="get">
            		<div id="DataTables_Table_1_length" class="dataTables_length">
            		<label>显示<select size="1" name="show_page" aria-controls="DataTables_Table_1">
            			<option value="5" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==5) selected @endif>5</option>
            			<option value="10" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==10) selected @endif>10</option>
            			<option value="15" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==15) selected @endif>15</option>
            			<option value="20" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==20) selected @endif>20</option>
            		</select>条</label></div>
            		<div class="dataTables_filter" id="DataTables_Table_1_filter">
            			<label>用户名: <input type="text" aria-controls="DataTables_Table_1" name="username" value="{{$request['username'] or ''}}"></label>
            			<input type="submit" value="搜索" class="btn btn-info">
            		</div>
            	</form>
	        	<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
	            <thead>
	                <tr role="row">
	                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">ID</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 150px;">用户名</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 150px;">手机号</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 150px;">邮箱</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 200px;">收藏的文章</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 200px;">操作</th>
	                </tr>
	            </thead>
	            
	        	<tbody role="alert" aria-live="polite" aria-relevant="all">
	        		@foreach ($data as $k=>$v)
	        		<tr>
	        			<td class="sorting_1">{{ $v->id }}</td>
	        			<td>{{ $v->username }}</td>
	        			<td>{{ $v->userinfo['phone'] }}</td>
	        			<td>{{ $v->userinfo['email'] }}</td>
	        			<td><ol>
	        				@foreach ($v->usercollect as $kk=>$vv)
	        					<li>{{ $vv->title }}</li>
	        				@endforeach
	        			</td></ol>
	        			<td align="center"><ol>@foreach ($v->usercollect as $kkk=>$vvv)
	        				<form action="/admin/collect/{{ $vvv->id }}" method="post">
	        					{{csrf_field()}}    {{method_field('DELETE')}}
	        						<input type="text" name="uid" hidden value="{{ $v->id }}">
	                    			<input type="text" name="tid" hidden value="{{ $vvv->id }}">
	                    		<li><input type="submit" class="btn btn-danger" onclick="return confirm('您确定要删除吗?');" value="删除"></li>
	                    	</form>
	                    @endforeach</ol>
	                    </td>   
	                </tr>    
	                @endforeach
	            </tbody>
	        </table>
	        <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 57 entries</div>
	        <div id="page_page">
	        	{!! $data->appends($request)->render() !!}
	        </div>
    	</div>
    </div>
</div>
@endsection
