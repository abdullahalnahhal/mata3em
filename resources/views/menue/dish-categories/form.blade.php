@extends('layout.main')
@section('title', trans('sidebar.Dishes Categories'))
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-book-reader"></i> @lang('sidebar.Menue')</li>
    <li><a href="{{route('menue.dish-categories.index')}}"><i class="material-icons">class</i> @lang('sidebar.Dishes Categories')</a></li>
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    @if($action == 'New')
                        @lang('menue.Create New Category')
                    @elseif($action == 'Edit')
                        @lang('menue.Update Category')
                    @endif
                </h2>
            </div>
            <div class="body">
                @if($action == 'New')
                    @include('layout.forms.menue.create.dish-category')
                @elseif($action == 'Edit')
                    @include('layout.forms.menue.update.dish-category')
                @endif
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
