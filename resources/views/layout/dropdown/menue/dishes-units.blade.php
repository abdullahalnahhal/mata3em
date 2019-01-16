@if(isset($extensions))
<select name="{{$name??'dish_unit_id'}}"
id="{{$id??'dish_unit_id'}}"
class='form-control {{$classes??''}}'
{{$required??''}}
@foreach($extensions as $key=>$extension)
{{$key}}='{{$extension}}'
@endforeach
>
@else
<select name="{{$name??'dish_unit_id'}}" id="{{$id??'dish_unit_id'}}" class='form-control show-tick {{$classes??""}}' data-live-search='true' {{$required??''}}>
@endif
	<option value=""></option>
	@if(!isset($dish_units))
		@php
			$dish_units = App\Models\DishesUnits::all();
		@endphp
	@endif
	@foreach($dish_units as $unit)
		@if(old('dish_unit_id') == $unit->id)
		<option value="{{$unit->id}}" selected>{{$unit->name}}</option>
		@elseif(isset($selected_id) && $selected_id == $unit->id)
		<option value="{{$unit->id}}" selected>{{$unit->name}}</option>
		@else
		<option value="{{$unit->id}}" >{{$unit->name}}</option>
		@endif

	@endforeach
</select>
