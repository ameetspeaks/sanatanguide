<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            LanguageSeeder::class,
            PeriodSeeder::class,
            ScriptureSeeder::class,
            PujaSeeder::class,
            TempleSeeder::class,
            DailyWisdomSeeder::class,
        ]);
    }
}
