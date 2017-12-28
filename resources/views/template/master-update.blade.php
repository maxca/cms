@extends ('backend.layouts.master')

@section ('title', 'Update '.$title." : ".env('APP_NAME','MK'))

@section('page-header')
    <h1>
        <small>Update {{ $title }}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="#">{{$title}}</a></li>
    <li class="active">update</li>
</ol>
@endsection

@section('content')
    {!! Form::open(['route' => $route, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','files' => true]) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Update {{$title}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             {!! $view!!}
             {!! Form::hidden('id',Request::get('id'))!!}
            </div><!-- /.box-body -->
            <div class="box box-footer">
                <div class="pull-left">
                    <a href="{{route(array_get($action,'route_list'))}}" id="back" class="btn btn-danger btn-ls">
                        <i class="fa  fa-caret-square-o-left"></i> Back
                    </a>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success btn-ls">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
    {!! Html::script('js/backend/validate.js') !!}
@stop
