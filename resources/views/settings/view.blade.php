@extends('layout.main')
@if($active == 'General Data')
  @section('title', trans('sidebar.General Data'))
@elseif($active == 'Bill Settings')
  @section('title', trans('sidebar.Bill Settings'))
@elseif($active == 'Users')
  @section('title', trans('sidebar.Users'))
@endif
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
  <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
  <li><i class="material-icons">settings</i> @lang('sidebar.Settings')</li>
  @if($active == 'Gneral Data')
  <li class='active'><i class="material-icons fas fa-asterisk"></i> @lang('sidebar.General Data')</li>
  @elseif($active == 'Bill Settings')
  <li class='active'><i class="material-icons fas fa-scroll"></i> @lang('sidebar.Bill Settings')</li>
  @elseif($active == 'Users')
  <li><a href='{{route('settings.users.index')}}'><i class="material-icons">people</i> @lang('sidebar.Users')</a></li>
  @endif
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    {{$user->name}}
                </h2>
                <a href="{{route('menue.dish-categories.delete', ['id' => $user->id])}}" class="btn bg-red waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                    <i class="material-icons">delete</i>
                </a>
                <a href="{{route('menue.dish-categories.edit', ['id' => $user->id])}}" class="btn bg-blue waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                    <i class="material-icons">edit</i>
                </a>
            </div>
            <div class="body">
               <div class="row clearfix">
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Category Name')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$user->name }}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('menue.Category Shortcut')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$user->shortcut}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('common.Status')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{status($user->status)}}</div>
               </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
