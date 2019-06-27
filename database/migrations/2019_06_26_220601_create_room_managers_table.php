<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_name');
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_type_id')->unsigned();
            $table->integer('room_capacity_id')->unsigned();
            $table->string('room_image');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotel_details');
            $table->foreign('room_type_id')->references('id')->on('room_type_managers');
            $table->foreign('room_capacity_id')->references('id')->on('room_capacity_managers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_managers');
    }
}
