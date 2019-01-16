@extends('layout.main')
@if($active == 'General Data')
  @section('title', trans('sidebar.General Data'))
@elseif($active == 'Bill Settings')
  @section('title', trans('sidebar.Bill Settings'))
@elseif($active == 'Users')
  @section('title', trans('sidebar.Users'))
@endif
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons">settings</i> @lang('sidebar.Settings')</li>
    @if($active == 'Gneral Data')
    <li class='active'><i class="material-icons fas fa-asterisk"></i> @lang('sidebar.General Data')</li>
    @elseif($active == 'Bill Settings')
    <li class='active'><i class="material-icons fas fa-scroll"></i> @lang('sidebar.Bill Settings')</li>
    @elseif($active == 'Users')
    <li><a href='{{route('settings.users.index')}}'><i class="material-icons">people</i> @lang('sidebar.Users')</a></li>
    @endif
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @if($active == 'General Data')
                        @lang('sidebar.General Data')
                    @elseif($active == 'Bill Settings')
                        @lang('sidebar.Bill Settings')
                    @elseif($active == 'Users')
                        @lang('sidebar.Users')
                    @endif
                </h2>
            </div>
            <div class="body">
                @if($active == 'General Data')
                    @include('layout.forms.settings.create.general-data')
                @elseif($active == 'Bill Settings')
                    @include('layout.forms.settings.create.bill')
                @elseif($active == 'Users' && $action == 'New')
                    @include('layout.forms.settings.create.users')
                @elseif($active == 'Users' && $action == 'Edit')
                        @include('layout.forms.settings.update.users')
                @endif
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
