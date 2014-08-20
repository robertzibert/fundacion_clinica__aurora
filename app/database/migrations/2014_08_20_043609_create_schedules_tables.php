<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('date');
			$table->time('hour');	
			$table->timestamps();

			$table->integer('doctor_id')->nullable()->unsigned();
			
		});
		Schema::table('schedules', function($table)
		{	
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
		Schema::drop('schedules');
	}

}
