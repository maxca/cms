{!! Form::open(['route' => $route, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'get']) !!}
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-search"></i>Search</h3>
		</div><!-- /.box-header -->
		<div class="box-body">
			{!! $view !!}
		</div>
		<div class="box box-footer">
			{{-- <div class="box-body"> --}}
				<div class="pull-right">
					@if(isset($export))
					<button id="btn_export_excel" type="submit" class="btn bg-olive margin">
					    <i class="fa fa-file-excel-o"></i> Export Excel
					</button>
					@endif
					<button id="btn_export_excel" type="submit" class="btn bg-aqua margin">
					    <i class="fa fa-search"></i>{{ trans('lang.btn.search') }}
					</button>
					{{-- <input type="submit" class="btn btn-success btn-ls" value="{{ trans('lang.btn.search') }}" /> --}}
				</div>
				{{-- <div class="clearfix"></div> --}}
				{{-- </div> --}}<!-- /.box-body -->
				</div><!--box-->
</div> {{-- close-box-success --}}
{!! Form::close() !!}
