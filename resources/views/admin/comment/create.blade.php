<!-- @extends('admin.layout.layout')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/label" method="post">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">标签名</label>
                    <div class="mws-form-item">
                        <input type="text" name="labelname" value="{{ old('labelname') }}" class="small medium">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">标签背景色</label>
                    <div class="mws-form-item">
                        <input type="color" name="labelcolor" value="{{ old('labelcolor') }}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">包含文章数量</label>
                    <div class="mws-form-item">
                        <input type="text" name="articlecount" value="{{ old('articlecount') }}" class="medium">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">包含文章编号</label>
                    <div class="mws-form-item">
                        <input type="text" name="articlenumber" value="{{ old('articlenumber') }}" class="medium">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
@endsection -->