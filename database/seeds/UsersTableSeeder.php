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
            'role_id' => 2,
            'name' => 'Tunji Oyeniran',
            'email' => 'oyenirantunji2339@gmail.com',
            'password' => bcrypt('kooler'),
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Test Admin',
            'email' => 'test@admin.com',
            'password' => bcrypt('testadmin'),
        ]);
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Test Attendant',
            'email' => 'test@attendant.com',
            'password' => bcrypt('testattendant'),
        ]);
    }
}
