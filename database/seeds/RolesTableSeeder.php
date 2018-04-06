<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'STAFF',
        ]);
        DB::table('roles')->insert([
            'name' => 'DOCTOR',
        ]);
        DB::table('roles')->insert([
            'name' => 'SURGEON',
        ]);
        DB::table('roles')->insert([
            'name' => 'ADMIN',
        ]);
    }
}
