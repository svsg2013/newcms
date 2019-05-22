<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBlockTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_block_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_block_id')->unsigned();
            $table->string('locale')->index();
            $table->string('photo_translation')->nullable();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->unique(['product_block_id','locale']);
            $table->foreign('product_block_id')->references('id')->on('product_block')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_block_translation');
    }
}
