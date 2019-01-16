@if(isset($extensions))
<select name="{{$name??'dish_category_id'}}"
id="{{$id??'dish_category_id'}}"
class='form-control {{$classes??''}}'
{{$required??''}}
@foreach($extensions as $key=>$extension)
{{$key}}='{{$extension}}'
@endforeach
>
@else
<select name="{{$name??'dish_category_id'}}" id="{{$id??'dish_category_id'}}" class='form-control show-tick {{$classes??""}}' data-live-search='true' {{$required??''}}>
@endif
	<option value=""></option>
	@if(!isset($dish_categories))
		@php
			$dish_categories = App\Models\DishCategories::all();
		@endphp
	@endif
	@foreach($dish_categories as $category)
		@if(old('dish_category_id') == $category->id)
		<option value="{{$category->id}}" selected>{{$category->name}}</option>
		@elseif(isset($selected_id) && $selected_id == $category->id)
		<option value="{{$category->id}}" selected>{{$category->name}}</option>
		@else
		<option value="{{$category->id}}" >{{$category->name}}</option>
		@endif

	@endforeach
</select>
