<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'hospital_logo' => null,
            'hospital_name' => 'DOMINION MEDICAL CENTER',
            'hospital_tagline' => 'Specialist Medical And Diagonistics Center',
            'hospital_address' => '4 Nova Road Ado-Ekiti, Ekiti State.',
            'hospital_phone' => '+234(0)8177433899',
            'hospital_email' => 'support@dominionmc.org',
            'sms_username' => 'tunjero',
            'sms_password' => 'dmctest',
            'sms_from' => 'DMC',
            'created_at' => now(),
        ]);
    }
}
