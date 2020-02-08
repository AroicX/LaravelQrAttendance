<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Course');
       



        for ($i=0; $i <= 50 ; $i++) { 
    
            
    		DB::table('courses')->insert([
    		    'level_id' => $i * 50/100,
                'course_title' => $faker->name,
                'course_code' => $faker->name.''.$faker->randomNumber(1),
                'course_unit' => $faker->randomNumber(1),
    			
    		
            ]);
            
            
    	}
    }
}
