@extends ('backend.layouts.master')

@section ('title', 'create '.$title)

@section('page-header')
    <h1><i class="fa  fa-th-large text-red"></i>
    {{$title}}
        <small>create</small>
      </h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="#">{{$title}}</a></li>
    <li class="active">create</li>
</ol>
@endsection

@section('content')
    {!! Form::open(['route' => $route, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-briefcase"></i> Create {{$title}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             {!! $view!!}
            </div><!-- /.box-body -->

             <div class="box-footer">
                <div class="pull-left">
                    <a href="#" id="back" class="btn btn-danger btn-ls">
                        <i class="fa  fa-caret-square-o-left"></i> Back
                    </a>
                </div>
                <div class="pull-right">
                    <button type="submit" id='create' class="btn btn-success btn-ls">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
    {!! Html::script('js/backend/validate.js') !!}
@stop
