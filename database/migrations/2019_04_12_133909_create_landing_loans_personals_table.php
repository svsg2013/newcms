<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingLoansPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_loans_personals', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('loan_id')->unsigned();
            $table->integer('personal_id')->unsigned();
			$table->foreign('loan_id')->references('id')->on('landing_loans')->onDelete('cascade');
			$table->foreign('personal_id')->references('id')->on('landing_personals')->onDelete('cascade');
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
        Schema::dropIfExists('landing_loans_personals');
    }
}
