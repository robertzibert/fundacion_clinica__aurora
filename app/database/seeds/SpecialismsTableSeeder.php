<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SpecialismsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 3) as $index)
		{
			Specialism::create([
				'name' => $faker->unique()->randomElement($array = array ('Geriatría','Pediatría','Kinesiología'))
			]);
		}
	}

}