<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTagTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_tag_translation', function (Blueprint $table) {
            $table->integer('tag_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('metaTitle')->nullable();
            $table->string('metaDescription')->nullable();
            $table->unique(['tag_id','locale']);
            $table->foreign('tag_id')->references('id')->on('news_tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_tag_translation');
    }
}
