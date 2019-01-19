<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dishes_units')->insert([
            [
              'id'=>1,
              'name'=>'كيلو',
              'shortcut' => 'KILO',
              'status' => "1",
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>2,
              'name'=>'طبق',
              'shortcut' => 'DISH',
              'status' => "1",
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>3,
              'name'=>'صينية',
              'shortcut' => 'TRAY',
              'status' => "1",
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>4,
              'name'=>'ساندويتش',
              'shortcut' => 'SNDWH',
              'status' => "1",
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>5,
              'name'=>'طاجن',
              'shortcut' => 'CASRL',
              'status' => "1",
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
