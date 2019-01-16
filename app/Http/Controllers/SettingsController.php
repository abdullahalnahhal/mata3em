<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Requests\GeneralDataRequest;
use App\Http\MainControllers\DishesController  as Main;

class SettingsController  extends Main
{
	  public function index ()
    {
        $settings = Settings::first()->general_data;
        return view('settings.form', [
            'active'=>'General Data',
            'settings' => json_decode($settings, true),
        ]);
    }
    public function generalDataUpdate(GeneralDataRequest $request)
    {
        $settings = Settings::first();
        $settings->general_data = json_encode($request->all());
        if($settings->save()){
            return redirect()->route('settings.general-data.index')->with('updated','settings.Settings Has Been Updated ...!');
        }
        return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
    }
		public function bill ()
		{
			$settings = Settings::first()->printing;
			return view('settings.form', [
					'active'=>'Bill Settings',
					'settings' => json_decode($settings, true),
			]);
		}
		public function billUpdate(Request $request)
    {
			$settings = Settings::first();
			$settings->printing = json_encode($request->all());
			if($settings->save()){
					return redirect()->route('settings.bill.index')->with('updated','settings.Settings Has Been Updated ...!');
			}
			return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
    }
		// public function update(DishesRequest $request, $id)
		// {
		//     $dish = Dishes::find($id);
		// 		$dish->name = $request->name;
		// 		$dish->category_id = $request->dish_category_id;
		// 		$dish->unit_id = $request->dish_unit_id;
		// 		$dish->status = $request->status??'0';
		// 		$dish->changable = $request->changable??'0';
		// 		if ($dish->save()) {
		// 				if (!$this->addDishPrice($dish, $request)) {
		// 						return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		// 				}
		// 				if (!$this->updateDishAmount($dish, $request)) {
		// 						return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		// 				}
		// 	      return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('updated','menue.Category Has Been updated ...!');
		// 	  }
		// 	  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		// }
		// public function addAmount(DishesAmountRequest $request, $id)
		// {
		// 		$dish = Dishes::find($id);
		// 		if ($this->addDishAmount($dish, $request)) {
		// 				return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('updated','menue.Dish Amount Has Been updated ...!');
		// 		}
		// 		return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		// }
		// public function editPrice(DishesPriceRequest $request, $id)
		// {
		// 		$dish = Dishes::find($id);
		// 		if ($this->addDishPrice($dish, $request)) {
		// 				return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('updated','menue.Dish Price Has Been updated ...!');
		// 		}
		// 		return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		// }
		// public function delete($id)
		// {
		//     $dishes = Dishes::find($id);
		//     if ($dishes && $dishes->delete()) {
		//         return redirect()->route('menue.dishes.index', ['locale'=>cLang()])->with('deleted','menue.Dish has been Deleted ...!');
		//     }
		//     return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
		// }
		// public function view($id)
		// {
		// 		$dish = Dishes::find($id);
		// 		if(!$dish)
		// 		{
		// 				return redirect()->route('car', ['locale'=>cLang()])->withErrors('common.Sorry But these view doesn\'t exist' );
		// 		}
		// 		return view('menue.dishes.view',[
		// 				'active'=>'Dishes',
		// 				'dish'=>$dish,
		// 		]);
		// }

}

?>
