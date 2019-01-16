<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DishCategories extends Model
{
	  use SoftDeletes;

    public $table = 'dish_categories';
    public $timestamps = true;

    protected $fillable = [
    	'name',
      'shortcut',
      'status',
    ];

		public function dishes()
		{
				return $this->hasMany('App\Models\Dishes', 'category_id', 'id');
		}
}
