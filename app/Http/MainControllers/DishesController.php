<?php

namespace App\Http\MainControllers;

use App\Models\Dishes;
use App\Models\DishAmount;
use App\Models\DishPrices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DishesController  extends Controller
{
    public function addDishPrice(Dishes $dish, Request $request)
    {
        $price = $dish->price();
        if ($price) {
          if (!$price->delete()) {
            return false;
          }
        }
        $new_price = new DishPrices;
        $new_price->dish_id = $dish->id;
        $new_price->price = $request->price;
        $new_price->price2 = $request->price2??null;
        $new_price->price3 = $request->price3??null;
        if ($new_price->save()) {
          return true;
        }
        return false;
    }
    public function addDishAmount(Dishes $dish, Request $request)
    {
        $last_amount = $dish->amount();
        $amount = new DishAmount;
        $amount->dish_id = $dish->id;
        $amount->add = $request->amount;
        $amount->sub = 0;
        if (!$last_amount) {
          $amount->total = $amount->add;
        }else{
          $amount->total = $last_amount->total + $request->amount;
        }
        if ($amount->save()) {
          return true;
        }
        return false;
    }
    public function updateDishAmount(Dishes $dish, Request $request)
    {
        $last_amount = $dish->amount();
        if ($last_amount) {
          $amount = new DishAmount;
          $amount->dish_id = $dish->id;
          $amount->add = 0;
          $amount->sub = $last_amount->total;
          $amount->total = 0;
          if (!$amount->save()) {
            return false;
          }
        }
        if ($this->addDishAmount($dish, $request)) {
            return true;
        }
        return false;
    }

}

?>
