<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('el_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('el_company_id')->unsigned();
            $table->string('question', 500)->nullable();
            $table->text('answer')->nullable();
            $table->timestamps();

            $table->foreign('el_company_id')->references('id')->on('el_company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('el_faqs');
    }
}
