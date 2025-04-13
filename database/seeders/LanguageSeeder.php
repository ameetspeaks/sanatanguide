<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            ['name' => 'Sanskrit', 'description' => 'The classical language of Hinduism'],
            ['name' => 'Hindi', 'description' => 'Modern Indian language'],
            ['name' => 'English', 'description' => 'English translations'],
            ['name' => 'Tamil', 'description' => 'Classical language of South India'],
            ['name' => 'Telugu', 'description' => 'Language of Andhra Pradesh and Telangana'],
            ['name' => 'Bengali', 'description' => 'Language of Bengal region'],
        ];

        foreach ($languages as $language) {
            DB::table('languages')->insert($language);
        }
    }
} 