<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			//Foreign Keys
			$table->integer('role_id')->unsigned();
			$table->integer('doctor_id')->unsigned();
			$table->integer('patient_id')->unsigned();

			$table->string('name');
			$table->string('lastname');
      $table->string('email', 100)->unique();
      $table->string('password');
			$table->string('rut')->unique();
			$table->string('remember_token', 100);
			$table->timestamps();
		});
		//Foreign Keys
		Schema::table('users', function($table)
		{	
    	$table->foreign('user_id')->references('id')->on('users');
    	$table->foreign('doctor_id')->references('id')->on('doctors');
    	$table->foreign('patient_id')->references('id')->on('patients');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
