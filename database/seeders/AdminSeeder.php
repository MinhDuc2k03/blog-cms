<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'display_name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' =>  Hash::make('12345'),
            'role' => '2',
            'remember_token' => Str::random(10),
        ]);
    }
}
