<?php

use Illuminate\Database\Seeder;

class CasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 25; $i++) {
        	DB::table('cases')->insert([
                'patient_id' => rand(1,25),
	            'title' => 'Lorem ipsum dolor '.$i,
	            'is_consultation' => rand(0,1),
	            'is_emergency' => rand(0,1),
	            'is_delivery' => rand(0,1),
	        ]);
        }
    }
}
