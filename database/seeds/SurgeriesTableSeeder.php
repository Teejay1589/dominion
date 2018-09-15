<?php

use Illuminate\Database\Seeder;

class SurgeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = App\Visit::count();
        if ($count > 0) {
            for ($i = 0; $i < 25; $i++) {
                $visit = rand(1, $count);
                $surgery = null;
                if (App\Surgery::count() > 0) {
                    $sid = rand(1, App\Surgery::count());
                    if (isset(App\Surgery::findOrFail($sid)->surgery) && App\Surgery::findOrFail($sid)->surgery->visit_id == $visit) {
                        $surgery = rand(0, 1) ? App\Surgery::findOrFail($sid)->surgery->id : $sid;
                    } elseif (App\Surgery::findOrFail($sid)->visit_id == $visit) {
                        $surgery = $sid;
                    }
                }
                if (App\SurgeryName::count() > 0) {
                    $surgery_name = App\SurgeryName::findOrFail(rand(1, App\SurgeryName::count()))->surgery_name;
                }
                DB::table('surgeries')->insert([
                    'user_id' => 1,
                    'visit_id' => $visit,
                    'surgery_id' => $surgery,
                    'surgery_name' => $surgery_name,
                    'surgery_date' => today(),
                    'complications' => rand(0, 1) ? 'complication information' . $i : null,
                    'created_at' => now(),
                ]);
            }
        }
    }
}
