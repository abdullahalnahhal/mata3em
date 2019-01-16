<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DishesUnits;
use App\Http\Requests\DishesUnitsRequest;
use App\Http\MainControllers\DishesUnitsController  as Main;

class DishesUnitsController  extends Main
{
	  public function index ()
    {
        $units = DishesUnits::all();
        return view('menue.dishes-units.index', [
            'active'=>'Dishes Units',
            'units' => $units,
        ]);
    }
    public function new()
    {
      return view('menue.dishes-units.form',[
        'active'=>'Dishes Units',
        'action'=>'New',
      ]);
    }
		public function create (DishesUnitsRequest $request)
		{
			$unit = new DishesUnits;
			$unit->name = $request->name;
			$unit->shortcut = $request->shortcut;
			$unit->status = $request->all()['status']??'0';
		  if ($unit->save()) {
		      return redirect()->route('menue.dishes-units.index', ['locale'=>cLang()])->with('created','menue.Unit Has Been Created ...!');
		  }
		  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function edit($id)
    {
        $unit = DishesUnits::find($id);
        return view('menue.dishes-units.form',[
            'active'=>'Dishes Units',
            'action'=>'Edit',
            'unit'=>$unit
        ]);
    }
		public function update(DishesUnitsRequest $request, $id)
		{
		    $unit = DishesUnits::find($id);
				$unit->name = $request->name;
				$unit->shortcut = $request->shortcut;
				$unit->status = $request->all()['status']??'0';
				if ($unit->save()) {
			      return redirect()->route('menue.dishes-units.index', ['locale'=>cLang()])->with('updated','menue.Unit Has Been updated ...!');
			  }
			  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function delete($id)
		{
		    $unit = DishesUnits::find($id);
		    if ($unit && $unit->delete()) {
		        return redirect()->route('menue.dishes-units.index', ['locale'=>cLang()])->with('deleted','menue.Unit has been Deleted ...!');
		    }
		    return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
		}
		public function view($id)
		{
				$unit = DishesUnits::find($id);
				if(!$unit)
				{
						return redirect()->route('menue.dish-categories.index', ['locale'=>cLang()])->withErrors('common.Sorry But these view doesn\'t exist' );
				}
				return view('menue.dishes-units.view',[
						'active'=>'Dishes Units',
						'unit'=>$unit,
				]);
		}

}

?>
