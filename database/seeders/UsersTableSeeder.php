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
                'email_verified_at' => '',
                'password' => Hash::make('12345678'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 2,
                'name' => 'Daniel Correa',
                'email' => 'daniel@danielgara.com',
                'email_verified_at' => '',
                'password' => Hash::make('danielgara'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 5,
                'name' => 'David Agudelo',
                'email' => 'dagudelot@eafit.edu.co',
                'email_verified_at' => '',
                'password' => Hash::make('passwordVerySecret'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'admin',
                'balance' => 5000,
            ],
            [
                'id' => 6,
                'name' => 'Natalia Agudelo',
                'email' => 'nati_agudelo@gmail.com',
                'email_verified_at' => '',
                'password' => Hash::make('123456789'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 7,
                'name' => 'David González',
                'email' => 'dave@gmail.com',
                'email_verified_at' => '',
                'password' => Hash::make('12345678'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
            [
                'id' => 8,
                'name' => 'María José González',
                'email' => 'majogope@gmail.com',
                'email_verified_at' => '',
                'password' => Hash::make('123456789'),
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
                'role' => 'client',
                'balance' => 5000,
            ],
        ]);
    }
}
