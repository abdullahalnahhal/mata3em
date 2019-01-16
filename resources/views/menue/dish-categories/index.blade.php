@extends('layout.main')
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('title', trans('sidebar.Dishes Categories'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li class="active"><i class="material-icons fas fa-book-reader"></i> @lang('sidebar.Menue')</li>
    <li class="active"><i class="material-icons">class</i> @lang('sidebar.Dishes Categories')</li>
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @lang('sidebar.Dishes Categories')
                </h2>
                <a href='{{route("menue.dish-categories.new")}}' class="btn btn-success waves-effect pull-{{revFull()}}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('menue.Create New Category')">
                    <i class="material-icons">add</i>
                    <span>@lang('common.New')</span>
                </a>
            </div>
            <div class="body">
              @include('layout.tables.menue.dish-categories')
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
