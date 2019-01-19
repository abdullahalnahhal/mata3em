<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
              'id'=>1,
              'name'=>'مباشر',
              'tel1' => '000000000',
              'tel2' => "000000000",
              'address' =>"كاشير",
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
