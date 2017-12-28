@extends ('backend.layouts.master')

@section ('title', $title.' | detail' )

@section('page-header')
    <h1>
        {{ $title }}
        <small>detail </small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="#">{{$title}}</a></li>
    <li class="active">detail</li>
</ol>
@endsection

@section('content')
    {!! Form::open(['route' => $route, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','files' => true]) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Detail {{$title}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             {!! $view!!}
             {!! Form::hidden('id',Request::get('id'))!!}
            </div><!-- /.box-body -->
            <div class="box box-footer">
                <div class="pull-left">
                    <a href="{{route(array_get($action,'route_list'))}}" class="btn btn-danger btn-ls">
                        <i class="fa  fa-caret-square-o-left"></i> Back
                    </a>
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
