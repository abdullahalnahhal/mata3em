<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersDetails extends Model
{
	  use SoftDeletes;

    public $table = 'orders_details';
    public $timestamps = true;

    protected $fillable = [
    	'order_id',
      'dish_id',
      'status_id',
      'price',
      'amount',
    ];

		public function dish()
		{
				return $this->hasOne('App\Models\Dishes', 'id', 'dish_id');
		}
		public function status()
		{
				return $this->hasOne('App\Models\OrdersDetailsStatus', 'id', 'status_id');
		}
}
