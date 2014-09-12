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

		foreach(range(1, 5) as $index)
		{
			Doctor::create([
				"specialism_id" => 1,
				"phone"      => $faker->randomNumber($nbDigits = 7),
				"cellphone"  => $faker->randomNumber($nbDigits = 7),
				"university" => $faker->word, 
				
			]);
		}
	}

}