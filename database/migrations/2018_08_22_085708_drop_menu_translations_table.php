<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropMenuTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('menu_translations');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('menu_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('menu_id')->unsigned();
			$table->string('name')->nullable();
			$table->string('slug')->nullable();
			$table->string('locale')->index();

			$table->unique(['menu_id','locale']);
			$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->timestamps();
		});
    }
}
