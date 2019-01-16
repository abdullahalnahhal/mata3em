<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example-no-pagination dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('clients.Client Name')</th>
                <th>@lang('clients.Client Telephone 1')</th>
                <th>@lang('clients.Client Telephone 2')</th>
                <th>@lang('clients.Client Address')</th>
                <!-- <th>@lang('common.Status')</th> -->
                <th>@lang('common.Actions')</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>#</th>
              <th>@lang('clients.Client Name')</th>
              <th>@lang('clients.Client Telephone 1')</th>
              <th>@lang('clients.Client Telephone 2')</th>
              <th>@lang('clients.Client Address')</th>
              <!-- <th>@lang('common.Status')</th> -->
              <th>@lang('common.Actions')</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $counter = 0;
            @endphp
            @foreach($clients as $client)
            <tr>
                <td>{{++$counter}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->tel1}}</td>
                <td>{{$client->tel2}}</td>
                <td>{{$client->address}}</td>
                <td>
                  <a href="{{route('clients.edit', ['id' => $client->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('clients.delete', ['id' => $client->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                  <a href="{{route('clients.make-order', ['id' => $client->id])}}" class="btn bg-purple waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Make Order')">
                      <i class="material-icons">add_circle</i>
                  </a>
                  <a href="{{route('clients.view', ['id' => $client->id])}}" class="btn bg-green waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.View')">
                      <i class="material-icons">remove_red_eye</i>
                  </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
