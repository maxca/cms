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
             <table id="user" class="table table-bordered table-striped" style="clear: both">
                    <tbody>
                        @if(!empty($data))
                        @foreach ($data as $key => $value)
                        @if(in_array($key,$images))
                        <tr>
                            <td>{{$key}}</td>
                            <td>
                                @if(is_array($value))
                                @foreach ($value as $keyImage => $image)
                                <a href="{{$image}}" target="_blank">
                                    <img src="{{$image}}" width="50%" height="50%" class="img img-thumbnail">
                                </a>
                                @endforeach
                                @else
                                <a href="{{$value}}" target="_blank">
                                    <img src="{{$value}}" width="50%" height="50%" class="img img-thumbnail">
                                </a>
                                @endif
                            </td>
                        </tr>
                        @elseif(!empty($value))
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{renderArray($value)}}</td>
                            </tr>
                        @endif
                        @endforeach
                        @else
                            Not found Data.
                        @endif
                    </tbody>
                </table>
             {{-- {!! $view!!} --}}
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
