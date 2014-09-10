<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiagnosisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis', function(Blueprint $table)
		{
			$table->increments('id');
			//Foreign Keys
			$table->integer('appointments_id')->unsigned();
			//Diagnosis attr
			$table->text('observations');
			$table->timestamps();


		});
			//Foreign Keys
		Schema::table('diagnosis', function($table)
		{	
    	$table->foreign('appointments_id')->references('id')->on('appointments')->onDelete('cascade');
		});
	}	


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diagnosis');
	}

}
