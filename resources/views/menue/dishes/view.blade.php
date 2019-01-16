@extends('layout.main')
@section('title', trans('sidebar.Dishes'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><i class="material-icons fas fa-book-reader"></i> @lang('sidebar.Menue')</li>
    <li><a href="{{route('menue.dishes.index')}}"><i class="material-icons">room_service</i> @lang('sidebar.Dishes')</a></li>
    <li class="active"><i class="material-icons">local_dining</i> {{$dish->name}}</li>

</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    {{$dish->name}}
                </h2>
                <a href="{{route('menue.dishes.delete', ['id' => $dish->id])}}" class="btn bg-red waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                    <i class="material-icons">delete</i>
                </a>
                <a href="{{route('menue.dishes.edit', ['id' => $dish->id])}}" class="btn bg-blue waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                    <i class="material-icons">edit</i>
                </a>
            </div>
            <div class="body">
               <div class="row clearfix">
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Name')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$dish->name }}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Category Name')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$dish->category->name}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Unit Name')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$dish->unit->name}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Dish Price')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$dish->price()?$dish->price()->price:0}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Dish Amount')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$dish->amount()?$dish->amount()->total:0}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Daily Changable Price')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{status($dish->changable)}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('common.Status')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{status($dish->status)}}</div>
               </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
