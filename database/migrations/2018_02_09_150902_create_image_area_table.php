<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_area', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_map_id')->unsigned();
            $table->string('shape')->nullable();
            $table->string('coords')->nullable();
            $table->timestamps();
            $table->foreign('image_map_id')->references('id')->on('image_map')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_area');
    }
}
