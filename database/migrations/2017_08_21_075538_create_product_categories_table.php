<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->index();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->smallInteger('level')->default(0);
            $table->tinyInteger('is_top')->default(0);
            $table->string('slider_key')->nullable();
            $table->integer('position')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->integer('product_id')->nullable()->index();// Dùng để lấy hình ảnh của product cho category
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
		Schema::drop('product_categories');
	}

}
