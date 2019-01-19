<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            [
                'id'=>1,
                'general_data'=> json_encode([
                    'name'=>'دنيااﻷسماك',
                    'address'=> '7 شارع ابن خلدون حي السلام - القومية',
                    'phone1'=>'2384707',
                    'phone2'=>'2328743',
                    'phone3'=>'01227129129',
                    'phone4'=>'01146147116',
                ]) ,
                'printing' => json_encode([
                    'delivery'=>'0',
                    'tax_value'=>'0',
                    'tax_percentage'=>'0',
                    'page_width'=>'10',
                    'padding_width'=>'0.2',
                    'barcode'=>'1',
                    'font_size'=>'12',
                    'borders_size'=>'3',
                ]),
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
