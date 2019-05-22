<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBookSpacesTable.
 */
class CreateBookSpacesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('book_space', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('locale', 10)->nullable();

            $table->integer('country_id')->unsigned();
            $table->integer('business_id')->unsigned();
            $table->integer('target_id')->nullable();
            $table->string('target_other')->nullable();
            $table->string('content', 1024)->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade');
            $table->foreign('business_id')->references('id')->on('business')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('book_space');
	}
}
