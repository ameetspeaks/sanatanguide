<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TempleSeeder extends Seeder
{
    public function run(): void
    {
        $temples = [
            [
                'name' => 'Shri Siddhivinayak Temple',
                'slug' => Str::slug('Shri Siddhivinayak Temple'),
                'description' => 'One of the most famous and visited temples in Mumbai, dedicated to Lord Ganesha.',
                'deity' => 'Lord Ganesha',
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'country' => 'India',
                'history' => 'Built in 1801 by Laxman Vithu and Deubai Patil.',
                'significance' => 'Known for wish fulfillment and divine blessings.',
                'location' => 'Prabhadevi, Mumbai',
                'pincode' => '400025',
                'address' => 'S.K. Bole Marg, Prabhadevi, Mumbai - 400025',
                'latitude' => 19.0169,
                'longitude' => 72.8286,
                'opening_time' => '05:30:00',
                'closing_time' => '22:00:00',
                'architecture' => 'Traditional Hindu temple architecture with a dome and gold-plated roof.',
                'how_to_reach' => 'Nearest railway station: Dadar. Buses and taxis available from all parts of Mumbai.',
                'accommodation' => 'Various hotels and guest houses available nearby.',
                'contact_number' => '+91-22-2437-3626',
                'email' => 'info@siddhivinayak.org',
                'website' => 'https://www.siddhivinayak.org',
                'special_timings' => json_encode([
                    'Mondays' => '05:30 - 22:00',
                    'Tuesdays' => '05:30 - 22:00',
                    'Saturdays' => '05:30 - 22:00'
                ]),
                'festivals' => json_encode([
                    'Ganesh Chaturthi',
                    'Angarki Chaturthi',
                    'Sankashti Chaturthi'
                ]),
                'rules' => json_encode([
                    'No photography inside the temple',
                    'Maintain silence',
                    'Dress modestly'
                ]),
                'facilities' => json_encode([
                    'Cloak room',
                    'Prasad counter',
                    'Wheelchair access'
                ]),
                'featured_image' => 'temples/siddhivinayak.jpg',
                'gallery' => json_encode([
                    'temples/siddhivinayak-1.jpg',
                    'temples/siddhivinayak-2.jpg',
                    'temples/siddhivinayak-3.jpg'
                ]),
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Shri Krishna Janmabhoomi Temple',
                'slug' => Str::slug('Shri Krishna Janmabhoomi Temple'),
                'description' => 'The birthplace of Lord Krishna, one of the most sacred sites in Hinduism.',
                'deity' => 'Lord Krishna',
                'city' => 'Mathura',
                'state' => 'Uttar Pradesh',
                'country' => 'India',
                'history' => 'Ancient temple marking the birthplace of Lord Krishna.',
                'significance' => 'Marks the exact spot where Lord Krishna was born.',
                'location' => 'Mathura, Uttar Pradesh',
                'pincode' => '281001',
                'address' => 'Janmabhoomi Marg, Mathura - 281001',
                'latitude' => 27.4924,
                'longitude' => 77.6737,
                'opening_time' => '05:00:00',
                'closing_time' => '21:00:00',
                'architecture' => 'Traditional Hindu temple architecture with intricate carvings.',
                'how_to_reach' => 'Nearest railway station: Mathura Junction. Well connected by road and rail.',
                'accommodation' => 'Various dharamshalas and hotels available nearby.',
                'contact_number' => '+91-565-250-6531',
                'email' => 'info@krishnajanmabhoomi.org',
                'website' => 'https://www.krishnajanmabhoomi.org',
                'special_timings' => json_encode([
                    'Janmashtami' => '24 hours',
                    'Holi' => '05:00 - 22:00'
                ]),
                'festivals' => json_encode([
                    'Janmashtami',
                    'Holi',
                    'Krishna Jayanti'
                ]),
                'rules' => json_encode([
                    'No leather items allowed',
                    'Maintain decorum',
                    'Follow temple guidelines'
                ]),
                'facilities' => json_encode([
                    'Cloak room',
                    'Prasad counter',
                    'Guided tours'
                ]),
                'featured_image' => 'temples/krishna-janmabhoomi.jpg',
                'gallery' => json_encode([
                    'temples/krishna-janmabhoomi-1.jpg',
                    'temples/krishna-janmabhoomi-2.jpg',
                    'temples/krishna-janmabhoomi-3.jpg'
                ]),
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($temples as $temple) {
            DB::table('temples')->insert($temple);
        }
    }
} 