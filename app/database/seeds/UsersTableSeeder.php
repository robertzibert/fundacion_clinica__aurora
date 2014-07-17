<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		//Creamos al admin
		 User::create([

		 				"role_id"  =>1,
						"name"     =>"Robert",                             
						"lastname" =>"Zibert", 
						"email"    =>"q@q.q",                             
						"rut"      =>"22",                                                                      
						"password" => "123"                            

        ]);


		$faker = Faker::create();
		$a = 1;
		$i = 1;
		//Creamos Doctors
		foreach(range(1, 5) as $index)
		{
			User::create([
				"doctor_id" =>$i++,                                                          
				"name"      => $faker->firstName,                                  
				"lastname"  => $faker->lastName,                            
				"rut"       => $faker->randomNumber($nbDigits = 8),
				"password"  => "123", 
				"email"     => $faker->email
                                                  

			]);
		}
		
		//Creamos Patiens
		foreach(range(1, 5) as $index)
		{
			User::create([
				"patient_id" =>$a++,
				"name"       => $faker->firstName,
				"lastname"   => $faker->lastName,
				"rut"        => $faker->randomNumber($nbDigits = 8),
				"password"   => "123",
				"email"      => $faker->email                                                    
			]);
		}
	}

}