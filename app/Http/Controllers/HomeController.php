<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Dishes;
use App\Models\Orders;
use App\Models\OrdersStatus;
use Illuminate\Support\Carbon;

class HomeController  extends Controller
{
	  public function index ()
    {
      $init_status = OrdersStatus::status('INIT');
      $new_orders = Orders::where('status_id', '=' ,$init_status)
          ->where('created_at', '<=', Carbon::now())
          ->where('created_at', '>=', Carbon::today()->format('Y-m-d H:i:s'))
          ->count();
      $dlvrd_status = OrdersStatus::status('DLVRD');
      $delivered_orders = Orders::where('status_id', '=' ,$dlvrd_status)
          ->where('created_at', '<=', Carbon::now())
          ->where('created_at', '>=', Carbon::today()->format('Y-m-d H:i:s'))
          ->count();
      return view('index',[
          'active'=>'Home',
          'new_orders'=>$new_orders,
          'delivered_orders'=>$delivered_orders,
      ]);
    }
}

?>
