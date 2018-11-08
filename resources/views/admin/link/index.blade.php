@extends('admin.layout.layout')

 
@section('content')
	<div class="mws-panel grid_8">
	    <div class="mws-panel-header">
	    	<span><i class="icon-table"></i>{{ $title or '' }}</span>
	    </div>
	    <div class="mws-panel-body no-padding">
	    	<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
	        <table class="mws-table">
	            <thead>
	                <tr>
	                    <th>ID</th>
	                    <th>网站名称</th>
	                    <th>网站地址</th>
	                    <th>网站图片</th>
	                    <th>创建时间</th>
	                    <th>修改时间</th>
	                    <th>操作</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach ($data as $k=>$v)
					 <tr>
					 	<td>{{ $v->id }}</td>
					 	<td>{{ $v->yqname }}</td>
					 	<td>{{ $v->yqlink }}</td>
					 	<td><img style="width:60px;height:40px;" src="{{$v->yqpic}}"></td>
					 	<td>{{ $v->created_at }}</td>
					 	<td>{{ $v->updated_at }}</td>
					 	<td>
					 		<a href="/admin/link/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
					 		<form action="/admin/link/{{ $v->id }}" method="post">
					 			{{csrf_field()}}
								{{method_field('delete')}}
					 			<button onclick="return confirm('确定要删除吗?')" class="btn btn-danger" >删除</button>
					 		</form>
					 	</td>
					 </tr>
					 <!-- <tr>
					 	<td><img src="/uploads/20181101/7Ab1VcSNmw1eUFMlsZgn.gif"></td>
					 </tr> -->
	                @endforeach    
	            </tbody>
	        </table> 
	        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
	        <div id="page_page">{!! $data->render() !!}</div>
	    </div>
	    </div>
	</div>
	
	
@endsection