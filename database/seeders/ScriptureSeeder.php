<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScriptureSeeder extends Seeder
{
    public function run(): void
    {
        $scriptures = [
            [
                'name' => 'Bhagavad Gita',
                'description' => 'The divine song of Lord Krishna',
                'category' => 'Itihasas',
                'language' => 'Sanskrit',
                'period' => 'Epic Period',
                'author' => 'Vyasa',
                'content' => 'The Bhagavad Gita is a 700-verse Hindu scripture that is part of the epic Mahabharata.',
                'teachings' => 'Karma Yoga, Bhakti Yoga, Jnana Yoga',
                'commentary' => 'Various commentaries by Adi Shankaracharya, Ramanuja, and others',
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'name' => 'Rig Veda',
                'description' => 'The oldest of the four Vedas',
                'category' => 'Vedas',
                'language' => 'Sanskrit',
                'period' => 'Vedic Period',
                'author' => 'Various Rishis',
                'content' => 'Collection of 1,028 hymns and 10,600 verses',
                'teachings' => 'Spiritual wisdom, rituals, and philosophy',
                'commentary' => 'Commentary by Sayana and others',
                'is_featured' => true,
                'is_active' => true
            ],
            [
                'name' => 'Upanishads',
                'description' => 'Principal philosophical texts of Hinduism',
                'category' => 'Upanishads',
                'language' => 'Sanskrit',
                'period' => 'Vedic Period',
                'author' => 'Various Rishis',
                'content' => 'Collection of philosophical texts that form the theoretical basis for Hindu religion',
                'teachings' => 'Nature of Brahman, Atman, and the universe',
                'commentary' => 'Various commentaries by different philosophers',
                'is_featured' => true,
                'is_active' => true
            ]
        ];

        foreach ($scriptures as $scripture) {
            DB::table('scriptures')->insert($scripture);
        }
    }
} 