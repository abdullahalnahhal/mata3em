<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover ">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('accounts.Title')</th>
                <th>@lang('accounts.Amount')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('accounts.Title')</th>
              <th>@lang('accounts.Amount')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($accounts as $account)
            <tr>
                <td>{{++$counter}}</td>
                <td>{{$account->title}}</td>
                <td>{{$account->amount}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
