<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('12345678'),
            'username'=>'admin2',
            'roles'=>'["ADMIN"]',
            'address' => 'abscsadasdasda',
            'avatar'=>'default.png',
            'status'=>'ACTIVE'
        ]);
    }
}
