<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PujaSeeder extends Seeder
{
    public function run(): void
    {
        $pujas = [
            [
                'name' => 'Ganesh Puja',
                'slug' => Str::slug('Ganesh Puja'),
                'description' => 'A sacred ritual dedicated to Lord Ganesha, the remover of obstacles.',
                'category' => 'Daily',
                'duration' => '60',
                'price' => 1100,
                'benefits' => 'Removes obstacles, brings success and prosperity.',
                'required_materials' => 'Red flowers, modak, durva grass, red cloth',
                'procedure' => 'Start with meditation, followed by sankalpam, and then the main puja rituals.',
                'significance' => 'Ganesh Puja is performed to seek blessings for success, wisdom, and removal of obstacles.',
                'required_items' => json_encode(['Ganesha idol', 'Modak', 'Durva grass', 'Red flowers', 'Sandalwood paste']),
                'featured_image' => 'pujas/ganesh-puja.jpg',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lakshmi Puja',
                'slug' => Str::slug('Lakshmi Puja'),
                'description' => 'A ritual to invoke Goddess Lakshmi for wealth and prosperity.',
                'category' => 'Festival',
                'duration' => '90',
                'price' => 1500,
                'benefits' => 'Brings wealth, prosperity, and abundance.',
                'required_materials' => 'Lotus flowers, gold coins, rice, sweets',
                'procedure' => 'Begin with purification, followed by deity invocation and main puja.',
                'significance' => 'Lakshmi Puja is performed to invoke the blessings of the goddess of wealth and prosperity.',
                'required_items' => json_encode(['Lakshmi idol', 'Lotus flowers', 'Gold coins', 'Rice', 'Sweets']),
                'featured_image' => 'pujas/lakshmi-puja.jpg',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rudra Abhishekam',
                'slug' => Str::slug('Rudra Abhishekam'),
                'description' => 'A powerful ritual dedicated to Lord Shiva.',
                'category' => 'Special',
                'duration' => '120',
                'price' => 2500,
                'benefits' => 'Removes negative energies, brings peace and prosperity.',
                'required_materials' => 'Milk, honey, ghee, bilva leaves, rudraksha',
                'procedure' => 'Starts with purification, followed by abhishekam and homam.',
                'significance' => 'Rudra Abhishekam is performed to seek the blessings of Lord Shiva for peace and prosperity.',
                'required_items' => json_encode(['Shiva lingam', 'Milk', 'Honey', 'Ghee', 'Bilva leaves']),
                'featured_image' => 'pujas/rudra-abhishekam.jpg',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($pujas as $puja) {
            DB::table('pujas')->insert($puja);
        }
    }
} 