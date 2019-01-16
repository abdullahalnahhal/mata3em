<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model
{
	  use SoftDeletes;

    public $table = 'clients';
    public $timestamps = true;

    protected $fillable = [
    	'name',
      'tel1',
      'tel2',
      'address',
    ];

}
