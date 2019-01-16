@extends('layout.main')
@section('title', trans('sidebar.Dishes Categories'))
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
  <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
  <li><i class="material-icons fas fa-file-invoice-dollar"></i> @lang('sidebar.Accounting')</li>
  @if($active == 'Petty Accounts')
  <li class="active"><a href="{{route('accounts.petty-accounts.index')}}"><i class="material-icons fas fa-pen-fancy"></i> @lang('sidebar.Petty Accounts')</a></li>
  @elseIf($active == 'Periodic Accounts')
  <li class="active"><a href="{{route('accounts.periodic-accounts.index')}}"><i class="material-icons">cached</i> @lang('sidebar.Periodic Accounts')</a></li>
  @endif
</ol>
<div class="row clearfix">
    <!-- Basic Examples -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    {{$account->name}}
                </h2>
                @if($active == 'Petty Accounts')
                <a href="{{route('accounts.petty-accounts.delete', ['id' => $account->id])}}" class="btn bg-red waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                    <i class="material-icons">delete</i>
                </a>
                <a href="{{route('accounts.petty-accounts.edit', ['id' => $account->id])}}" class="btn bg-blue waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                    <i class="material-icons">edit</i>
                </a>
                @elseIf($active == 'Periodic Accounts')
                <a href="{{route('accounts.periodic-accounts.delete', ['id' => $account->id])}}" class="btn bg-red waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Delete')">
                    <i class="material-icons">delete</i>
                </a>
                <a href="{{route('accounts.periodic-accounts.edit', ['id' => $account->id])}}" class="btn bg-blue waves-effect pull-{{revFull()}}"  data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.Edit')">
                    <i class="material-icons">edit</i>
                </a>
                @endif
            </div>
            <div class="body">
               <div class="row clearfix">
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('accounts.Title')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$account->title }}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('accounts.Description')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$account->description}}</div>
                   <div class="col-sm-2 col-xs-3 bg-grey" ><b>@lang('accounts.Amount')</b></div>
                   <div class="col-sm-2 col-xs-3" >{{$account->amount}}</div>
               </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
