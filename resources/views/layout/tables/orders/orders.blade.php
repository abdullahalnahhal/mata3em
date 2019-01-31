@push('css')
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
@endpush
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example-no-pagination dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('orders.Order Number')</th>
                <th>@lang('orders.Client Name')</th>
                <th>@lang('orders.Dishes Number')</th>
                <th>@lang('orders.Order Price')</th>
                <th>@lang('orders.Delivery Date')</th>
                <th>@lang('orders.Delivery Time')</th>
                <th>@lang('common.Status')</th>
                <th>@lang('common.Actions')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('orders.Order Number')</th>
              <th>@lang('orders.Client Name')</th>
              <th>@lang('orders.Dishes Number')</th>
              <th>@lang('orders.Order Price')</th>
              <th>@lang('orders.Delivery Date')</th>
              <th>@lang('orders.Delivery Time')</th>
              <th>@lang('common.Status')</th>
              <th>@lang('common.Actions')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($orders as $order)
            <tr>
                @if($order->status->check('PRGRS'))
                <td class='bg-orange'>{{++$counter}}</td>
                @else
                <td>{{++$counter}}</td>
                @endif
                <td>{{$order->number}}</td>
                <td>{{$order->client->name}}</td>
                <td>{{$order->details->groupBy('dish_id')->count()}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->delivery_date}}</td>
                <td>{{$order->delivery_time}}</td>
                <td>{{$order->status->name}}</td>
                <td>
                  <a href="{{route('orders.orders.view', ['id' => $order->id])}}" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.View')">
                      <i class="material-icons">remove_red_eye</i>
                  </a>

                  @if($active == 'Orders')
                  <a href="{{route('orders.orders.edit', ['id' => $order->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('orders.orders.delete', ['id' => $order->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                  @if(!$order->status->check('PRGRS'))
                  <a href="{{route('orders.orders.cook', ['id' => $order->id])}}" class="btn bg-orange waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Cooking')">
                      <i class="material-icons">whatshot</i>
                  </a>
                  @endIf
                  <a href="{{route('orders.orders.deliver', ['id' => $order->id])}}" class="btn bg-deep-orange waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Deliver')">
                      <i class="material-icons">done_all</i>
                  </a>
                  @else
                  <a href="{{route('orders.orders.undeliver', ['id' => $order->id])}}" class="btn bg-deep-orange waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Deliver')">
                      <i class="material-icons">reply_all</i>
                  </a>
                  @endif
                  <a href="{{route('orders.orders.print', ['id' => $order->id])}}" class="btn bg-indigo waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Print')">
                      <i class="material-icons">print</i>
                  </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('modals')

<div class="modal fade in" id="search" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="defaultModalLabel">@lang('orders.Search Order')</h4>
            </div>
            <div class="modal-body">
                <form method='post' id='search-form' action='' autocomplete="false">
                    @csrf
                    <div class='row'>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" name='number' class="form-control" autocomplete="false">
                                    <label class="form-label">@lang('orders.Order Number')</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='client_phone' class="form-control" autocomplete="false">
                                    <label class="form-label">@lang('orders.Client Phone')</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='register_from' id='register_from' class="form-control datepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Register From')</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='register_to' id='register_to' class="form-control datepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Register To')</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='register_time_from' id='register_time_from' class="form-control timepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Register Time From')</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='register_tieme_to' id='register_tieme_to' class="form-control timepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Register Time To')</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='deliver_from' id='deliver_from' class="form-control datepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Deliver From')</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='deliver_to' id='deliver_to' class="form-control datepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Deliver To')</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='deliver_time_from' id='deliver_time_from' class="form-control timepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Deliver Time From')</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-6' >
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name='deliver_tieme_to' id='deliver_tieme_to' class="form-control timepicker" autocomplete="false">
                                    <label class="form-label">@lang('orders.Deliver Time To')</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($active == 'Orders')
                    <div class='row'>
                        <div class='col-xs-6' >
                            @include('layout.dropdown.orders.orders-status')
                        </div>
                    </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-link waves-effect command"  command='formSubmit' form='search-form'>@lang('common.Search')</button>
              <button href='javascript:void(0)' class="btn btn-link waves-effect" data-dismiss="modal">@lang('common.Cancel')</button>
            </div>
        </div>
    </div>
</div>

@endpush
@push('js')
<!-- Moment Plugin Js -->
<script src="{{asset('new/'.cLang().'/plugins/momentjs/moment.js')}}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{asset('new/'.cLang().'/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('new/'.cLang().'/js/pages/forms/basic-form-elements.js')}}"></script>
@endpush
