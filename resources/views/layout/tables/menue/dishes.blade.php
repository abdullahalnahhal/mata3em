<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('menue.Name')</th>
                <th>@lang('menue.Category')</th>
                <th>@lang('menue.Unit')</th>
                <th>@lang('menue.Price')</th>
                <th>@lang('menue.Amount')</th>
                <th>@lang('common.Status')</th>
                <th>@lang('common.Actions')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('menue.Dish Name')</th>
              <th>@lang('menue.Category')</th>
              <th>@lang('menue.Unit')</th>
              <th>@lang('menue.Price')</th>
              <th>@lang('menue.Amount')</th>
              <th>@lang('common.Status')</th>
              <th>@lang('common.Actions')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($dishes as $dish)
            <tr>
                <td>{{++$counter}}</td>
                <td>{{$dish->name}}</td>
                <td>{{$dish->category->name}}</td>
                <td>{{$dish->unit->name}}</td>
                <td>
                  {{$dish->price()->price??0}}
                  @if(isset($dish->price()->price2) && $dish->price()->price2)
                  - {{$dish->price()->price2}}
                  @endif
                  @if(isset($dish->price()->price3) && $dish->price()->price3)
                  - {{$dish->price()->price3}}
                  @endif
                </td>
                <td>{{$dish->amount()->total??0}}</td>
                <td>{{status($dish->status)}}</td>
                <td>
                  <button class="btn bg-purple waves-effect command" command='modal' modal='edit-price' info='{"action":"{{route('menue.dishes.edit-price', ['id'=> $dish->id])}}" }'  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit Price')">
                      <i class="material-icons fas fa-hand-holding-usd"></i>
                  </button>
                  <button class="btn bg-deep-orange waves-effect command" command='modal' modal='add-amount' info='{"action":"{{route('menue.dishes.add-amount', ['id'=> $dish->id])}}" }'  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Add Amount')">
                      <i class="material-icons">add</i>
                  </button>
                  <a href="{{route('menue.dishes.edit', ['id' => $dish->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('menue.dishes.delete', ['id' => $dish->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                  <a href="{{route('menue.dishes.view', ['id' => $dish->id])}}" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.View')">
                      <i class="material-icons">remove_red_eye</i>
                  </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('modals')
<div class="modal fade" id="add-amount" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class='modal-body'>
              <form method='post' id='add-amount-form' action=''>
                  @csrf
                  <div class='col-xs-12' >
                      <h3 class='text-center'>@lang('menue.Add Amount')</h3>
                      <div class="form-group form-float form-group-lg">
                          <div class="form-line">
                              <br>
                              <input type="number" name='amount' class="form-control" placeholder="@lang('menue.Add Amount')" step='.00001' required>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
          <div class='modal-footer'>
              <button class="btn btn-link waves-effect command"  command='formSubmit' form='add-amount-form'>@lang('common.Submit')</button>
              <button href='javascript:void(0)' class="btn btn-link waves-effect" data-dismiss="modal">@lang('common.Cancel')</button>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-price" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class='modal-body'>
              <form method='post' id='edit-price-form' action=''>
                  @csrf
                  <div class='col-xs-12' >
                      <h3 class='text-center'>@lang('menue.Edit Price')</h3>
                      <div class="form-group form-float form-group-lg">
                          <div class="form-line">
                              <br>
                              <input type="number" name='price' class="form-control" placeholder="@lang('menue.Edit Price') 1" step='.00001'>
                          </div>
                      </div>
                  </div>
                  <div class='col-xs-12' >
                      <div class="form-group form-float form-group-lg">
                          <div class="form-line">
                              <br>
                              <input type="number" name='price2' class="form-control" placeholder="@lang('menue.Edit Price') 2" step='.00001'>
                          </div>
                      </div>
                  </div>
                  <div class='col-xs-12' >
                      <div class="form-group form-float form-group-lg">
                          <div class="form-line">
                              <br>
                              <input type="number" name='price3' class="form-control" placeholder="@lang('menue.Edit Price') 3" step='.00001'>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
          <div class='modal-footer'>
              <button class="btn btn-link waves-effect command"  command='formSubmit' form='edit-price-form'>@lang('common.Submit')</button>
              <button href='javascript:void(0)' class="btn btn-link waves-effect" data-dismiss="modal">@lang('common.Cancel')</button>
          </div>
        </div>
    </div>
</div>
@endpush
