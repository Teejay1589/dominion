<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 25; $i++) {
        	DB::table('patients')->insert([
                'user_id' => 1,
	            'first_name' => str_random(rand(5,8)),
	            'last_name' => str_random(rand(3,8)),
	            'phone' => '081665595'.$i,
	            'password' => bcrypt('081665595'.$i),
	        ]);
        }
    }
}
