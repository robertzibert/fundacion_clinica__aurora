<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PatientsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			Patient::create([
				"phone"      => $faker->randomNumber($nbDigits = 7),
				"cellphone"  => $faker->randomNumber($nbDigits = 7),
				"insurance"  => $faker->randomElement($array = array ('Isapre','Cruz Blanca','Magallanes')),
				"blood_type" => $faker->randomElement($array = array ('a','b','c')),
				"address"    => $faker->address,		
				"gender"     =>$faker->randomElement($array = array ('male','femenin')),
			]);
		}
	}

}