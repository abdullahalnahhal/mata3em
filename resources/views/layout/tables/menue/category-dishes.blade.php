<table class="table table-striped">
  <tbody>
      @foreach($category->dishes as $dish)
      <tr class='text-center'>
          <td>
            <br>
            @if($action == 'Edit' && $order->details->where('dish_id', '=', $dish->id)->count())
            <input type="checkbox" name='dish[]' id="dish-{{$dish->id}}" class="filled-in chk-col-red" value="{{$dish->id}}" checked>
            @else
            <input type="checkbox" name='dish[]' id="dish-{{$dish->id}}" class="filled-in chk-col-red" value="{{$dish->id}}">
            @endIf
            <label for="dish-{{$dish->id}}"></label>
          </td>
          <td>
            <br>
            {{$dish->name}}
          </td>
            @if(isset($dish->price()->price) && $dish->price()->price)
            <td>
              {{$dish->price()->price}}
              <div class="col-sm-12">
                <div class="form-group form-float ">
                    <div class="form-line">
                        @if($action == 'Edit' && $order->details->where('dish_id', '=', $dish->id)->where('price', '=', $dish->price()->price)->first())

                        <input type="number" name='dish-{{$dish->id}}-price' class="form-control" step='0.00001' value='{{$order->details->where('dish_id', '=', $dish->id)->where('price', '=', $dish->price()->price)->first()->amount}}'>
                        @else
                        <input type="number" name='dish-{{$dish->id}}-price' class="form-control" step='0.00001' value='{{old('price')}}'>
                        @endIf
                        <label class="form-label">@lang('menue.Amount')</label>
                    </div>
                </div>
              </div>
            </td>
            @endif
            @if(isset($dish->price()->price2) && $dish->price()->price2)
            <td>
              {{$dish->price()->price2}}
              <div class="col-sm-12">
                <div class="form-group form-float ">
                    <div class="form-line">
                        @if($action == 'Edit' && $order->details->where('dish_id', '=', $dish->id)->where('price', '=', $dish->price()->price2)->first())
                        <input type="number" name='dish-{{$dish->id}}-price2' class="form-control" step='0.00001' value='{{$order->details->where('dish_id', '=', $dish->id)->where('price', '=', $dish->price()->price2)->first()->amount}}'>
                        @else
                        <input type="number" name='dish-{{$dish->id}}-price2' class="form-control" step='0.00001' value='{{old('price')}}'>
                        @endif
                        <label class="form-label">@lang('menue.Amount')</label>
                    </div>
                </div>
              </div>
            </td>
            @else
            <td></td>
            @endif
            @if(isset($dish->price()->price3) && $dish->price()->price3)

            <td>
              {{$dish->price()->price3}}
              <div class="col-sm-12">
                <div class="form-group form-float ">
                    <div class="form-line">
                        @if($action == 'Edit' && $order->details->where('dish_id', '=', $dish->id)->where('price', '=', $dish->price()->price3)->first())
                        <input type="number" name='dish-{{$dish->id}}-price3' class="form-control" step='0.00001' value='{{$order->details->where('dish_id', '=', $dish->id)->where('price', '=', $dish->price()->price2)->first()->amount}}'>
                        @else
                        <input type="number" name='dish-{{$dish->id}}-price3' class="form-control" step='0.00001' value='{{old('price')}}'>
                        @endif
                        <label class="form-label">@lang('menue.Amount')</label>
                    </div>
                </div>
              </div>
            </td>
            @else
            <td></td>
            @endif
      </tr>
      @endforeach
  </tbody>
</table>
