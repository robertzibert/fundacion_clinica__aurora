<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpecialismToDoctors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('doctors', function($table)
		{
    	$table->foreign('specialism_id')->references('id')->on('specialisms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('doctors', function($table)
		{
    	$table->dropForeign('doctors_specialism_id_foreign');
		});
	}

}
