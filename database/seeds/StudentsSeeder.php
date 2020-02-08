<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Stduent;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('App\Student');
       



        for ($i=0; $i <= 50 ; $i++) { 
    
            
    		DB::table('students')->insert([
    		    'fullname' => $faker->name,
    			'email' => $faker->email,
                'level' => floor($faker->randomNumber(4)),
    			'matric_no' => 'SU1610200'.$i,
    			'gender' => 'Male',
    			'phone' => $faker->randomNumber(8),
    			'course' => 'Computer Science',
                'parent_name' => $faker->name,
                'parent_number' => $faker->randomNumber(8),
    			'password' => md5('_Arowosegbe1'),
    			

            ]);
            
            
    	}
        
    }
}
