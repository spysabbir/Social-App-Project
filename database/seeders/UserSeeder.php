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
            // Admin
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'Super Admin',
                'profile_photo' => 'default_profile_photo.png',
                'status' => 'Active',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
