<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Vedas', 'description' => 'The oldest sacred texts of Hinduism'],
            ['name' => 'Upanishads', 'description' => 'Philosophical texts that explore the nature of reality and consciousness'],
            ['name' => 'Puranas', 'description' => 'Ancient Hindu texts that contain stories about deities, kings, and sages'],
            ['name' => 'Itihasas', 'description' => 'Historical epics like Ramayana and Mahabharata'],
            ['name' => 'Agamas', 'description' => 'Texts focusing on temple rituals and worship practices'],
            ['name' => 'Dharma Shastras', 'description' => 'Texts on moral codes and religious duties'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
} 