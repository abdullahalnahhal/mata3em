<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DishCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dish_categories')->insert([
            [
              'id'=>1,
              'name'=>'بلطي',
              'shortcut' => 'BLTY',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>2,
              'name'=>'بوري',
              'shortcut' => 'BORY',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>3,
              'name'=>'جمبري',
              'shortcut' => 'GMBRY',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>4,
              'name'=>'فيليه',
              'shortcut' => 'FELEH',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>5,
              'name'=>'سبيط',
              'shortcut' => 'SOBAT',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>6,
              'name'=>'دنيس',
              'shortcut' => 'DENIS',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>7,
              'name'=>'قاروص',
              'shortcut' => 'KAROS',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>8,
              'name'=>'بياض',
              'shortcut' => 'BIAD',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>9,
              'name'=>'قشر بياض',
              'shortcut' => 'KBIAD',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>10,
              'name'=>'خدمة',
              'shortcut' => 'SERVE',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>11,
              'name'=>'باغة',
              'shortcut' => 'BAGA',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>12,
              'name'=>'تونة',
              'shortcut' => 'TONA',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>13,
              'name'=>'بساريا',
              'shortcut' => 'BSARI',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>14,
              'name'=>'بربوني',
              'shortcut' => 'BARBN',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>15,
              'name'=>'مكرونة',
              'shortcut' => 'MAKRN',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>16,
              'name'=>'ثعبان',
              'shortcut' => 'SNAKE',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>17,
              'name'=>'جندوفلي',
              'shortcut' => 'GNDFL',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>18,
              'name'=>'كابوريا',
              'shortcut' => 'KBRIA',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>19,
              'name'=>'وقار',
              'shortcut' => 'WAKAR',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>20,
              'name'=>'لوت',
              'shortcut' => 'LOOT',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
              'id'=>21,
              'name'=>'إضافات',
              'shortcut' => 'PLUG',
              'status' => '1',
              'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
