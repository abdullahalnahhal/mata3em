<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Orders;
use App\Models\Clients;
use App\Models\Settings;
use App\Models\OrdersDetails;
use App\Models\Dishes;
use App\Models\OrdersStatus;
use App\Models\OrdersDetailsStatus;
use App\Models\DishCategories;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrdersFilterRequest;
use App\Http\MainControllers\OrdersController  as Main;

class OrdersController  extends Main
{
	public function index ()
    {
        $register_date = Carbon::today()->format('Y-m-d');
        $status = OrdersStatus::status('FINSH');
        $orders = Orders::where('register_date', '=', $register_date)
                        ->where('status_id', '<' ,$status)
                        ->get();
        return view('orders.orders.index', [
            'active'=>'Orders',
            'orders' => $orders,
        ]);
    }
    public function new()
    {
      return view('orders.orders.form',[
        'active'=>'Orders',
        'action'=>'New',
      ]);
    }
	public function edit($id)
	{
		$order = Orders::find($id);
		$dish_categories = DishCategories::all();
		if(!$order)
		{
			return redirect()->route('orders.orders.index')->withErrors('common.Sorry But these view doesn\'t exist' );
		}
		return view('orders.orders.form',[
			'active'=>'Orders',
			'action'=>'Edit',
			'order'=>$order,
			'dish_categories' => $dish_categories,
		]);
	}
	public function update(OrderRequest $request, $id)
	{
	    $order = Orders::find($id);
		if (!$this->returnOrderDetails($order)) {
			return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
		}
		$price = $this->createOrderDetails($request, $order);
		if ($price) {
			$order->price = $price;
			if ($order->save()) {
				return redirect()->route('orders.orders.index')->with('updated','orders.Order Order has been Updated ...!');
			}
		}
		return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
	}
	public function delete($id)
	{
	    $order = Orders::find($id);
		if ($this->returnOrderDetails($order)) {
			if ($order && $order->delete()) {
	        	return redirect()->route('orders.orders.index')->with('deleted','orders.Order has been Deleted ...!');
			}
		}
		return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
	}
	public function view($id)
	{
		$order = Orders::find($id);
		if(!$order)
		{
			return redirect()->route('order.order.index')->withErrors('common.Sorry But these view doesn\'t exist' );
		}
		return view('orders.orders.view',[
			'active'=>'Orders',
			'order'=>$order,
		]);
	}
	public function cook ($id)
	{
		$status = OrdersStatus::status('PRGRS');
		$orders = Orders::find($id);
		$orders->status_id = $status ;
	 	if ($orders->save()) {
			$details = $orders->details->pluck('id')->toArray();
			$details_status = OrdersDetailsStatus::status('PRGRS');
			$update = OrdersDetails::whereIn('id', $details)->update(['status_id'=>$details_status]);
			if ($update) {
				return redirect()->route('orders.orders.index')->with('updated','orders.Order Order has been Updated ...!');
			}
		}
		  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
	}
	public function deliver ($id)
	{
		$status = OrdersStatus::status('DLVRD');
		$orders = Orders::find($id);
		$orders->status_id = $status ;

		if ($orders->save()) {
			$details = $orders->details->pluck('id')->toArray();
			$details_status = OrdersDetailsStatus::status('DLVRD');
			$update = OrdersDetails::whereIn('id', $details)->update(['status_id'=>$details_status]);
			if ($update) {
				return redirect()->route('orders.orders.index')->with('updated','orders.Order Order has been Updated ...!');
			}
		}
		return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
	}
	public function delivered()
	{
		$register_date = Carbon::today()->format('Y-m-d');
		$status = OrdersStatus::status('DLVRD');
		$orders = Orders::where('register_date', '=', $register_date)
			->where('status_id', '=' ,$status)
			->get();
		return view('orders.orders.index', [
			'active'=>'Delivered Orders',
			'orders' => $orders,
		]);
	}
	public function deliveredFilter(OrdersFilterRequest $request)
	{
		$fields = array_filter($request->all());
		$status = OrdersStatus::status('DLVRD');
		unset($fields['_token']);
		if (!count($fields)) {
			return redirect()->back()->withErrors('common.You Must Set Search Parameters' );
		}
		$orders = new Orders;
		if ($request->client_phone) {
			$client = Clients::where('tel1', '=', $request->client_phone)
				->orWhere('tel2', '=', $request->client_phone)
				->first();
				if ($client || $client->count()) {
					$orders = $orders->where('client_id', '=', $client->id);
				}
		}
		if ($request->number) {
			$orders = $orders->where('number', '=', $request->number);
		}
		if ($request->register_from) {
			$orders = $orders->where('register_date', '>=', $request->register_from);
		}
		if ($request->register_to) {
			$orders = $orders->where('register_date', '<=', $request->register_to);
		}
		if ($request->deliver_from) {
			$orders = $orders->where('delivery_date', '>=', $request->deliver_from);
		}
		if ($request->deliver_to) {
			$orders = $orders->where('delivery_date', '<=', $request->deliver_to);
		}
		$orders = $orders->where('status_id', '<=', $status)->get();
		return view('orders.orders.index', [
        	'active'=>'Delivered Orders',
            'orders' => $orders,
        ]);
	}
	public function undeliver($id)
	{
		$status = OrdersStatus::status('PRGRS');
		$orders = Orders::find($id);
		$orders->status_id = $status ;
		if ($orders->save()) {
			return redirect()->route('orders.orders.delivered')->with('updated','orders.Order Order has been Updated ...!');
		}
		return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
	}
	public function kitchen()
	{
		$deliver_date = Carbon::today()->format('Y-m-d');
		$status = OrdersStatus::status('FINSH');
		$dishes = Dishes::all();
		return view('orders.orders.index', [
			'active'=>'Kitchen Orders',
			'dishes' => $dishes,
		]);
	}
	public function print($id)
	{
		$order = Orders::find($id);
		$settings = Settings::first();
		return view('print',[
			'active'=>'Orders',
			'order' => $order,
			'general_data' => json_decode($settings->general_data, true),
			'bill_settings' => json_decode($settings->printing, true),
		]);
	}
	public function search($order_number)
	{
		$order = Orders::where('number', '=', $order_number)->first();
		if(!$order)
		{
			return redirect()->back()->withErrors('common.Sorry But these view doesn\'t exist' );
		}else{
			return redirect()->route('orders.orders.view',['id'=>$order->id]);
		}
	}
	public function filter(OrdersFilterRequest $request)
	{
		$fields = array_filter($request->all());
		unset($fields['_token']);
		if (!count($fields)) {
			return redirect()->back()->withErrors('common.You Must Set Search Parameters' );
		}
		$orders = new Orders;
		if ($request->client_phone) {
			$client = Clients::where('tel1', '=', $request->client_phone)
				->orWhere('tel2', '=', $request->client_phone)
				->first();
			$orders = $orders->where('client_id', '=', $client->id);
		}
		if ($request->number) {
			$orders = $orders->where('number', '=', $request->number);
		}
		if ($request->register_from) {
			$orders = $orders->where('register_date', '>=', $request->register_from);
		}
		if ($request->register_to) {
			$orders = $orders->where('register_date', '<=', $request->register_to);
		}
		if ($request->deliver_from) {
			$orders = $orders->where('delivery_date', '>=', $request->deliver_from);
		}
		if ($request->deliver_to) {
			$orders = $orders->where('delivery_date', '<=', $request->deliver_to);
		}
		if ($request->order_status_id) {
			$orders = $orders->where('status_id', '<=', $request->order_status_id);
		}
		$orders = $orders->get();
		return view('orders.orders.index', [
        	'active'=>'Orders',
            'orders' => $orders,
        ]);
	}
}

?>
