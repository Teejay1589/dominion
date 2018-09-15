<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(VisitsTableSeeder::class);
        $this->call(SurgeryNamesTableSeeder::class);
        $this->call(SurgeriesTableSeeder::class);
        $this->call(BillingsTableSeeder::class);
    }
}
