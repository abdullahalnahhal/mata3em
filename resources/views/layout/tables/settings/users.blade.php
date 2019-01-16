<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('settings.User Name')</th>
                <th>@lang('settings.User Login Name')</th>
                <th>@lang('common.Actions')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('settings.User Name')</th>
              <th>@lang('settings.User Login Name')</th>
              <th>@lang('common.Actions')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($users as $user)
            <tr>
                <td>{{++$counter}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  <a href="{{route('settings.users.edit', ['id' => $user->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('settings.users.delete', ['id' => $user->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
