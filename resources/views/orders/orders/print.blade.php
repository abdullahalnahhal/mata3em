<!DOCTYPE html>
<html dir='{{direction()}}'>
<head dir='{{direction()}}'>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.head')
	<title>@yield('title')</title>
	<style>

      @media print {
				@page{
					size:portrait A5;
					@if(isset($bill_settings['page_width']) && $bill_settings['page_width'])
					width:$bill_settings['page_width'] cm;
					@endIf
					@if(isset($bill_settings['padding_width']) && $bill_settings['padding_width'])
					margin-left:$bill_settings['padding_width'] cm;
					margin-right:$bill_settings['padding_width'] cm;
					margin-top:0.2 cm;
					margin-bottom:0.2 cm;
					@endIf
					@footnote {
				    border-top: 0.6pt solid black;
				    padding-top: 8pt;
				  }

				}
        .page-break {page-break-inside: avoid; page-break-before: always;}
      }

      .bordered{
        padding:1em;
        border-radius:1rem;
        border:solid 1px;
        margin-top:.5rem;
      }
  </style>
</head>
<body class="theme-red" dir='{{direction()}}'>
	@if(isset($bill_settings['barcode']))
	<div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>
      <div class='col-xs-6'>
          {{$order->number}}
      </div>
      <div class='col-xs-6' id='barcode'>
      </div>
    </div>
  </div>
	@else
	<div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>
      {{$order->number}}
    </div>
  </div>
	@endif

  <div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center' dir='ltr'>{{Illuminate\Support\Carbon::now()}}</div>
  </div>

  <div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>{{$order->client->name}}</div>

  </div>
  <div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>
      {{$order->client->tel1}}
      @if($order->client->tel2)
      - {{$order->client->tel2}}
      @endif
    </div>
  </div>
  <div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>
      {{$order->client->address}}
    </div>
  </div>

  @include('layout.printables.orders.order', ['details'=>$order->details])
	@if($order->is_delivery)
	<div class='row' dir='{{direction()}}'>
			<div class='col-xs-3'></div>
      <div class='bordered col-xs-6 text-right'>
          @lang('accounts.Delivery Service') : {{$bill_settings['delivery']??0}}
      </div>
  </div>
	@endif
	@php
		$taxes = ((isset($bill_settings['tax_percentage']))?$order->price * $bill_settings['tax_percentage'] / 100 : 0) + $bill_settings['tax_value']??0
	@endphp
	<div class='row' dir='{{direction()}}'>
			<div class='col-xs-3'></div>
      <div class='bordered col-xs-6 text-right'>
          @lang('accounts.Taxes') : {{$taxes}}
      </div>
  </div>
	<div class='row' dir='{{direction()}}'>
			<div class='col-xs-3'></div>
			<div class='bordered col-xs-6 text-right'>
					@lang('accounts.Total') : {{$order->price + $taxes + (($order->is_delivery && $bill_settings['delivery'])? $bill_settings['delivery'] : 0)}}
			</div>
	</div>
  <div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>
      {{$general_data['name']}}
    </div>
  </div>
  <div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>
      {{$general_data['address']}}
    </div>
  </div>
  <div class='row' dir='{{direction()}}'>
    <div class='col-xs-3'></div>
    <div class='bordered col-xs-6  text-center'>
    	{{$general_data['phone1']}}
			@if(isset($general_data['phone2']))
			- {{$general_data['phone2']}}
			@endif
			@if(isset($general_data['phone3']))
			- {{$general_data['phone3']}}
			@endif
			@if(isset($general_data['phone4']))
			- {{$general_data['phone4']}}
			@endif
    </div>
  </div>
  <div class='row assign' dir='{{direction()}}'>
      <div class='col-xs-12  text-center'>
        Designed by : Abdullah Al-Nahhal  abdulahalnahhal@gmail.com &nbsp;&nbsp;&nbsp;01116605468&nbsp;-&nbsp;01116608822
      </div>
  </div>
	<div class='page-break'></div>
	@include('layout.foot')
  <script src="{{asset('js/jquery-barcode.js')}}"></script>
	<script type="text/javascript">
		@if(isset($bill_settings['barcode']))
      $("#barcode").barcode("{{$order->number}}", "code128");
		@endif
		window.print();
		window.onafterprint = function () {
			window.location.href = "{{route('orders.orders.index')}}";
		}
	</script>
</body>
</html>
