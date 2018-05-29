<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 4,
            'first_name' => '',
            'last_name' => 'Awoleke',
            'email' => 'awoleke@dominionmc.org',
            'gender' => 'MALE',
            'phone' => '090',
            'password' => bcrypt('awoleke'),
        ]);
        DB::table('users')->insert([
            'role_id' => 4,
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'email' => 'test@admin.com',
            'gender' => 'MALE',
            'phone' => '080',
            'password' => bcrypt('testadmin'),
        ]);
        DB::table('users')->insert([
            'role_id' => 1,
            'first_name' => 'Test',
            'last_name' => 'Staff',
            'email' => 'test@staff.com',
            'gender' => 'FEMALE',
            'phone' => '080',
            'password' => bcrypt('teststaff'),
        ]);
    }
}
