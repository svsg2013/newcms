<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageAreaTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_area_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_area_id')->unsigned();
            $table->string('locale')->index();
            $table->string('content')->nullable();
            $table->unique(['image_area_id', 'locale']);
            $table->foreign('image_area_id')->references('id')->on('image_area')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_area_translation');
    }
}
