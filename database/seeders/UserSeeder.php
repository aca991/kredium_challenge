<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
            'name' => 'Advisor',
            'email' => 'advisor@example.com',
            'password' =>  Hash::make('test123'),
            ],
        );

        DB::table('users')->insert(
            [
                'name' => 'Advisor 2',
                'email' => 'advisor2@example.com',
                'password' => Hash::make('test123'),
            ]
        );
    }
}
