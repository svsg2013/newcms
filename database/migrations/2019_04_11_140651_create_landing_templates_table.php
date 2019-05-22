<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLandingTemplatesTable.
 */
class CreateLandingTemplatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('landing_templates', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100)->unique();
            $table->string('name', 100)->index()->nullable();
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
		Schema::dropIfExists('landing_templates');
	}
}
