<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'id' => 1,
                'name' => '{"en": "Location 1", "ru": "Локация 1"}',
                'longitude' => 98.3507,
                'latitude' => 8.0426,
                'description' => '{"en": "Sample location description 1", "ru": "Описание локации 1"}',
                'polygon' => null
            ],
            [
                'id' => 2,
                'name' => '{"en": "Location 2", "ru": "Локация 2"}',
                'longitude' => 98.3206,
                'latitude' => 8.1937,
                'description' => '{"en": "Sample location description 2", "ru": "Описание локации 2"}',
                'polygon' => null
            ],
            [
                'id' => 3,
                'name' => '{"en": "Location 3", "ru": "Локация 3"}',
                'longitude' => 98.3175,
                'latitude' => 7.9672,
                'description' => '{"en": "Sample location description 3", "ru": "Описание локации 3"}',
                'polygon' => null
            ],
            [
                'id' => 4,
                'name' => '{"en": "Location 4", "ru": "Локация 4"}',
                'longitude' => 98.3958,
                'latitude' => 7.8749,
                'description' => '{"en": "Sample location description 4", "ru": "Описание локации 4"}',
                'polygon' => null
            ],
            [
                'id' => 5,
                'name' => '{"en": "Location 5", "ru": "Локация 5"}',
                'longitude' => 98.4145,
                'latitude' => 7.9232,
                'description' => '{"en": "Sample location description 5", "ru": "Описание локации 5"}',
                'polygon' => null
            ],
            [
                'id' => 6,
                'name' => '{"en": "Location 6", "ru": "Локация 6"}',
                'longitude' => 98.322,
                'latitude' => 7.9826,
                'description' => '{"en": "Sample location description 6", "ru": "Описание локации 6"}',
                'polygon' => null
            ],
            [
                'id' => 7,
                'name' => '{"en": "Location 7", "ru": "Локация 7"}',
                'longitude' => 98.3183,
                'latitude' => 7.9839,
                'description' => '{"en": "Sample location description 7", "ru": "Описание локации 7"}',
                'polygon' => null
            ],
            [
                'id' => 8,
                'name' => '{"en": "Location 8", "ru": "Локация 8"}',
                'longitude' => 98.2881,
                'latitude' => 8.0222,
                'description' => '{"en": "Sample location description 8", "ru": "Описание локации 8"}',
                'polygon' => null
            ],
            [
                'id' => 9,
                'name' => '{"en": "Location 9", "ru": "Локация 9"}',
                'longitude' => 98.3131,
                'latitude' => 8.1997,
                'description' => '{"en": "Sample location description 9", "ru": "Описание локации 9"}',
                'polygon' => null
            ],
            [
                'id' => 10,
                'name' => '{"en": "Location 10", "ru": "Локация 10"}',
                'longitude' => 98.3081,
                'latitude' => 7.969,
                'description' => '{"en": "Sample location description 10", "ru": "Описание локации 10"}',
                'polygon' => null
            ]
        ];

        foreach ($locations as $location) {
            DB::table('locations')->insert($location);
        }
    }
}
