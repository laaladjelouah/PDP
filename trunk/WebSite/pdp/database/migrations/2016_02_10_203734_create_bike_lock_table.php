<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikeLockTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('BikeLock', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('bike_id')->unsigned();
            $table->foreign('bike_id')->references('id')->on('Bike');
            $table->unique('bike_id');
            $table->string('latitude');
            $table->string('longitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('BikeLock');
    }

}
