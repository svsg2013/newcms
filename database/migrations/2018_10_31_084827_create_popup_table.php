<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code')->default('LOAN_CACULATOR')->comment('Code xac dinh vi tri cua popup. Vi du: LOAN_CACULATOR, ABOUT');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();

            $table->tinyInteger('active')->index()->default(1);
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
        Schema::dropIfExists('popup');
    }
}
