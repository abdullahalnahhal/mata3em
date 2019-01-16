<?php

namespace App\Http\MainControllers;

use App\Models\Clients;
use App\Models\Orders;
use App\Models\OrdersDetails;
use App\Models\Dishes;
use App\Models\DishAmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class ClientsController  extends Controller
{
    public function makeClientOrder(Request $request, Clients $client)
    {
        $order = new Orders;
        $last_order = Orders::withTrashed()->orderBy('id', 'DESC')->first();
        if (!$last_order || !$last_order->count()) {
            $order->number = 10000;
        }else{
            $order->number = $last_order->number + 1;
        }
        $order->status_id = 1;
        $order->client_id = $client->id;
        $order->register_date = Carbon::today()->format('Y-m-d');
        $order->register_time = Carbon::today()->format('H:i:s');
        $order->delivery_date = $request->delivery_date;
        $order->delivery_time = $request->delivery_time;
        if ($order->save()) {
            $price = $this->createOrderDetails($order, $request, $client);
            if ($price) {
              $details = $order->details;
              $order->price = $price;
              if ($order->save()) {
                return $order;
              }
            }
        }
        return false;
    }
    public function createOrderDetails(Orders $order, Request $request)
    {
        $price = 0;
        $dishes = $request->dish;
        $quantities = array_filter($request->all());
        foreach($dishes as $dish){
            $dish_original = Dishes::find($dish);
            if (isset($quantities['dish-'.$dish.'-price'])) {
              $detail = $this->createSingleOrderDetail($order, $dish_original, 0, $quantities['dish-'.$dish.'-price']);
              if (!$detail) {
                return false;
              }
              $price = $price + $detail * $quantities['dish-'.$dish.'-price'];
            }
            if (isset($quantities['dish-'.$dish.'-price2'])) {
              $detail = $this->createSingleOrderDetail($order, $dish_original, 2, $quantities['dish-'.$dish.'-price2']);
              if (!$detail) {
                return false;
              }
              $price = $price + $detail * $quantities['dish-'.$dish.'-price2'];
            }
            if (isset($quantities['dish-'.$dish.'-price3'])) {
              $detail = $this->createSingleOrderDetail($order, $dish_original, 3, $quantities['dish-'.$dish.'-price3']);
              if (!$detail) {
                return false;
              }
              $price = $price + $detail * $quantities['dish-'.$dish.'-price3'];
            }
        }
        return $price;
    }
    public function createSingleOrderDetail(Orders $order, Dishes $dish, $price_number, $amount)
    {
        $order_detail = new OrdersDetails;
        $order_detail->order_id = $order->id;
        $order_detail->dish_id = $dish->id;
        $order_detail->amount = $amount;
        $order_detail->status_id = 1;
        if ($price_number) {
          $order_detail->price = $dish->price()->{'price'.$price_number};
        }else{
          $order_detail->price = $dish->price()->price;
        }
        if ($order_detail->save() && $this->subtractDish($dish, $amount)) {
          return $order_detail->price;
        }
        return false;
    }
    public function subtractDish(Dishes $dish, $amount)
    {
        $last_amount = $dish->amount();

        if (!$last_amount) {
          $total = 0;
        }else{
          $total = $last_amount->total;
        }
        $dish_amount = new DishAmount;
        $dish_amount->dish_id = $dish->id;
        $dish_amount->add = 0;
        $dish_amount->sub = $amount;
        $dish_amount->total = $total - $amount;
        if ($dish_amount->save()) {
            return true;
        }
        return false;
    }
}

?>
