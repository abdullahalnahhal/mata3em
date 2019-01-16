@extends('layout.main')
@section('title', trans('sidebar.Orders'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li class="active"><i class="material-icons fas fa-file-invoice"></i> @lang('sidebar.Orders')</li>
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    {{$order->number}}
                </h2>
                <a href="{{route('orders.orders.delete', ['id' => $order->id])}}" class="btn bg-red waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                    <i class="material-icons">delete</i>
                </a>
                <a href="{{route('orders.orders.edit', ['id' => $order->id])}}" class="btn bg-blue waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                    <i class="material-icons">edit</i>
                </a>
            </div>
            <div class="body">
              <div class="row clearfix">
                <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('orders.Client Name')</b></div>
                <div class="col-sm-2 col-xs-3" >{{$order->client->name }}</div>
                <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('orders.Order Price')</b></div>
                <div class="col-sm-2 col-xs-3" >{{$order->price}}</div>
                <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('orders.Delivery Date')</b></div>
                <div class="col-sm-2 col-xs-3" >{{$order->delivery_date}}</div>
                <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('orders.Delivery Time')</b></div>
                <div class="col-sm-2 col-xs-3" >{{$order->delivery_time}}</div>
                <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('common.Status')</b></div>
                <div class="col-sm-2 col-xs-3" >{{$order->status->name}}</div>
              </div>
              <hr>
              <div class="row clearfix">
                @include('layout.tables.orders.details', ['details'=>$order->details])
              </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
