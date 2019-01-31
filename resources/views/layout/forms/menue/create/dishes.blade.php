<form action="{{lRoute('menue.dishes.create')}}" method="post" accept-charset="utf-8" autocomplete="off">
    @csrf
    <div class="row clearfix">
        <div class="col-sm-4">
            <div class="form-group form-float ">
                <div class="form-line">
                    <br>
                    <input type="text" name='name' class="form-control" required aria-required="true" maxlength='200' value='{{old('name')}}'>
                    <label class="form-label">@lang('menue.Dish Name')</label>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <p>
                <b>@lang('menue.Category')</b>
            </p>
            <input type='hidden' name='dish_category_id' value='{{$cat_id}}'>
            @if($action == 'New Dish')
                @include('layout.dropdown.menue.dish-categories',[
                  'selected_id' => $cat_id,
                  'extensions'=>[
                    'disabled' => '',
                  ]
                ])
            @else
                @include('layout.dropdown.menue.dish-categories')
            @endif
        </div>
        <div class="col-md-4">
            <p>
                <b>@lang('menue.Unit')</b>
            </p>
            @include('layout.dropdown.menue.dishes-units')
        </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-4">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='price' class="form-control" required aria-required="true" step='0.00001' value='{{old('price')}}'>
                  <label class="form-label">@lang('menue.Dish Price 1')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='price2' class="form-control" required aria-required="true" step='0.00001' value='{{old('price2')}}'>
                  <label class="form-label">@lang('menue.Dish Price 2')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='price3' class="form-control" required aria-required="true" step='0.00001' value='{{old('price3')}}'>
                  <label class="form-label">@lang('menue.Dish Price 3')</label>
              </div>
          </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-4">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="number" name='amount' class="form-control" required aria-required="true" step='0.00001' value='{{old('amount')}}'>
                  <label class="form-label">@lang('menue.Dish Amount')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-2">
          <br>
          <br>
          @if(!old('status'))
          <input type="checkbox" id="status" name="status" value='1' class="filled-in">
          @else
          <input type="checkbox" id="status" name="status" value='1' class="filled-in" checked>
          @endif
          <label for="status"><b>@lang('common.Status')</b></label>
      </div>
      <div class="col-sm-2">
          <br>
          <br>
          @if(!old('changable'))
          <input type="checkbox" id="changable" name="changable" value='1' class="filled-in">
          @else
          <input type="checkbox" id="changable" name="changable" value='1' class="filled-in" checked>
          @endif
          <label for="changable"><b>@lang('menue.Daily Changable Price')</b></label>
      </div>
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
        <i class="material-icons">save</i>
        <span>@lang('common.Save')</span>
    </button>
</form>
