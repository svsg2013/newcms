<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeSpaceTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('free_space', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->index();
            $table->smallInteger('level')->default(0);
            $table->integer('position')->default(0);
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
		Schema::drop('free_space');
	}

}
