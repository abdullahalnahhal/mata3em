@extends('layout.main')
@section('title', trans('sidebar.Orders'))
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><a href="{{route('orders.orders.index')}}"><i class="material-icons fas fa-file-invoice"></i> @lang('sidebar.Orders')</a></li>
</ol>
<div class="row clearfix">
  @if($action == 'New')
    <div class="col-xs-6">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                  @lang('orders.Search For Client')
                </h2>
            </div>
            <div class="body" style='height:30em; overflow-y:auto;'>
                    @include('layout.forms.orders.create.orders')
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('orders.Search Result')
                </h2>
            </div>
            <div class="body table-responsive" style='height:30em; overflow-y:auto;'>
                <table class="table table-bordered table-striped table-hover js-basic-example-no-pagination dataTable">
                  <thead>
                    <tr>
                      <th>@lang('orders.Client Name')</th>
                      <th>@lang('orders.Client Phone')</th>
                      <th>@lang('orders.Client Address')</th>
                      <th>@lang('common.Actions')</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>@lang('orders.Client Name')</th>
                      <th>@lang('orders.Client Phone')</th>
                      <th>@lang('orders.Client Address')</th>
                      <th>@lang('common.Actions')</th>
                    </tr>
                  </tfoot>
                  <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
  @elseIf($action == 'Edit')
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('clients.Update Order')
                </h2>
            </div>
            <div class="body">
                @include('layout.forms.orders.update.edit-order')
            </div>
        </div>
    </div>
  @endif
</div>
@endsection
@push('js')
@if($action == 'New')
<script>
$("#name,#phone,#address").keyup(function(event) {
    formData = new FormData();
    formData.append("_token", '{{csrf_token()}}');
    formData.append("name", $("#name").val());
    formData.append("phone", $("#phone").val());
    formData.append("address", $("#address").val());

    server.call('post', '{{route('clients.search')}}', formData, function(data){
      table = js_basic_no_pagination;
        table.data = data;
        table.clear().draw();
        for(object in data)
        {
          button = "<a href='{{route('clients.make-order', ['id' => '%id%'])}}' class='btn bg-purple waves-effect' data-toggle='tooltip' data-placement='top' data-original-title='@lang('common.Make Order')'>"+
              "<i class='material-icons'>add_circle</i>"+
          "</a>";
          button = button.replace('%id%', data[object].id);
          table.row.add([
              data[object].name,
              data[object].tel1,
              data[object].address,
              button
          ]);
        }
        // table.rows.add(data);
        table.columns.adjust().draw();
    }, function(){}, function(){}, function(){});
});
</script>
@endif
@endpush
