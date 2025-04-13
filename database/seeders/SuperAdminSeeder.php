<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@sanatnguide.com',
            'password' => Hash::make('12345678'),
            'is_superadmin' => true,
            'is_premium' => true,
            'email_verified_at' => now(),
        ]);
    }
} 