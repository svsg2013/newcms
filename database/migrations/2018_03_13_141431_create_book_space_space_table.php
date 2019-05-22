<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookSpaceSpaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_space_space', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_space_id')->unsigned();
            $table->integer('free_space_id')->unsigned();

            $table->foreign('book_space_id')->references('id')->on('book_space')->onDelete('cascade');
            $table->foreign('free_space_id')->references('id')->on('free_space')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_space_space');
    }
}
