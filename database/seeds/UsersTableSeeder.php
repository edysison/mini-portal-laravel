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
            'name' => 'admin',
            'email' => 'admin@miniportal.com',
            'cpf' => '00000000000',
            'password' => bcrypt('secret'),
            'role' => 'admin',
            'active' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@miniportal.com',
            'cpf' => '00000000001',
            'password' => bcrypt('secret'),
            'role' => 'editor',
            'active' => 1,
        ]);
    }
}
