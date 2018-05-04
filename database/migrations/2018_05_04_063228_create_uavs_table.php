<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUAVsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uavs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('ip')->nullable();
            $table->integer('battery')->nullable();
            $table->boolean('isReady')->default(false);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();;
            $table->string('attitude')->nullable();;
            $table->string('home_latitude')->nullable();;
            $table->string('home_longitude')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uavs');
    }
}
