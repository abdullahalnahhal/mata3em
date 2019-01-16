<?php

namespace App\Http\MainControllers;

use App\Models\Orders;
use App\Models\Clients;
use App\Models\Dishes;
use App\Models\OrdersDetails;
use App\Models\DishAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrdersController  extends Controller
{
    public function returnOrderDetails(Orders $order)
    {
        foreach($order->details as $detail)
        {
          if (!$this->returnSingleOrderDetail($detail)) {
            return false;
          }
        }
        return true;
    }
    public function returnSingleOrderDetail(OrdersDetails $detail)
    {
        if ($this->addToDish($detail)) {
            if ($detail->delete()) {
                return true;
            }
        }
        return false;
    }
    public function addToDish(OrdersDetails $detail)
    {
        $total = $detail->dish->amount()->total;
        $amount = new DishAmount;
        $amount->dish_id = $detail->dish_id;
        $amount->add = $detail->amount;
        $amount->sub = 0;
        $amount->total = $total + $detail->amount;
        if ($amount->save()) {
            return true;
        }
        return false;
    }

    public function createOrderDetails(Request $request, Orders $order)
    {
        $price = 0;
        $dishes = $request->dish;
        $quantities = array_filter($request->all());
        foreach($dishes as $dish){
            $dish_original = Dishes::find($dish);
            if (isset($quantities['dish-'.$dish.'-price']) && $quantities['dish-'.$dish.'-price']) {
              $detail = $this->createSingleOrderDetail($order, $dish_original, 0, $quantities['dish-'.$dish.'-price']);
              if (!$detail) {
                return false;
              }
              $price = $price + $detail * $quantities['dish-'.$dish.'-price'];
            }
            if (isset($quantities['dish-'.$dish.'-price2']) && $quantities['dish-'.$dish.'-price2']) {
              $detail = $this->createSingleOrderDetail($order, $dish_original, 2, $quantities['dish-'.$dish.'-price2']);
              if (!$detail) {
                return false;
              }
              $price = $price + $detail * $quantities['dish-'.$dish.'-price2'];
            }
            if (isset($quantities['dish-'.$dish.'-price3']) && $quantities['dish-'.$dish.'-price3']) {
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
