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
			$table->primary('id');
			$table->string('name');
			$table->string('lastname');
			$table->string('insurance');
			$table->string('blood_type');
			$table->string('rut')->unique();
			$table->integer('phone')->unique();
			$table->integer('cellphone')->unique();
			$table->string('address');
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
		Schema::drop('users');
	}

}
