{{-- {{dd($formList)}} --}}
{{-- {{dd($data['item'])}} --}}
@extends ('backend.layouts.master')
@section ('title', $title . ' | List')
@section('page-header')
<h1><i class="fa  fa-th-large text-red"></i>
    {{$title}}
        <small>list</small>
      </h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="#">{{$title}}</a></li>
    <li class="active">list</li>
</ol>
@endsection
@section('content')
    @include('template.box-header',['route' => $route])
            <div class="box box-success">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr style="font-size: 13px !important">
                                    <th>id</th>
                                    @foreach ($formList as $key => $item)
                                    <th>{!! $item !!}</th>
                                    @endforeach
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($data['item']))
                                <?php $id = genId($data->perPage(), $data->currentPage())?>
                                @foreach ($data['item'] as $key => $list)
                                <tr style="font-size: 12px !important">
                                    <td>{{$id++}}</td>
                                    @foreach ($list as $listKey => $item)
                                        @if(in_array($listKey, $formList))
                                            <td>{!! $item !!}</td>
                                        @endif
                                    @endforeach
                                    <td>

                                    @if(!empty(array_get($action,'view')))
                                    @permission(array_get($action,'view'))
                                    <a href="{{ route(array_get($action,'route_view'),['id'=> $list['id']])}}" target="_blank" class="btn btn-xs btn-primary">
                                        <i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="" data-original-title="view page"></i>
                                    </a>
                                    @endauth
                                    @endif

                                    @if(!empty(array_get($action,'edit')))
                                    @permission(array_get($action,'edit'))
                                        <a href="{{ route(array_get($action,'route_edit'),['id'=> $list['id']])}}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    @endauth
                                    @endif

                                    @if(!empty(array_get($action,'dele')))
                                    @permission(array_get($action,'dele'))
                                   <a data-method="delete" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                                        <form action="{{ route(array_get($action,'route_dele'))}}" method="POST" name="delete_item" style="display:none">
                                           <input type="hidden" name="_method" value="delete">
                                           {{ csrf_field() }}
                                           {!! Form::hidden('id',array_get($list,'id')) !!}
                                        </form>
                                    </a>
                                    @endauth
                                    @endif

                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-left">Found : {{number_format($data->total())}} item</div>
                            <div class="pull-right">
                                {!! $data->appends(Request::all())->links() !!}
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-footer -->
                </div><!--box-success-->
                @stop
                @section('after-scripts-end')
                    {!! Html::script('js/template/jquery.datetimepicker.js') !!}
                    {!! Html::script('js/template/datetimeactive.js') !!}
                    {!! Html::script('js/backend/access/permissions/script.js') !!}
                    {!! Html::script('js/backend/access/users/script.js') !!}
                @stop
                <style type="text/css">
                div.form-group {
                font-size: 11.5px !important;
                }
                </style>