<?php

namespace App\Http\MainControllers;

use App\Models\DishCategories;
use App\Http\Controllers\Controller;
use App\Http\Traits\PettyAccountsTrait;
use App\Http\Traits\PeriodicAccountsTrait;

class AccountsController  extends Controller
{
  use PettyAccountsTrait;
  use PeriodicAccountsTrait;

}

?>
