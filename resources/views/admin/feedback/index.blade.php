@extends('admin.layout.layout')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
	        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
	        	<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
	            <thead>
	                <tr role="row">
	                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">ID</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 150px;">用户名</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 200px;">日期</th>
	                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 200px;">操作</th>
	                </tr>
	            </thead>
	            
	        	<tbody role="alert" aria-live="polite" aria-relevant="all">
	        		@foreach ($data as $v)
	        		<tr>
	                    <td class="  sorting_1">{{ $v->id }}</td>
	                    <td align="center">{{ $v->feedbackuser['username'] }}</td>
	                    <td align="center">{{ $v->created_at }}</td>
	                    <td align="center">
	                    	<a href="/admin/feedback/{{ $v->id }}" class="btn btn-info" >查看内容</a>
	                    	<form action="/admin/feedback/{{ $v->id }}" method="post" style="display: inline-block;">
	                    		{{csrf_field()}}    {{method_field('DELETE')}}
	                    		<input type="submit" class="btn btn-danger" value="删除" onclick="return confirm('您确定要删除吗?');">
	                    	</form>
	                    </td>
	                </tr>
	                @endforeach
	            </tbody>
	        </table>
	        <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 57 entries</div>
	        <div id="page_page">
	        	{!! $data->render() !!}
	        </div>
    	</div>
    </div>
</div>
@endsection