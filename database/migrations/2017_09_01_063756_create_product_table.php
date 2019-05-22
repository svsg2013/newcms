<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 50)->index()->nullable();//main, sub
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->string('product_image')->nullable();
            $table->string('banner')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('is_product')->default(1);
            $table->smallInteger('position')->default(0);
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
        Schema::drop('product');
    }

}
