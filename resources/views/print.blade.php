@php
$settings = App\Models\Settings::first();
$general = json_decode($settings->general_data, true);
$bill_settings = json_decode($settings->printing, true);
$setting['general'] = $general;
$setting['print'] = $bill_settings;
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.head')
	<title>@yield('title')</title>
	<style>
	.bordered{
    	padding:1em;
        border-radius:1rem;
        border:solid 1px;
        margin-top:.5rem;
      }
	@media print {
	    @if(isset($bill_settings['font_size']))
			body,div,table,span{
				font-size:{{$setting['print']['font_size']}}pt;
			}
		@endIf
		@if(isset($bill_settings['borders_size']))
    		.bordered{
    			border:solid {{$setting['print']['borders_size']}}px;
    		}
		@endIf
		@page{
		@if(isset($setting['print']['page_width']) && $setting['print']['page_width'])
		    width:{{$setting['print']['page_width']}} cm;
		@endIf
		@if(isset($bill_settings['padding_width']) && $bill_settings['padding_width'])
    		margin-left:{{$setting['print']['padding_width']}} cm;
    		margin-right:{{$setting['print']['padding_width']}} cm;
    		margin-top:0.2 cm;
    		margin-bottom:0.2 cm;
		@endIf
		@if(isset($bill_settings['font_size']))
		    font-size:{{$setting['print']['font_size']}}pt;
		@endIf
		    @footnote {
    			border-top: 0.3cm solid black;
    			padding-top: 0.3cm;
			}
		}
        .assign{
            font-size: 8pt;
        }
        .page-break {page-break-inside: avoid; page-break-before: always;}

    }

  </style>

</head>
<body class="theme-red">
	<div class='content container-fluid'>
		@if($active == 'Daily Accounts')
      @include('layout.printables.accounts.daily-accounts')
		@elseif($active == 'Orders')
			@include('layout.printables.orders.bill')
    @endif
    <div class='row assign' dir='{{direction()}}'>
        <div class='col-xs-12  text-center font-bold'>
            Designed by : Abdullah Al-Nahhal  abdulahalnahhal@gmail.com &nbsp;&nbsp;&nbsp;01116605468&nbsp;-&nbsp;01116608822
        </div>
    </div>
		<div class='page-break'></div>
	</div>

	@include('layout.foot')
    <script src="{{asset('js/jquery-barcode.js')}}"></script>
	<script type="text/javascript">
		@if(isset($bill_settings['barcode']))
	      $("#barcode").barcode("{{$order->number}}", "code128");
		@endif
		// window.print();
		// window.onafterprint = function () {
		// 	window.location.href = "{{route($return??'index')}}";
		// }
	</script>
</body>
</html>
