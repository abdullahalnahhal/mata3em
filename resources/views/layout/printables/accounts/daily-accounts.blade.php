<div class="row clearfix">
    @if(count($petties))
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('accounts.Expenses')
                </h2>
                <h2 style="display: inline-block;" class='pull-{{revFull()}}'>
                    {{$petties->pluck('amount')->sum()}}
                </h2>
            </div>
            <div class="body">
              <pre class='text-center'>
                  @lang('sidebar.Petty Accounts')
              </pre>
              @include('layout.tables.accounts.expenses', ['accounts' => $petties])
            </div>
        </div>
    </div>
    @endIf
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('accounts.Earnings')
                </h2>
                <h2 style="display: inline-block;" class='pull-{{revFull()}}'>
                    {{$orders->pluck('price')->sum()}}
                </h2>
            </div>
            <div class="body">
                <pre class='text-center'>
                    @lang('sidebar.Orders')
                </pre>
                @include('layout.tables.accounts.orders', ['orders' => $orders])
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('accounts.Total')
                </h2>
                <h2 style="display: inline-block;" class='pull-{{revFull()}}'>
                    {{$orders->pluck('price')->sum() - $petties->pluck('amount')->sum()}}
                </h2>
            </div>
        </div>
    </div>
</div>
