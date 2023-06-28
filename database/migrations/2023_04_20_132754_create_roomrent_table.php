<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomrentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomrent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('house_number',50);
            $table->string('room_number',50);
            $table->string('tanent_name')->nullable();
            $table->integer('fire_number')->nullable();
            $table->integer('water_number')->nullable();
            $table->float('electricity_fee')->nullable();
            $table->float('water_fee')->nullable();
            $table->integer('category_id')->unsigned();
            $table->string('date')->nullable();
            $table->float('room_fee',50);
            $table->float('waste_cost',50);
            $table->float('old_fire_number',50);
            $table->float('old_water_number',50);
            $table->float('total')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomrent');
    }
}
