<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table)
		{
			$table->increments('id');
			//Foreign Keys
			$table->integer('patient_id')->unsigned();
			$table->integer('doctor_id')->unsigned();
			//appointments attr
			$table->integer('price');
			$table->text('state');
			$table->dateTime('active_at');	
			$table->timestamps();
		});

	//Foreign Keys
		Schema::table('appointments', function($table)
		{	
    	$table->foreign('patient_id')->references('id')->on('patients');
    	$table->foreign('doctor_id')->references('id')->on('doctors');
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointments');
	}

}
