<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
	  use SoftDeletes;

    public $table = 'settings';
    public $timestamps = true;

    protected $fillable = [
    	'general_data',
      'printing',
    ];
}
