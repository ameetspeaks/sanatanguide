<?php

namespace Database\Seeders;

use App\Models\DailyWisdom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyWisdomSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::table('daily_wisdoms')->truncate();

        $wisdoms = [
            [
                'title' => 'The Power of Truth',
                'content' => 'Truth is the foundation of all virtues. Speak the truth, but speak it sweetly.',
                'source' => 'Bhagavad Gita',
                'date' => now(),
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'The Path of Dharma',
                'content' => 'Better is one\'s own dharma though imperfect than the dharma of another well performed.',
                'source' => 'Bhagavad Gita',
                'date' => now()->addDay(),
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($wisdoms as $wisdom) {
            DailyWisdom::create($wisdom);
        }
    }
} 