@extends('layout.main')
@section('title', trans('sidebar.Dishes'))
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-book-reader"></i> @lang('sidebar.Menue')</li>
    <li><a href="{{route('menue.dish-categories.index')}}"><i class="material-icons">room_service</i> @lang('sidebar.Dishes')</a></li>
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @if($action == 'New' || $action == 'New Dish')
                        @lang('menue.Create New Dish')
                    @elseif($action == 'Edit')
                        @lang('menue.Update Dish')
                    @endif
                </h2>
            </div>
            <div class="body">
                @if($action == 'New' || $action == 'New Dish')
                    @include('layout.forms.menue.create.dishes')
                @elseif($action == 'Edit')
                    @include('layout.forms.menue.update.dishes')
                @endif
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
@push('js')
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
