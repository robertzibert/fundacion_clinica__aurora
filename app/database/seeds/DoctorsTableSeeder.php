<?php

// Composer: "fzaninotto/faker": "v1.3.0"
/**
 * Seeder para la tabla Doctors, rellena la tabla con 10 Doctores distintos
 */
use Faker\Factory as Faker;

class DoctorsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Doctor::create([
				"rut" => $faker->randomNumber($nbDigits = 8),
				"name" => $faker->firstName,
				"lastname" => $faker->lastName,
				"email" => $faker->email, 
				"university" => $faker->word, 
				"password" => $faker->word
			]);
		}
	}

}