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
                'file_number' => App\Patient::generate_file_number(),
                'first_name' => str_limit('Olayinka', rand(3, 8), ''),
                'last_name' => str_limit('Codenonia', rand(5, 8), ''),
                'phone_number' => '081665595' . $i,
                'password' => bcrypt('081665595' . $i),
                'created_at' => now(),
            ]);
        }
    }
}
