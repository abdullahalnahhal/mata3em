@extends('layout.main')
@section('title', trans('sidebar.Home'))
@section('content')
<div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-orange hover-zoom-effect hover-expand-effect">
          <div class="icon">
              <i class="material-icons fas fa-file-invoice"></i>
          </div>
          <div class="content">
              <div class="text">@lang('home.New Orders')</div>
              <div class="number count-to" data-from="0" data-to="{{$new_orders}}" data-speed="1000" data-fresh-interval="20">{{$new_orders}}</div>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-light-green hover-zoom-effect hover-expand-effect">
          <div class="icon">
              <i class="material-icons fas fa-hands"></i>
          </div>
          <div class="content">
              <div class="text">@lang('home.Delivered Orders')</div>
              <div class="number count-to" data-from="0" data-to="{{$delivered_orders}}" data-speed="1000" data-fresh-interval="20">{{$delivered_orders}}</div>
          </div>
      </div>
  </div>
  <a href='{{route('orders.orders.new')}}' class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box-3 bg-indigo hover-zoom-effect">
          <div class="icon">
              <i class="material-icons">add</i>
          </div>
          <div class="content">
              <div class="text">@lang('home.Orders')</div>
              <div class="number">@lang('home.New Order')</div>
          </div>
      </div>
  </a>
</div>

@endsection
