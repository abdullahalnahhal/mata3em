<?php

namespace App\Http\Controllers;

use App\Models\PettyAccounts;
use App\Models\Orders;
use App\Models\OrdersStatus;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\PettyAccountsRequest;
use App\Http\Requests\AccountsSearchRequest;
use App\Http\MainControllers\AccountsController  as Main;

class AccountsController  extends Main
{

	public function index ()
	{
		$orders = Orders::where('updated_at', '>=', Carbon::today()->format('Y-m-d H:i:s'))
			->where('updated_at', '<=', Carbon::today()->format('Y-m-d')." 23:59:59")
			->where('status_id', '=', OrdersStatus::status('DLVRD'))
			->get();
		$petties = PettyAccounts::where('created_at', '>=', Carbon::today()->format('Y-m-d H:i:s'))
		    ->where('created_at', '<=', Carbon::today()->format('Y-m-d')." 23:59:59")
			->get();
	    return view('accounts.daily', [
	        'active'=>'Daily Accounts',
			'orders' => $orders,
	        'petties' => $petties,
	    ]);
    }
	public function byDuration()
	{
		$start = Carbon::today()->format('Y-m- H:i:s');
		$end = Carbon::today()->format('Y-m-d')." 23:59:59";
		$orders = Orders::where('updated_at', '>=', $start)
				->where('updated_at', '<=', $end)
				->where('status_id', '=', OrdersStatus::status('DLVRD'))
				->get();

		$petties = PettyAccounts::where('created_at', '>=', $start)
				->where('created_at', '<=', $end)
				->get();

		return view('accounts.daily', [
			'active'=>'Accounts By Duration',
			'orders' => $orders,
			'petties' => $petties,
		]);
	}
	public function search(AccountsSearchRequest $request)
	{
		$from = $request->from." 00:00:00";
		$to = $request->to." 23:59:59";

		$orders = Orders::where('updated_at', '>=', Carbon::createFromFormat('Y-m-d H:i:s', $from))
			->where('updated_at', '<=', Carbon::createFromFormat('Y-m-d H:i:s', $to))
			->where('status_id', '=', OrdersStatus::status('DLVRD'))
			->get();
		$petties = PettyAccounts::where('created_at', '>=', $from)
			->where('created_at', '<=', $to)
			->get();
		return view('accounts.daily', [
			'active'=>'Accounts By Duration',
			'orders' => $orders,
			'petties' => $petties,
		]);
	}
	public function print()
	{
		$orders = Orders::where('updated_at', '>=', Carbon::today()->format('Y-m-d H:i:s'))
			->where('updated_at', '<=', Carbon::today()->format('Y-m-d')." 23:59:59")
			->where('status_id', '=', OrdersStatus::status('DLVRD'))
			->get();
		$petties = PettyAccounts::where('created_at', '>=', Carbon::today()->format('Y-m-d H:i:s'))
		    ->where('created_at', '<=', Carbon::today()->format('Y-m-d')." 23:59:59")
			->get();
	    return view('print', [
	        'active'=>'Daily Accounts',
			'orders' => $orders,
	        'petties' => $petties,
	    ]);
	}
}

?>
