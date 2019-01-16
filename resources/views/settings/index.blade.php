@extends('layout.main')
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('title', trans('sidebar.Users'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-file-invoice-dollar"></i> @lang('sidebar.Settings')</li>
    @if($active == 'Users')
    <li class="active"><i class="material-icons">people</i> @lang('sidebar.Users')</li>
    @endif
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('sidebar.Users')
                </h2>
                @if($active == 'Users')
                <a href='{{route("settings.users.new")}}' class="btn btn-success waves-effect pull-{{revFull()}}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Create New User')">
                    <i class="material-icons">add</i>
                    <span>@lang('common.New')</span>
                </a>
                @endif
            </div>
            <div class="body">
              @if($active == 'Users')
                  @include('layout.tables.settings.users')
              @endif
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
