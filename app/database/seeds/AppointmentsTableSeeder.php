<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AppointmentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Appointment::create([
				"user_id" => $faker->numberBetween($min = 1, $max = 10),
				"doctor_id" => $faker->numberBetween($min = 1, $max = 10),
				"price" => $faker->numberBetween($min = 10000, $max = 90000),
				"state" => $faker->randomElement($array = array ('reserved','confirmed','canceled','done')),
				"active_at" => $faker->dateTimeThisDecade($max = 'now') 
			]);
			
		}
	}

}