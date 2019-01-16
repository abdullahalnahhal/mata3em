<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example-no-pagination dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('accounts.Title')</th>
                <th>@lang('accounts.Amount')</th>
                <th>@lang('common.Actions')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('accounts.Title')</th>
              <th>@lang('accounts.Amount')</th>
              <th>@lang('common.Actions')</th>
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
                <td>
                  @if($active == 'Petty Accounts')
                  <a href="{{route('accounts.petty-accounts.edit', ['id' => $account->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('accounts.petty-accounts.delete', ['id' => $account->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                  <a href="{{route('accounts.petty-accounts.view', ['id' => $account->id])}}" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.View')">
                      <i class="material-icons">remove_red_eye</i>
                  </a>
                  @elseIf($active == 'Periodic Accounts')
                  <a href="{{route('accounts.periodic-accounts.edit', ['id' => $account->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('accounts.periodic-accounts.delete', ['id' => $account->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                  <a href="{{route('accounts.periodic-accounts.view', ['id' => $account->id])}}" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.View')">
                      <i class="material-icons">remove_red_eye</i>
                  </a>
                  @endIf
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
