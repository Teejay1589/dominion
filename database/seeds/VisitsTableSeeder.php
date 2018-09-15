<?php

use Illuminate\Database\Seeder;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visit_types = collect(['CONSULTATION', 'DELIVERY', 'EMERGENCY', 'OTHERS']);

        for ($i = 0; $i < 25; $i++) {
            $type = $visit_types->random();
            if ($type == 'DELIVERY') {
                DB::table('visits')->insert([
                    'user_id' => 1,
                    'patient_id' => rand(1, 25),
                    'type' => $type,
                    'title' => $type . ' Visit Test ' . $i,
                    'successful_delivery' => rand(0, 1),
                    'created_at' => now(),
                ]);
            } else {
                DB::table('visits')->insert([
                    'user_id' => 1,
                    'patient_id' => rand(1, 25),
                    'type' => $type,
                    'title' => $type . ' Visit Test ' . $i,
                    // 'successful_delivery' => rand(0, 1),
                    'created_at' => now(),
                ]);
            }
        }
    }
}
