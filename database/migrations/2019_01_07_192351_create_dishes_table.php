<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->integer('category_id')->unsigned()->nullable();
            $table->enum('changable',[0, 1])->default('0')->comment('If [0] is not daily changable Or [1] is daily changable');
            $table->enum('status', [0, 1])->default('0')->comment('If [1] is available Or [0] is not available');
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
        Schema::dropIfExists('dishes');
    }
}
