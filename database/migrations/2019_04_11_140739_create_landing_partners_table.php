<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLandingPartnersTable.
 */
class CreateLandingPartnersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('landing_partners', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->tinyInteger('active')->default(0);


            $table->string('campaign_source')->unique();
            $table->string('campaign_medium')->nullable();
            $table->string('campaign_name')->nullable();

            $table->string('script_key')->nullable();
            $table->text('script_content')->nullable();

            $table->string('template_code', 100)->unique()->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('template_code')->references('code')->on('landing_templates')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('landing_partners');
	}
}
