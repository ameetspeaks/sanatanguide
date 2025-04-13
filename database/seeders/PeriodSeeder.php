<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    public function run(): void
    {
        $periods = [
            ['name' => 'Vedic Period', 'description' => '1500-500 BCE - Period of the composition of the Vedas'],
            ['name' => 'Epic Period', 'description' => '500 BCE-200 CE - Period of the Ramayana and Mahabharata'],
            ['name' => 'Classical Period', 'description' => '200-1100 CE - Period of the Puranas and philosophical texts'],
            ['name' => 'Medieval Period', 'description' => '1100-1800 CE - Period of bhakti literature'],
            ['name' => 'Modern Period', 'description' => '1800 CE-Present - Modern interpretations and translations'],
        ];

        foreach ($periods as $period) {
            DB::table('periods')->insert($period);
        }
    }
} 