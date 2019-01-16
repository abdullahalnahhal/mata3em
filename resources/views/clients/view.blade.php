@extends('layout.main')
@section('title', trans('sidebar.Dishes Categories'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><a href="{{route('clients.index')}}"><i class="material-icons">people</i> @lang('sidebar.Clients')</a></li>
    <li class='active'><i class="material-icons">person</i> {{$client->name}}</li>

</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    {{$client->name}}
                </h2>
                <span class='pull-{{revFull()}}'>
                  <a href="{{route('clients.make-order', ['id' => $client->id])}}" class="btn bg-purple waves-effect" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Make Order')">
                      <i class="material-icons">add_circle</i>
                  </a>
                  <a href="{{route('clients.edit', ['id' => $client->id])}}" class="btn bg-blue waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                      <i class="material-icons">edit</i>
                  </a>
                  <a href="{{route('clients.delete', ['id' => $client->id])}}" class="btn bg-red waves-effect"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                      <i class="material-icons">delete</i>
                  </a>
                </span>


            </div>
            <div class="body">
               <div class="row clearfix">
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('clients.Client Name')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$client->name }}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('clients.Client Telephone 1')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$client->tel1}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('clients.Client Telephone 2')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$client->tel2}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('clients.Client Address')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$client->address}}</div>
               </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
