<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'username'=>'admin',
            'roles'=>'["ADMIN"]',
            'address' => 'abscsadasdasda',
            'avatar'=>'default.png',
            'status'=>'ACTIVE'
        ]);
        DB::table('users')->insert([
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('12345678'),
            'username'=>'admin2',
            'roles'=>'["ADMIN"]',
            'address' => 'abscsadasdasda',
            'avatar'=>'avatars/V33DUE3irKMogH0KI3QZLMXKWZbXM7gO69Oozj4I.png',
            'status'=>'ACTIVE'
        ]);
    }
}
