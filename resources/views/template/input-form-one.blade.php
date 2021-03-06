{{-- {{ dd($data)}} --}}
@foreach ($data as $i => $input)
{{-- {{dump($input)}} --}}
<div class="form-group">

    @if($input['type'] == 'daterange')
    @include('template.datetimepicker')
    @else

    @if(isset($input['label']))
    <i class="fa fa-edi"></i>
    <label for="name" class="col-lg-2 control-label">{{ucfirst($input['label'])}}</label>
    @endif
    <div class="col-lg-10">
      @if($input['type'] =='text')
       {!! Form::text($input['name'],genOld($input),['class'=>'form-control','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder'],'required' => array_get($input,'required')]) !!}
      @elseif ($input['type'] == 'select')
        {!! Form::select($input['name'],$input['select']['list'], genOld($input), ['class'=>'form-control','placeholder' => $input['placeholder'],'required' => array_get($input,'required')]) !!}
      @elseif ($input['type'] == 'select_add')
      {!! Form::select($input['name'],$input['select']['list'], genSelect($input), ['class'=>'form-control','placeholder' => $input['placeholder']]) !!}
      @elseif($input['type'] == 'number')
       <input class="form-control" value="{{genOld($input)}}" placeholder="{{$input['placeholder']}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46" name="{{$input['name']}}" type="number" id="{{$input['id']}}"
      value="{{old($input['id'])}}" @if(!empty($input['required'])) required @endif>
      @elseif($input['type'] == 'hidden')
        {!! Form::hidden($input['name'],genOld($input),['class'=>'form-control','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder']]) !!}
      @elseif($input['type'] == 'disable')
        {!! Form::text($input['name'],genOld($input),['class'=>'form-control','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder'],'disabled' =>'disabled']) !!}
      @elseif($input['type'] == 'texarea')
      {!! Form::textarea($input['name'],genOld($input),['class'=>'form-control'])!!}
      @elseif($input['type'] == 'file')
        @if(!empty($input['value']))
            <p>
              <img src="{{$input['value'][0]}}" width="50%" height="50%" class="img img-thumbnail">
            </p>
        @endif
      {!! Form::file($input['name'],['class'=>'form-control'])!!}
      @elseif($input['type'] == 'date')
            {!! Form::text($input['name'],genOld($input),['class'=>'form-control new-datepicker','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder']]) !!}
      @elseif($input['type'] == 'datetime')
            {!! Form::text($input['name'],genOld($input),['class'=>'form-control new-datetimepicker','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder']]) !!}
      @elseif($input['type'] == 'province')
            {!! Form::select($input['name'],genListSelelct($input['select']['list'],$input), genOld($input), ['class'=>'form-control province','placeholder' => $input['placeholder'],'required' => array_get($input,'required')]) !!}
      @elseif($input['type'] == 'amphures')
            {!! Form::select($input['name'],genListSelelct($input['select']['list'],$input), genOld($input), ['class'=>'form-control amphures','placeholder' => $input['placeholder'],'required' => array_get($input,'required')]) !!}
      @elseif($input['type'] == 'district')
            {!! Form::select($input['name'],genListSelelct($input['select']['list'],$input), genOld($input), ['class'=>'form-control district','placeholder' => $input['placeholder'],'required' => array_get($input,'required')]) !!}
      @elseif($input['type'] == 'postcode')
       {!! Form::text($input['name'],genOld($input),['class'=>'form-control postcode','name' => $input['name'],'id' => $input['id'],'placeholder' => $input['placeholder'],'disabled' => 'disabled','required' => 'required']) !!}
       {!! Form::hidden($input['name'],genOld($input),['class'=>'form-control','postcode' => $input['name'],'placeholder' => $input['placeholder']]) !!}
      @endif


    </div>
    @endif
</div>
@endforeach
