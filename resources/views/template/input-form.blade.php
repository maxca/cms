{{-- {{dd($data)}} --}}

  <?php $num = count($data);
$perPage = 3;
$i = 0;
$page = $num / $perPage;?>
{{-- {{'num'.$num}} --}}
<div class="form-group">
@foreach ($data as $i => $input)
{{-- @if($i % $perPage == 0) --}}
<div class="col-sm-3 space">
{{-- @endif --}}

{{-- {{ dump($input)}} --}}
  @if($input['type'] == 'daterange')
  @include('template.datetimepicker')
  @else
    @if(isset($input['label']))
    <label for="name" class="control-label"><i class="fa fa-edi"></i>{{ucfirst($input['label'])}}</label>
    @endif
    {{-- <div class="col-lg-3"> --}}
      @if($input['type'] =='text')
      {!! Form::text($input['name'],genOld($input),['class'=>'form-control','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder']]) !!}
      @elseif ($input['type'] == 'select')
      {!! Form::select($input['name'],$input['select']['list'], genOld($input), ['class'=>'form-control','placeholder' => $input['placeholder']]) !!}
      @elseif ($input['type'] == 'select_add')
      {!! Form::select($input['name'],$input['select']['list'], genSelect($input), ['class'=>'form-control','placeholder' => $input['placeholder']]) !!}
      @elseif($input['type'] == 'number')
       <input class="form-control" value="{{genOld($input)}}" placeholder="{{$input['placeholder']}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46" name="{{$input['name']}}" type="number" id="{{$input['id']}}"
      value="{{old($input['id'])}}" @if(!empty($input['required'])) required @endif>
      @elseif($input['type'] == 'hidden')

       {!! Form::hidden($input['name'],genOld($input),['class'=>'form-control','name' => $input['name'],'id' => $input['id']]) !!}
      @elseif($input['type'] == 'disable')
            {!! Form::text($input['name'],genOld($input),['class'=>'form-control','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder'],'disabled' =>'disabled']) !!}
      @elseif($input['type'] == 'date')
            {!! Form::text($input['name'],genOld($input),['class'=>'form-control new-datepicker','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder']]) !!}
      @elseif($input['type'] == 'datetime')
            {!! Form::text($input['name'],genOld($input),['class'=>'form-control new-datetimepicker','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder']]) !!}
      @elseif($input['type'] == 'province')
            {!! Form::text($input['name'],genOld($input),['class'=>'form-control province','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder']]) !!}
      @endif
    {{-- </div> --}}
  @endif
  {{-- {{$i % $perPage}} --}}
 {{-- @if( $i > 0 && $i % $perPage == 2 or $i == $num -1 ) --}}
<?php $i++;?>
</div>
 {{-- @endif --}}
@endforeach
</div>


