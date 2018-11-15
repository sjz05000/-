@extends('admin.layout.layout')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$data->hamap->title}}</span>
    </div>
    <div class="mws-panel-body">
        <p>{!! $data->hamap->content !!}</p>
    </div>
</div>
@endsection