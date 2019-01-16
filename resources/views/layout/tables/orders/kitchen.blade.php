<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example-no-pagination dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('orders.Dish')</th>
                <th>@lang('orders.Amount')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('orders.Dish')</th>
              <th>@lang('orders.Amount')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($dishes as $dish)
            @php
              $amount = $dish->order_details
                  ->where(
                      'updated_at',
                      '>=',
                      Illuminate\Support\Carbon::today()->format('Y-m-d H:i:s')
                  )
                  ->where(
                      'updated_at',
                      '<=',
                      Illuminate\Support\Carbon::today()->format('Y-m-d'.' 23:59:59')
                  )
                  ->where('status_id')
                  ->pluck('amount')
                  ->sum()
            @endphp
            @if($amount)
            <tr>
                <td>{{++$counter}}</td>
                <td>{{$dish->name}}</td>
                <td>{{$amount}}</td>
            </tr>
            @endIf
            @endforeach
        </tbody>
    </table>
</div>
