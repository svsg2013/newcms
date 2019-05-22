<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImage360Table extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image360', function(Blueprint $table) {
            $table->increments('id');
            $table->string('avatar')->nullable();
            $table->string('image')->nullable();
            $table->float('hfov', 8, 1)->nullable();
            $table->float('pitch', 8, 1)->nullable();
            $table->float('yaw', 8, 1)->nullable();
            $table->integer('parent_id')->default(0);
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
		Schema::drop('image360');
	}

}
