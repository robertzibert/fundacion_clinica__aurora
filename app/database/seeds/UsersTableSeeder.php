<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
				"name" => $faker->firstName,
				"lastname" => $faker->lastName,
				"insurance" => $faker->randomElement($array = array ('Isapre','Cruz Blanca','Magallanes')),
				"blood_type" => $faker->randomElement($array = array ('a','b','c')),
				"rut" => $faker->randomNumber($nbDigits = 8),
				"phone" => $faker->randomNumber($nbDigits = 7),
				"cellphone" => $faker->randomNumber($nbDigits = 7),
				"address" => $faker->address		
			]);
		}
	}

}