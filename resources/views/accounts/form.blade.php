@extends('layout.main')
@section('title', trans('sidebar.Dishes Categories'))
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-file-invoice-dollar"></i> @lang('sidebar.Accounting')</li>
    @if($active == 'Petty Accounts')
    <li class="active"><a href="{{route('accounts.petty-accounts.index')}}"><i class="material-icons fas fa-pen-fancy"></i> @lang('sidebar.Petty Accounts')</a></li>
    @elseIf($active == 'Periodic Accounts')
    <li class="active"><a href="{{route('accounts.periodic-accounts.index')}}"><i class="material-icons">cached</i> @lang('sidebar.Periodic Accounts')</a></li>
    @endif
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @if($active == 'Petty Accounts' && $action == 'New')
                        @lang('accounts.Create New Petty Account')
                    @elseIf($active == 'Periodic Accounts' && $action == 'New')
                        @lang('accounts.Create New Periodic Account')
                    @elseif($active == 'Petty Accounts' && $action == 'Edit')
                        @lang('accounts.Update Petty Account')
                    @elseIf($active == 'Periodic Accounts' && $action == 'New')
                        @lang('accounts.Update Periodic Account')
                    @endif
                </h2>
            </div>
            <div class="body">
                @if(($active == 'Petty Accounts' || $active == 'Periodic Accounts') && $action == 'New')
                    @include('layout.forms.accounts.create.petty-accounts')
                @elseif($active == 'Petty Accounts' && $action == 'Edit')
                    @include('layout.forms.accounts.update.petty-accounts')
                @endif
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
