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
                        <th>标题</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($data as $v)
          					<td>{{ $v->id }}</td>
                    <td align="center"><img style="width:60px;height:50px;" src="{{ $v->hpic }}"></td>
                    <td align="center">{{ $v->hamap->title }}</td>
          					<td align="center">
          						<a href="/admin/heatmap/{{ $v->id }}" class="btn">查看内容</a>
          						<a href="/admin/heatmap/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
          					</td>
          				</tr>
        			@endforeach
                </tbody>
            </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
        </div>
    </div>
</div>
@endsection