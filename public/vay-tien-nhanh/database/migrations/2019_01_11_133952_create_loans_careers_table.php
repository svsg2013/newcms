<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans_careers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('loan_id')->unsigned();
            $table->integer('career_id')->unsigned();
			$table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
			$table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
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
        Schema::dropIfExists('loans_careers');
    }
}
