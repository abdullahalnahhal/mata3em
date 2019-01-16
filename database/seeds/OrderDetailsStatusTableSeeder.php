<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class OrderDetailsStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders_details_status')->insert([
            [
              'id'=>1,
              'name'=>'Initiated',
              'shortcut'=>'INIT',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>2,
              'name'=>'In Progress',
              'shortcut'=>'PRGRS',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>3,
              'name'=>'Finished',
              'shortcut'=>'FINSH',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>4,
              'name'=>'Delivered',
              'shortcut'=>'DLVRD',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
