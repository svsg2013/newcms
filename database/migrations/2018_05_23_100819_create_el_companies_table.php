<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateElCompaniesTable.
 */
class CreateElCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('el_company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('slug')->nullable();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->integer('business_id')->nullable();
            $table->tinyInteger('receive_news')->default(0);
            $table->enum('status', ['WAITING', 'CONFIRMED', 'DECLINE'])->default('WAITING');
            $table->string('decline_reason')->nullable();
            
            $table->char('language_default', 2)->default('vi')->index();
            $table->string('languages')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('el_company');
    }
}
