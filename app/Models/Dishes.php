<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dishes extends Model
{
	  use SoftDeletes;

    public $table = 'dishes';
    public $timestamps = true;

    protected $fillable = [
    	'name',
			'category_id',
      'unit_id',
			'changable',
      'status',
    ];
		public function category()
		{
				return $this->hasOne('App\Models\DishCategories', 'id', 'category_id');
		}
		public function unit()
		{
				return $this->hasOne('App\Models\DishesUnits', 'id', 'unit_id');
		}
		public function amounts()
		{
				return $this->hasMany('App\Models\DishAmount', 'dish_id', 'id');
		}
		public function prices()
		{
				return $this->hasMany('App\Models\DishPrices', 'dish_id', 'id');
		}
		public function amount()
		{
				return $this->hasMany('App\Models\DishAmount', 'dish_id', 'id')->orderBy('id', 'DESC')->first();
		}
		public function price()
		{
				return $this->prices()->orderBy('id', 'DESC')->first();
		}
		public function order_details()
		{
				return $this->hasMany('App\Models\OrdersDetails', 'dish_id', 'id');
		}
}
