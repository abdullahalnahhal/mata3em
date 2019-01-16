<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersDetailsStatus extends Model
{
	  use SoftDeletes;

    public $table = 'orders_details_status';
    public $timestamps = true;

    protected $fillable = [
    	'name',
      'shortcut',
    ];

    public static function status(String $shortcut)
    {
      $status = self::where('shortcut', strtoupper($shortcut))->get()->first();
      return $status->id;
    }

		public function check(String $shortcut)
		{
			if ($this->shortcut == strtoupper($shortcut)) {
				return true;
			}
			return false;
		}
}
