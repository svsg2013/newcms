<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->nullable();
			$table->float('interest_rate')->nullable();
			$table->integer('loan_amount_min')->nullable();
			$table->integer('loan_amount_max')->nullable();
			$table->integer('loan_tenure_max')->nullable();
			$table->integer('loan_tenure_min')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
