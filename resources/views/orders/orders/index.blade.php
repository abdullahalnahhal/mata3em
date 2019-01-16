@extends('layout.main')
@push('css')
<link href="{{asset('new/'.cLang().'/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('title', trans('sidebar.Orders'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    @if($active == 'Orders')
    <li class="active"><i class="material-icons fas fa-file-invoice"></i> @lang('sidebar.Orders')</li>
    @else
    <li><a href="{{route('orders.orders.index')}}"><i class="material-icons fas fa-file-invoice"></i> @lang('sidebar.Orders')</a></li>
    @endif
    @if($active == 'Delivered Orders')
    <li class="active"><i class="material-icons fas fa-hands"></i> @lang('sidebar.Delivered Orders')</li>
    @elseIf($active == 'Kitchen Orders')
    <li class="active"><i class="material-icons">kitchen</i> @lang('sidebar.Kitchen Orders')</li>
    @endif
</ol>
<div class="row clearfix">
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                  @if($active == 'Orders')
                    @lang('sidebar.Orders')
                  @elseIf($active == 'Delivered Orders')
                    @lang('sidebar.Delivered Orders')
                  @elseIf($active == 'Kitchen Orders')
                    @lang('sidebar.Kitchen Orders')
                  @endif
                </h2>
                @if($active == 'Orders')
                <sapn class='pull-{{revFull()}}'>
                  <a href='{{route("orders.orders.new")}}' class="btn btn-success waves-effect " data-toggle="tooltip" data-placement="top" data-original-title="@lang('menue.Create New Category')">
                      <i class="material-icons">add</i>
                      <span>@lang('common.New')</span>
                  </a>

                  <button class="btn bg-light-blue waves-effect command" command='modal' modal='search'  info='{"action":"{{route('orders.orders.filter')}}"}' data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Search')">
                      <i class="material-icons">search</i>
                      <span>@lang('common.Search')</span>
                  </button>
                </span>
                @endif
            </div>
            <div class="body">
              @if($active == 'Kitchen Orders')
                  @include('layout.tables.orders.kitchen')
              @else
                  @include('layout.tables.orders.orders')
              @endif
            </div>
        </div>
    </div>
</div>
@endsection
