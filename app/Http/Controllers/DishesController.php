<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dishes;
use App\Http\Requests\DishesRequest;
use App\Http\Requests\DishesAmountRequest;
use App\Http\Requests\DishesPriceRequest;
use App\Http\MainControllers\DishesController  as Main;

class DishesController  extends Main
{
	  public function index ()
    {
      $dishes = Dishes::all();
        return view('menue.dishes.index', [
            'active'=>'Dishes',
            'dishes' => $dishes,
        ]);
    }
    public function new()
    {
      return view('menue.dishes.form',[
        'active'=>'Dishes',
        'action'=>'New',
      ]);
    }
		public function create (DishesRequest $request)
		{
			$dish = new Dishes;
			$dish->name = $request->name;
			$dish->category_id = $request->dish_category_id;
			$dish->unit_id = $request->dish_unit_id;
			$dish->status = $request->status??'0';
			$dish->changable = $request->changable??'0';
		  if ($dish->save()) {
					if (!$this->addDishPrice($dish, $request)) {
							return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
					}
					if (!$this->addDishAmount($dish, $request)) {
							return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
					}
		      return redirect()->route('menue.dish-categories.view', ['id'=>$request->dish_category_id])->with('created','menue.Category Has Been Created ...!');
		  }
		  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function edit($id)
    {
        $dish = Dishes::find($id);
        return view('menue.dishes.form',[
            'active'=>'Dishes',
            'action'=>'Edit',
            'dish'=>$dish
        ]);
    }
		public function update(DishesRequest $request, $id)
		{
		    $dish = Dishes::find($id);
				$dish->name = $request->name;
				$dish->category_id = $request->dish_category_id;
				$dish->unit_id = $request->dish_unit_id;
				$dish->status = $request->status??'0';
				$dish->changable = $request->changable??'0';
				if ($dish->save()) {
						if (!$this->addDishPrice($dish, $request)) {
								return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
						}
						if (!$this->updateDishAmount($dish, $request)) {
								return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
						}
			      return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('updated','menue.Category Has Been updated ...!');
			  }
			  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function addAmount(DishesAmountRequest $request, $id)
		{
				$dish = Dishes::find($id);
				if ($this->addDishAmount($dish, $request)) {
						return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('updated','menue.Dish Amount Has Been updated ...!');
				}
				return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function editPrice(DishesPriceRequest $request, $id)
		{
				$dish = Dishes::find($id);
				if ($this->addDishPrice($dish, $request)) {
						return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('updated','menue.Dish Price Has Been updated ...!');
				}
				return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function delete($id)
		{
		    $dishes = Dishes::find($id);
		    if ($dishes && $dishes->delete()) {
		        return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('deleted','menue.Dish has been Deleted ...!');
		    }
		    return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
		}
		public function view($id)
		{
				$dish = Dishes::find($id);
				if(!$dish)
				{
						return redirect()->route('car', ['locale'=>cLang()])->withErrors('common.Sorry But these view doesn\'t exist' );
				}
				return view('menue.dishes.view',[
						'active'=>'Dishes',
						'dish'=>$dish,
				]);
		}

}

?>
