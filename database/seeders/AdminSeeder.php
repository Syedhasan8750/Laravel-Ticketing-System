<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@demoUser.com',
            'password' => Hash::make('admin@123'), // secure hash of the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
