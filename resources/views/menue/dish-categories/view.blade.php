@extends('layout.main')
@section('title', trans('sidebar.Dishes Categories'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li class="active"><i class="material-icons fas fa-book-reader"></i> @lang('sidebar.Menue')</li>
    <li><a href="{{route('index')}}"><i class="material-icons">class</i> @lang('sidebar.Dishes Categories')</a></li>
    <li><i class="material-icons fas fa-utensils"></i> {{$category->name}}</li>

</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    {{$category->name}}
                </h2>
                <a href="{{route('menue.dish-categories.delete', ['id' => $category->id])}}" class="btn bg-red waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                    <i class="material-icons">delete</i>
                </a>
                <a href="{{route('menue.dish-categories.edit', ['id' => $category->id])}}" class="btn bg-blue waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                    <i class="material-icons">edit</i>
                </a>
            </div>
            <div class="body">
               <div class="row clearfix">
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Category Name')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$category->name }}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Category Shortcut')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$category->shortcut}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('common.Status')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{status($category->status)}}</div>
               </div>
               <hr>
               <div class="row clearfix">
                  @include('layout.tables.menue.dishes', ['dishes'=>$category->dishes])
               </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
