<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create superadmin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@satyasanatan.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543210',
            'birth_date' => '1990-01-01',
            'location' => 'Mumbai, India',
            'gotra' => 'Kashyap',
            'role' => 'admin',
            'is_superadmin' => true,
            'is_premium' => true,
            'email_verified_at' => now(),
        ]);

        // Create regular admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543211',
            'birth_date' => '1992-05-15',
            'location' => 'Delhi, India',
            'gotra' => 'Bharadwaj',
            'role' => 'admin',
            'is_superadmin' => false,
            'is_premium' => true,
            'email_verified_at' => now(),
        ]);

        // Create premium users
        User::create([
            'name' => 'Premium User 1',
            'email' => 'premium1@example.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543212',
            'birth_date' => '1988-08-20',
            'location' => 'Bangalore, India',
            'gotra' => 'Vasishtha',
            'role' => 'user',
            'is_superadmin' => false,
            'is_premium' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Premium User 2',
            'email' => 'premium2@example.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543213',
            'birth_date' => '1995-03-10',
            'location' => 'Chennai, India',
            'gotra' => 'Atri',
            'role' => 'user',
            'is_superadmin' => false,
            'is_premium' => true,
            'email_verified_at' => now(),
        ]);

        // Create regular users
        User::create([
            'name' => 'Regular User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543214',
            'birth_date' => '1993-11-25',
            'location' => 'Kolkata, India',
            'gotra' => 'Gautam',
            'role' => 'user',
            'is_superadmin' => false,
            'is_premium' => false,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Regular User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543215',
            'birth_date' => '1997-07-05',
            'location' => 'Hyderabad, India',
            'gotra' => 'Jamadagni',
            'role' => 'user',
            'is_superadmin' => false,
            'is_premium' => false,
            'email_verified_at' => now(),
        ]);

        // Create unverified users
        User::create([
            'name' => 'Unverified User 1',
            'email' => 'unverified1@example.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543216',
            'birth_date' => '1994-09-30',
            'location' => 'Pune, India',
            'gotra' => 'Vishvamitra',
            'role' => 'user',
            'is_superadmin' => false,
            'is_premium' => false,
            'email_verified_at' => null,
        ]);

        User::create([
            'name' => 'Unverified User 2',
            'email' => 'unverified2@example.com',
            'password' => Hash::make('password'),
            'phone' => '+919876543217',
            'birth_date' => '1996-12-15',
            'location' => 'Ahmedabad, India',
            'gotra' => 'Agastya',
            'role' => 'user',
            'is_superadmin' => false,
            'is_premium' => false,
            'email_verified_at' => null,
        ]);
    }
} 