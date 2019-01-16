<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DishPrices extends Model
{
	  use SoftDeletes;

    public $table = 'dish_prices';
    public $timestamps = true;

    protected $fillable = [
    	'dish_id',
      'price',
    ];

}
