<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            // Super Admin
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'Super Admin',
                'created_at' => Carbon::now(),
            ],
            // Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'Admin',
                'created_at' => Carbon::now(),
            ],
            // Editor
            [
                'name' => 'Editor',
                'username' => 'editor',
                'email' => 'editor@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'Editor',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
