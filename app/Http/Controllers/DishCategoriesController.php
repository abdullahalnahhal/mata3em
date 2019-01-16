<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DishCategories;
use App\Http\Requests\DishCategoriesRequest;
use App\Http\MainControllers\DishCategoriesController  as Main;

class DishCategoriesController  extends Main
{
	  public function index ()
    {
      $categories = DishCategories::all();
        return view('menue.dish-categories.index', [
            'active'=>'Dish Categories',
            'categories' => $categories,
        ]);
    }
    public function new()
    {
      return view('menue.dish-categories.form',[
        'active'=>'Dish Categories',
        'action'=>'New',
      ]);
    }
		public function create (DishCategoriesRequest $request)
		{
			$category = new DishCategories;
			$category->name = $request->name;
			$category->shortcut = $request->shortcut;
			$category->status = $request->all()['status']??'0';
		  if ($category->save()) {
		      return redirect()->route('menue.dish-categories.index', ['locale'=>cLang()])->with('created','menue.Category Has Been Created ...!');
		  }
		  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function edit($id)
    {
        $category = DishCategories::find($id);
        return view('menue.dish-categories.form',[
            'active'=>'Dish Categories',
            'action'=>'Edit',
            'category'=>$category
        ]);
    }
		public function update(DishCategoriesRequest $request, $id)
		{
		    $category = DishCategories::find($id);
				$category->name = $request->name;
				$category->shortcut = $request->shortcut;
				$category->status = $request->all()['status']??'0';
				if ($category->save()) {
			      return redirect()->route('menue.dish-categories.index', ['locale'=>cLang()])->with('updated','menue.Category Has Been updated ...!');
			  }
			  return back()->withErrors('common.Sorry But there Was an issue in saving Data please try again');
		}
		public function delete($id)
		{
		    $category = DishCategories::find($id);
		    if ($category && $category->delete()) {
		        return redirect()->route('menue.dish-categories.index', ['locale'=>cLang()])->with('deleted','menue.Car has been Deleted ...!');
		    }
		    return back()->withErrors('common.Sorry But there was an issue in deleting please return to the admin');
		}
		public function view($id)
		{
				$category = DishCategories::find($id);
				if(!$category)
				{
						return redirect()->route('car', ['locale'=>cLang()])->withErrors('common.Sorry But these view doesn\'t exist' );
				}
				return view('menue.dish-categories.view',[
						'active'=>'Dish Categories',
						'category'=>$category,
				]);
		}

}

?>
