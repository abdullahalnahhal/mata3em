@extends('layout.main')
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('title', trans('sidebar.Accounting'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-file-invoice-dollar"></i> @lang('sidebar.Accounting')</li>
    @if($active == 'Petty Accounts')
    <li class="active"><i class="material-icons fas fa-pen-fancy"></i> @lang('sidebar.Petty Accounts')</li>
    @elseIf($active == 'Periodic Accounts')
    <li class="active"><i class="material-icons">cached</i> @lang('sidebar.Periodic Accounts')</li>
    @endif
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('sidebar.Accounting')
                </h2>
                @if($active == 'Petty Accounts')
                <a href='{{route("accounts.petty-accounts.new")}}' class="btn btn-success waves-effect pull-{{revFull()}}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('menue.Create New Category')">
                    <i class="material-icons">add</i>
                    <span>@lang('common.New')</span>
                </a>
                @elseIf($active == 'Periodic Accounts')
                <a href='{{route("accounts.periodic-accounts.new")}}' class="btn btn-success waves-effect pull-{{revFull()}}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('menue.Create New Category')">
                    <i class="material-icons">add</i>
                    <span>@lang('common.New')</span>
                </a>
                @endif
            </div>
            <div class="body">
              @include('layout.tables.accounts.petty-accounts')
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
