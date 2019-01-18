@if(isset($extensions))
<select name="{{$name??'order_status_id'}}"
id="{{$id??'order_status_id'}}"
class='form-control {{$classes??''}}'
{{$required??''}}
@foreach($extensions as $key=>$extension)
{{$key}}='{{$extension}}'
@endforeach
>
@else
<select name="{{$name??'order_status_id'}}" id="{{$id??'order_status_id'}}" class='form-control show-tick {{$classes??""}}' data-live-search='true' {{$required??''}}>
@endif
	<option value=""></option>
	@if(!isset($statuses))
		@php
			$statuses = App\Models\OrdersStatus::all();
		@endphp
	@endif
	@foreach($statuses as $status)
		@if(old('order_status_id') == $status->id)
		<option value="{{$status->id}}" selected>@lang('status.'.$status->name)</option>
		@elseif(isset($selected_id) && $selected_id == $status->id)
		<option value="{{$status->id}}" selected>@lang('status.'.$status->name)</option>
		@else
		<option value="{{$status->id}}" >@lang('status.'.$status->name)</option>
		@endif

	@endforeach
</select>
