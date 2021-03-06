@extends('layout.main')
@section('title', trans('sidebar.Dishes Units'))
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-book-reader"></i> @lang('sidebar.Menue')</li>
    <li><a href="{{route('menue.dishes-units.index')}}"><i class="material-icons">layers</i> @lang('sidebar.Dishes Units')</a></li>
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @if($action == 'New')
                        @lang('menue.Create New Dish Unit')
                    @elseif($action == 'Edit')
                        @lang('menue.Update Dish Unit')
                    @endif
                </h2>
            </div>
            <div class="body">
                @if($action == 'New')
                    @include('layout.forms.menue.create.dishes-units')
                @elseif($action == 'Edit')
                    @include('layout.forms.menue.update.dishes-units')
                @endif
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
