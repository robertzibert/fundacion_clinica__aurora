<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		//Creamos al admin
		 Provider::create([


						"name"     =>"Robert",                             
						"lastname" =>"Zibert", 
						"email"    =>"q@q.q",                             
						"rut"      =>"22",                                                                      
						"password" => "123"                            

        ]);


		$faker = Faker::create();
		//Creamos Doctors
		foreach(range(1, 5) as $index)
		{
			User::create([
				"doctor_id" =>1,                                                          
				"name"      => $faker->firstName,                                  
				"lastname"  => $faker->lastName,                            
				"rut"       => $faker->randomNumber($nbDigits = 8),
				"password"  => "123"                                                    

			]);
		}
		//Creamos Patiens
		foreach(range(1, 5) as $index)
		{
			User::create([
				"patient_id" =>1,
				"name"       => $faker->firstName,
				"lastname"   => $faker->lastName,
				"rut"        => $faker->randomNumber($nbDigits = 8),
				"password"   => "123"                                                    
			]);
		}
	}

}