<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 * Importante respetar el orden de las tablas que se llenan!!!!
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('AdminsTableSeeder');
		$this->call('DoctorsTableSeeder');
		$this->call('AppointmentsTableSeeder');
		$this->call('DiagnosisTableSeeder');
	}

}
