{{-- {{dd($data)}} --}}
@extends ('backend.layouts.master')

@section ('title', $title.' | detail' )

@section('page-header')
    <h1>
        {{ $title }}
        <small>detail </small>
    </h1>
@endsection

@section('content')
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">detail</h3>
            </div>
            <div class="box-body">
                <table id="user" class="table table-bordered table-striped" style="clear: both">
                        <tbody>
                        @foreach ($data as $key => $value)
                        <tr>
                            <td>{{$key}}</td>
                            @if(in_array($key, listAllow()))
                            <td>
                               {{--  <a href="{{genImg($data['item'][0],$value)}}" target="_blank">
                                    <img src="{{genImg($data['item'][0],$value)}}" width="200" >
                                </a> --}}
                            </td>
                            @else
                            <td>{{renderArray($value)}}</td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="box box-info">
             <div class="box-body">
                <div class="pull-left">
                    <a href="#" id="back" class="btn btn-danger btn-ls">Back</a>
                </div>
                <div class="pull-right">
                    <input type="submit" id='create' class="btn btn-success btn-ls" value="Back" />
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
