<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('shortcut', 5)->unique();
            $table->enum('status', [0, 1])->default('1')->comment('if (1) is available and (0) is not');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes_units');
    }
}
