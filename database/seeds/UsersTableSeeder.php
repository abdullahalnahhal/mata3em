<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
              'id'=>1,
              'name'=>'Admin',
              'email' => 'admin',
              'password' => Hash::make('admin'),
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
