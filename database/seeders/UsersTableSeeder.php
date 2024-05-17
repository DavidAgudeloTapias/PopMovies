<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'David Agudelo',
                'email' => 'david@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 2,
                'name' => 'Daniel Correa',
                'email' => 'daniel@danielgara.com',
                'password' => Hash::make('danielgara'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 5,
                'name' => 'David Agudelo',
                'email' => 'dagudelot@eafit.edu.co',
                'password' => Hash::make('passwordVerySecret'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'admin',
                'balance' => 5000,
            ],
            [
                'id' => 6,
                'name' => 'Natalia Agudelo',
                'email' => 'nati_agudelo@gmail.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 7,
                'name' => 'David González',
                'email' => 'dave@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 8,
                'name' => 'María José González',
                'email' => 'majogope@gmail.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
        ]);
    }
}
