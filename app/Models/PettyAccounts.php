<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PettyAccounts extends Model
{
	  use SoftDeletes;

    public $table = 'petty_accounts';
    public $timestamps = true;

    protected $fillable = [
    	'title',
      'description',
      'amount',
    ];

}
