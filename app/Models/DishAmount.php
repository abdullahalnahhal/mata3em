<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DishAmount extends Model
{
	  use SoftDeletes;

    public $table = 'dish_amount';
    public $timestamps = true;

    protected $fillable = [
    	'dish_id',
      'add',
      'sub',
      'total',
    ];

}
