<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateElCompanyMenusTable.
 */
class CreateElCompanyMenusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('el_company_menu', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('el_company_id')->unsigned();
            $table->integer('parent_id')->default(0)->index();
            $table->string('code', 100)->nullable()->index();
            $table->string('url')->nullable();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->smallInteger('position')->default(0);
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
		Schema::drop('el_company_menu');
	}
}
