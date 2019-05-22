<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopupTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->index();
            $table->integer('popup_id')->unsigned();

			$table->text('content')->nullable();

			$table->unique(['popup_id','locale']);
			$table->foreign('popup_id')->references('id')->on('popup')->onDelete('cascade');
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
        Schema::dropIfExists('popup_translation');
    }
}
