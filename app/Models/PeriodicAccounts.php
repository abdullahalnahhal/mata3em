<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodicAccounts extends Model
{
	  use SoftDeletes;

    public $table = 'periodic_accounts';
    public $timestamps = true;

    protected $fillable = [
    	'title',
      'description',
      'amount',
    ];

}
