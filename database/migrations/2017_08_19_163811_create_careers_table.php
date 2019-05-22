<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employer')->nullable(); //LHC tuyen dung, nha dau tu tuyen dung
            $table->date('published_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->string('status', 20)->default('DRAFT')->index(); //'DRAFT', 'PUBLISH', 'CLOSED','EXPIRED'
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('is_top')->index()->default(0);
            $table->tinyInteger('accept_aplly')->index()->default(0);
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('career_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('careers');
    }

}
