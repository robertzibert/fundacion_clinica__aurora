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
				"patient_id"   => $faker->numberBetween($min = 1, $max = 5),
				"doctor_id" => $faker->numberBetween($min = 1, $max = 5),
				"price"     => $faker->numberBetween($min = 10000, $max = 90000),
				"state"     => $faker->randomElement($array = array ('reserved','confirmed','canceled','done','voided')),
				"active_at" => $faker->dateTimeThisDecade($max = 'now') 
			]);
			
		}
	}

}