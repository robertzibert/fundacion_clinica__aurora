<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DiagnosisTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$i = 1;
		foreach(range(1, 10) as $index)
		{
			Diagnose::create([
				"appointments_id" => $i++,
				"observations" => $faker->text($maxNbChars = 200)
			]);
		}
	}

}