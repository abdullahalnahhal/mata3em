<form action="{{route('orders.orders.update',['id'=>$order->id])}}" method="post" accept-charset="utf-8" autocomplete="off">
  @csrf
  <div class='col-xs-12'>
      <div class="col-sm-4">
           <div class="form-group form-float ">
               <div class="form-line">
                   <br>
                   <input type="text" name='delivery_date' class="form-control datepicker" required aria-required="true" value='{{$order->delivery_date}}'>
                   <label class="form-label">@lang('clients.Delivery Date')</label>
               </div>
           </div>
       </div>
       <div class="col-sm-4">
          <div class="form-group form-float ">
              <div class="form-line">
                  <br>
                  <input type="text" name='delivery_time' class="form-control timepicker" required aria-required="true"  value='{{$order->delivery_time}}'>
                  <label class="form-label">@lang('clients.Delivery Time')</label>
              </div>
          </div>
      </div>
      <div class="col-sm-2">
          <br>
          <br>
          @if(!$order->is_delivery)
          <input type="checkbox" id="is_delivery" name="is_delivery" value='1' class="filled-in">
          @else
          <input type="checkbox" id="is_delivery" name="is_delivery" value='1' class="filled-in" checked>
          @endif
          <label for="is_delivery"><b>@lang('common.Is Delivery')</b></label>
      </div>
  </div>



  <ul class="nav nav-tabs tab-nav-right" role="tablist">
    @php
    $locker = true;
    @endphp
    @foreach($dish_categories as $category)
    @if($locker)
    <li role="presentation" class="active"><a href="#{{$category->shortcut}}-tap" data-toggle="tab" aria-expanded="false">{{$category->name}}</a></li>
    @php
    $locker = false;
    @endphp
    @else
    <li role="presentation"><a href="#{{$category->shortcut}}-tap" data-toggle="tab" aria-expanded="false">{{$category->name}}</a></li>
    @endif
    @endforeach
  </ul>
  <div class="tab-content">
  @php
  $locker = true;
  @endphp
  @foreach($dish_categories as $category)
    @if($locker)
    <div role="tabpanel" class="tab-pane animated fadeIn active" id="{{$category->shortcut}}-tap">
      <div class='table-responsive'>
          @include('layout.tables.menue.category-dishes')
      </div>
    </div>
    @php
    $locker = false;
    @endphp
    @else
    <div role="tabpanel" class="tab-pane animated fadeIn" id="{{$category->shortcut}}-tap">
      <div class='table-responsive'>
          @include('layout.tables.menue.category-dishes')
      </div>
    </div>
    @endif
  @endforeach
  </div>
  <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
      <i class="material-icons">save</i>
      <span>@lang('common.Save')</span>
  </button>
</form>
