@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
		<div class="mws-panel-header">
	    	<span><i class="icon-table"></i>{{$title or ''}}</span>
	    </div>
		<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
			<form action="/admin/navigation" method="get">
				<div id="DataTables_Table_1_length" class="dataTables_length">
				<label>显示<select size="1" name="show_page" aria-controls="DataTables_Table_1">
					<option value="5" @if((!empty($request['show_page'])&&isset($request['show_page'])&&$request['show_page']==5)) selected @endif>5</option>
					<option value="10"  @if((!empty($request['show_page'])&&isset($request['show_page'])&&$request['show_page']==10)) selected @endif>10</option>
					<option value="15"  @if((!empty($request['show_page'])&&isset($request['show_page'])&&$request['show_page']==15)) selected @endif>15</option>
					<option value="20"  @if((!empty($request['show_page'])&&isset($request['show_page'])&&$request['show_page']==20)) selected @endif>20</option>
				</select>条</label></div>
				<div class="dataTables_filter" id="DataTables_Table_1_filter">
					<label for="status">状态:<select size="1" id="status" name="status" aria-controls="DataTables_Table_1">
						<option value="1" @if((!empty($request['status'])&&isset($request['status']))&&$request['status']==1) selected @endif>激活</option>
						<option value="2" @if((!empty($request['status'])&&isset($request['status']))&&$request['status']==2) selected @endif>未激活</option>
					</select></label>
					<input type="submit" value="搜索" class="btn btn-info">
				</div>
			</form>
		<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                	<th>ID</th>
                                	<th>导航名称</th>
                                	<th>父级ID</th>
                                	<th>路径</th>
                                	<th>状态</th>
                                    <th>URL</th>
                                	<th>创建时间</th>
                                	<th>操作</th>
                                </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach($data as $k=>$v)
                        		<tr>
                                    <td class="  sorting_1">{{$v->id}}</td>
                                    <td class="  sorting_1">{{$v->navname}}</td>
                                    <td class="  sorting_1">{{$v->pid}}</td>
                                    <td class="  sorting_1">{{$v->path}}</td>
                                    <td class="  sorting_1">{{$v->status==1 ? '激活' : '未激活'}}</td>
                                    <td class="  sorting_1">{{$v->url}}</td>
                                    <td class="  sorting_1">{{$v->created_at}}</td>
                                    <td>
                                    	<a href="/admin/navigation/{{$v->id}}/edit" class="btn btn-info">修改</a>
                                    	<form action="/admin/navigation/{{$v->id}}" method="post" style="display: inline-block;">
                                    		{{csrf_field()}}   {{method_field('DELETE')}}
                                    		<input type="submit" value="删除" class="btn btn-danger">
                                    	</form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
                        <div id="page_page">
                    		{!! $data->appends($request)->render() !!}
                    	</div>
                    </div>
                </div>
        </div>
@endsection