@extends ('backend.layouts.master')

@section ('title', 'create '.$title)

@section('page-header')
    <h1>
        <small>Create {{ $title }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => $route, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create {{$title}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             {!! $view!!}
            </div><!-- /.box-body -->
            <div class="box box-info">
             <div class="box-body">
                <div class="pull-left">
                    <a href="#" id="back" class="btn btn-danger btn-ls">Back</a>
                </div>
                <div class="pull-right">
                    <input type="submit" id='create' class="btn btn-success btn-ls" value="{{ trans('buttons.general.crud.create') }}" />
                </div>

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
            </div>
        </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
    {!! Html::script('js/backend/validate.js') !!}
@stop
