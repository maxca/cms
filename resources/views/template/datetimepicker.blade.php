	<label for="name" class="control-label">{{ucfirst($input['label'])}}</label>
	    <div class="input-daterange input-group">
            <input type="text" style="height: 33px;" placeholder="Start date" name="start_date" class="input-sm  datetimepicker form-control" autocomplete="off"
            @if(!empty($input['start_date'])) value="{{$input['start_date']}}" @endif>
            <span class="input-group-addon" style="padding: 6px 5px !important;">to</span>
            <input type="text" style="height: 33px;" placeholder="End date" name="end_date" class="input-sm form-control datetimepicker" autocomplete="off" @if(!empty($input['end_date']))value="{{$input['end_date']}}" @endif>
        </div>

	{{-- <div class="col-sm-3 space">

    <label for="name" class="control-label">Created</label>
	    <div class="input-daterange input-group">
            <input type="text" placeholder="Start date" name="start_date" class="input-sm  datetimepicker form-control" autocomplete="off">
            <span class="input-group-addon" style="padding: 6px 5px !important;">to</span>
            <input type="text" placeholder="End date" name="end_date" class="input-sm form-control datetimepicker" autocomplete="off">
        </div>
     </div>
 --}}
