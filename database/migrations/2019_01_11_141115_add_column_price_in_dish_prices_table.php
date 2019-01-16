<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPriceInDishPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dish_prices', function (Blueprint $table) {
            $table->string('price2', 10)->nullable();
            $table->string('price3', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_prices', function (Blueprint $table) {
            $table->dropColumn(['price2', 'price3']);
        });
    }
}
