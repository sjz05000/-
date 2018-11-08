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
                        <th>图片</th>
                        <th>跳转地址</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($data as $v)
          				<tr>
          					<td>{{ $v->id }}</td>
          					<td align="center"><img  style="width:100px;height:50px;" src="{{ $v->bpic }}"></td>
          					<td>{{ $v->burl }}</td>
          					<td align="center">
          						<a href="/admin/banner/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
        				 		<form action="/admin/banner/{{ $v->id }}" style="display:inline-block;" method="post">
        				 			{{csrf_field()}}
        							{{method_field('delete')}}
        				 			<button onclick="return confirm('确定要删除吗?')" class="btn btn-danger" >删除</button>
        				 		</form>
          					</td>
          				</tr>
        			@endforeach
                </tbody>
            </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
        <div id="page_page">{!! $data->render() !!}</div>
        </div>
    </div>
</div>
@endsection