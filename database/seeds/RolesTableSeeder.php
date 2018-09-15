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
            'name' => 'ADMIN',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'DOCTOR',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'SURGEON',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'STAFF',
            'created_at' => now(),
        ]);
    }
}
