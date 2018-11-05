@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        	<form action="/admin/article" method="get">
                        		<div id="DataTables_Table_1_length" class="dataTables_length">
                        		<label>显示<select size="1" name="show_page" aria-controls="DataTables_Table_1">
                        			<option value="5" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==5) selected @endif>5</option>
                        			<option value="10" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==10) selected @endif>10</option>
                        			<option value="15" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==15) selected @endif>15</option>
                        			<option value="20" @if((!empty($request['show_page'])&&isset($request['show_page']))&& $request['show_page']==20) selected @endif>20</option>
                        		</select>条</label></div>
                        		<div class="dataTables_filter" id="DataTables_Table_1_filter">
                        			<label>标题: <input type="text" aria-controls="DataTables_Table_1" name="title" value="{{$request['title'] or ''}}"></label>
                        			<input type="submit" value="搜索" class="btn btn-info">
                        		</div>
                        	</form>
                        		<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                	<th>ID</th>
                                	<th>标题</th>
                                	<th>作者</th>
                                	<th>来源</th>
                                	<th>操作</th>
                                </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach($data as $k=>$v)
                        	<tr class="even">
                                    <td class="  sorting_1">{{$v->id}}</td>
                                    <td class="  sorting_1">{{$v->title}}</td>
                                    <td class="  sorting_1">{{$v->auth}}</td>
                                    <td class="  sorting_1">{{$v->path}}</td>
                                    <td class="  sorting_1" style="text-align: center;">
                                    	<a href="/admin/article/{{$v->id}}" class="btn">查看内容</a>
                                    	<a href="/admin/article/{{$v->id}}/edit" class="btn btn-info">修改</a>
                                    	<form action="/admin/article/{{$v->id}}" method="post" style="display: inline-block;">
                                    		{{csrf_field()}}    {{method_field('DELETE')}}
                                    		<input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('您确定要删除吗?');">
                                    	</form>
                                    </td>
                             </tr>
                             @endforeach
                         </tbody></table>
                         <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
                        <div id="page_page">{!!$data->appends($request)->render()!!}</div>
                     </div>
                    </div>
                </div>
@endsection