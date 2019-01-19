<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersTableSeeder::class);
      $this->call(OrderStatusTableSeeder::class);
      $this->call(OrderDetailsStatusTableSeeder::class);
      $this->call(ClientsTableSeeder::class);
      $this->call(DishCategoriesTableSeeder::class);
      $this->call(UnitsSeeder::class);
      $this->call(SettingsTableSeeder::class);

    }
}
