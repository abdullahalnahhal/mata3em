<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example-no-pagination dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('orders.Dish Name')</th>
                <th>@lang('orders.Dish Price')</th>
                <th>@lang('orders.Amount')</th>
                <th>@lang('common.Status')</th>
                <!-- <th>@lang('common.Actions')</th> -->
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('orders.Dish Name')</th>
              <th>@lang('orders.Dish Price')</th>
              <th>@lang('orders.Amount')</th>
              <th>@lang('common.Status')</th>
              <!-- <th>@lang('common.Actions')</th> -->
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($details as $detail)
            <tr>
                <td>{{++$counter}}</td>
                <td>{{$detail->dish->name}}</td>
                <td>{{$detail->price}}</td>
                <td>{{$detail->amount}}</td>
                <td>{{$detail->status->name}}</td>
                <!-- <td>
                  <a href="{{route('orders.orders.edit', ['id' => $order->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('orders.orders.delete', ['id' => $order->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                  <a href="{{route('clients.make-order', ['id' => $order->id])}}" class="btn bg-purple waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Make Order')">
                      <i class="material-icons">add_circle</i>
                  </a>
                  <a href="{{route('orders.orders.view', ['id' => $order->id])}}" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.View')">
                      <i class="material-icons">remove_red_eye</i>
                  </a>
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
