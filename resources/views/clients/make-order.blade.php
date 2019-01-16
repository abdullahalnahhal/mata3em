@extends('layout.main')
@section('title', trans('sidebar.Create New Order'))
@push('css')
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('new/'.cLang().'/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
@endpush
@section('content')
<ol class="breadcrumb breadcrumb-col-pink">
    <li><a href="{{route('index')}}"><i class="material-icons">home</i> @lang('sidebar.Home')</a></li>
    <li><a href="{{route('clients.index')}}"><i class="material-icons">people</i> @lang('sidebar.Clients')</a></li>
    <li class='active'><i class="material-icons">person</i> {{$client->name}}</li>
</ol>
<div class="row clearfix">
  <div class="card">
    <div class="header">
        <h2 style="display: inline-block;">
            @if($action == 'New')
                @lang('clients.Create New Order')
            @endif
        </h2>
    </div>
    <div class='body tab-col-pink' >
      @if($action == 'New')
          @include('layout.forms.orders.create.add-order')
      @endif
    </div>
  </div>
</div>
@endsection
@push('js')
<!-- Moment Plugin Js -->
<script src="{{asset('new/'.cLang().'/plugins/momentjs/moment.js')}}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{asset('new/'.cLang().'/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('new/'.cLang().'/js/pages/forms/basic-form-elements.js')}}"></script>
@endpush
