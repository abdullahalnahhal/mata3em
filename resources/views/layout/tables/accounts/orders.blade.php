<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('accounts.Title')</th>
                <th>@lang('accounts.Price')</th>
                <th>@lang('accounts.Quantity')</th>
                <th>@lang('accounts.Total')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('accounts.Title')</th>
              <th>@lang('accounts.Price')</th>
              <th>@lang('accounts.Quantity')</th>
              <th>@lang('accounts.Total')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($orders as $order)
                @foreach($order->details as $detail)
                <tr>
                    <td>{{++$counter}}</td>
                    <td>{{$detail->dish->name}}</td>
                    <td>{{$detail->price}}</td>
                    <td>{{$detail->amount}}</td>
                    <td>{{$detail->amount * $detail->price}}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
