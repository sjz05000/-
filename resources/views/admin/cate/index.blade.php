@extends('admin.layout.layout')
@section('content')
		<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>{{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        <form action="/admin/cate" method="get">
                        	<div id="DataTables_Table_1_length" class="dataTables_length">
							<label>
								显示
								<select size="1" aria-controls="DataTables_Table_1" name="cate_count"> 
									<option value="5" @if((!empty($request['cate_count'])&&isset($request['cate_count']))&&$request['cate_count']==5) selected @endif>
										5
									</option>
									<option value="10" @if((!empty($request['cate_count'])&&isset($request['cate_count']))&&$request['cate_count']==10) selected @endif>
										10
									</option>
									<option value="20" @if((!empty($request['cate_count'])&&isset($request['cate_count']))&&$request['cate_count']==20) selected @endif>
										20
									</option>
								</select>
								条
							</label>
							</div>
                        	<div class="dataTables_filter" id="DataTables_Table_1_filter">
                        		<label>类别名称:<input type="text" aria-controls="DataTables_Table_1" name="cname" value="{{$request['cname'] or ''}}"></label>
                        		<input type="submit" value="提交" class="btn btn-info">
                        	</div>
                        </form>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
											<th>ID</th>
											<th>类别名称</th>
											<th>父级ID</th>
											<th>创建时间</th>
											<th>路径</th>
                                            <th>状态</th>
											<th>操作</th>
								</tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach($cate as $k=>$v)
                        	<tr class="odd">
                                    <td class="  sorting_1">{{$v->id}}</td>
                                    <td class="  sorting_1">{{$v->cname}}</td>
                                    <td class="  sorting_1">{{$v->pid}}</td>
                                    <td class="  sorting_1">{{$v->created_at}}</td>
                                    <td class="  sorting_1">{{$v->path}}</td>
                                    <td class="   sorting_1">{{$v->status==1 ? '激活' : '未激活' }}</td>
                                    <td class="  sorting_1">
                                    	<a href="/admin/cate/{{$v->id}}/edit" class="btn btn-info">修改</a>
                                    	<form action="/admin/cate/{{$v->id}}" style="display: inline-block;" method="post">
                                    		{{csrf_field()}}  {{method_field('DELETE')}}
                                    		<input type="submit" value="删除" class="btn btn-danger">
                                    	</form>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                      </table>
                      <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
						<div id="page_page">
							{!!$cate->appends($request)->render()!!}
						</div>
                        </div>
                    </div>
                </div>
@endsection