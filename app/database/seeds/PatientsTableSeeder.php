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
				"gender"     =>$faker->randomElement($array = array ('male','femenino')),
			]);
		}
	}

}http://jaidefinichon.com/page/5