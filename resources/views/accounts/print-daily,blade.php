@extends('layout.main')
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
@endpush
@section('title', trans('sidebar.Accounting'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-file-invoice-dollar"></i> @lang('sidebar.Accounting')</li>
    @if($active == 'Daily Accounts')
    <li class="active"><i class="material-icons">monetization_on</i> @lang('sidebar.Daily Accounts')</li>
    @elseIf($active == 'Accounts By Duration')
    <li class="active"><i class="material-icons">date_range</i> @lang('sidebar.Accounts By Duration')</li>
    @endif
</ol>
<a class="btn bg-purple waves-effect" href='{{route('accounts.print')}}'>
    <i class="material-icons">print</i>
    <span>@lang('common.Print')</span>
</a>
<br>
<br>

@if($active == 'Accounts By Duration' )
<div class="row clearfix">
  <div class="col-xs-12">
      <div class="card">
        <div class='body'>
          <div class='row'>
              <form action="{{route('accounts.search')}}" method="post" accept-charset="utf-8" autocomplete="off">
                @csrf
                  <div class="col-sm-4">
                      <div class="form-group form-float ">
                          <div class="form-line">
                              <input type="text" name='from' class="form-control datepicker" required aria-required="true" value='{{old('from')}}'>
                              <label class="form-label">@lang('accounts.From')</label>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group form-float ">
                        <div class="form-line">
                            <input type="text" name='to' class="form-control datepicker" required aria-required="true" value='{{old('to')}}'>
                            <label class="form-label">@lang('accounts.To')</label>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
              <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
                  <i class="material-icons">search</i>
                  <span>@lang('common.Search')</span>
              </button>
            </div>
              </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endIf
<div class="row clearfix">
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
@endsection
@push('js')
<!-- Moment Plugin Js -->
<script src="{{asset('new/'.cLang().'/plugins/momentjs/moment.js')}}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{asset('new/'.cLang().'/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('new/'.cLang().'/js/pages/forms/basic-form-elements.js')}}"></script>
@endpush
