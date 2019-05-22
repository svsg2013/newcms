<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('menus');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('menus', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->default(0);
            $table->string('url')->nullable();
			$table->tinyInteger('active')->index()->default(1);
			$table->integer('parent_id')->nullable();
			$table->integer('page_id')->nullable();
            $table->timestamps();
		});
    }
}
