<div class='row clearfix'>
  <div class='col-xs-6 text-{{revFull()}} pull-{{revFull()}}'>
    <h5>{{$order->number}}</h5>
  </div>
  <div class='col-xs-6 text-{{dirFull()}} pull-{{dirFull()}}' dir='{{revDir()}}'>
    <div class='col-xs-2'> : @lang('orders.Register Time')</div>
    <div class='col-xs-10'>{{$order->register_date." ".$order->register_time }}</div>
    <br>
    <div class='col-xs-2'> : @lang('orders.Delivery Time')</div>
    <div class='col-xs-10'>{{Illuminate\Support\Carbon::now() }}</div>
  </div>
</div>
@if(isset($setting['general']) && isset($setting['general']['name']))
<div class='row clearfix'>
  <div class='col-xs-12 text-center'>
    <h5>{{$setting['general']['name']}}</h5>
    {{$setting['general']['address']??''}}
  </div>
</div>
@endif
@if(isset($setting['general']) && isset($setting['general']['phone1']))
<div class='row clearfix'>
  <div class='col-xs-12 text-center'>
    {{$setting['general']['phone1']}}
    @if(isset($setting['general']['phone2']))
    - {{$setting['general']['phone2']}}
    @endif
    @if(isset($setting['general']['phone3']))
    - {{$setting['general']['phone3']}}
    @endif
    @if(isset($setting['general']['phone4']))
    - {{$setting['general']['phone4']}}
    @endif
  </div>
</div>
@endif
<div class='row clearfix'>
  <table class="table table-bordered text-{{dirFull()}}" dir='{{direction()}}'>
    <tbody>
      <tr>
          <th>@lang('orders.Client Name')</th>
          <th>{{$order->client->name}}</th  >
      </tr>
      <tr>
          <th>@lang('orders.Client Phone')</th>
          <th>
            {{$order->client->tel1}}
            @if($order->client->tel2)
            - {{$order->client->tel2}}
            @endif
          </th>
      </tr>
      <tr>
          <th>@lang('orders.Client Address')</th>
          <th>{{$order->client->address}}</th>
      </tr>
    </tbody>
  </table>
</div>
<div class='row clearfix'>
  <table class="table table-bordered text-{{dirFull()}}" dir='{{direction()}}'>
    <thead>
      <tr>
        <th>@lang('common.#')</th>
        <th>@lang('orders.Dish')</th>
        <th>@lang('orders.Price')</th>
        <th>@lang('orders.Amount')</th>
        <th>@lang('orders.Total')</th>
      </tr>
    </thead>
    <tbody>
      @php
        $count = 0;
      @endphp
      @foreach($order->details as $detail)
      <tr>
        <td>{{$count++}}</td>
        <td>{{$detail->dish->name}}</td>
        <td>{{$detail->price}}</td>
        <td>{{$detail->amount}}</td>
        <td>{{$detail->price * $detail->amount}}</td>
      </tr>
      @endforeach
      @if(isset($setting['print']) && isset($setting['print']['delivery']) &&
      $setting['print']['delivery'] && $order->is_delivery)
      <tr>
        <th colspan='4'>@lang('orders.Delivery Service')</th>
        <th>{{$delivery = $setting['print']['delivery']}}</th>
      </tr>
      @endif
      @if(isset($setting['print']) && isset($setting['print']['tax_value']) &&
      $setting['print']['delivery'])
      <tr>
        <th colspan='4'>@lang('orders.Taxes')</th>
        <th>{{$taxes = $setting['print']['tax_value'] + (($setting['print']['tax_percentage'])?$setting['print']['tax_percentage']*$order->price/100:0)}}</th>
      </tr>
      @endif
      <tr>
        <th colspan='4'>@lang('orders.Bill Total')</th>
        <th>{{$order->price +
          (isset($delivery)?$delivery:0) + (isset($taxes)?$taxes:0) }}</th>
      </tr>
    </tbody>
  </table>
</div>
