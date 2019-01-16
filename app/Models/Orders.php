<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
	  use SoftDeletes;

    public $table = 'orders';
    public $timestamps = true;

    protected $fillable = [
    	'client_id',
      'status_id',
      'price',
      'regiter_date',
      'regiter_time',
      'delivery_date',
      'delivery_time',
    ];

		public function details()
		{
				return $this->hasMany('App\Models\OrdersDetails', 'order_id', 'id');
		}
		public function client()
		{
				return $this->hasOne('App\Models\Clients', 'id', 'client_id');
		}
		public function status()
		{
				return $this->hasOne('App\Models\OrdersStatus', 'id', 'status_id');
		}
}
