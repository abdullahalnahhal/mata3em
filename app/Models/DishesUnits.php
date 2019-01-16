<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DishesUnits extends Model
{
	  // use SoftDeletes;

    public $table = 'dishes_units';
    public $timestamps = true;

    protected $fillable = [
    	'name',
      'shortcut',
      // 'status',
    ];

}
