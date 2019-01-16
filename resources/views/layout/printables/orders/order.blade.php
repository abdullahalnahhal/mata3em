<div class="table-responsive bordered">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('orders.Dish Name')</th>
                <th>@lang('orders.Dish Price')</th>
                <th>@lang('orders.Amount')</th>
            </tr>
        </thead>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
