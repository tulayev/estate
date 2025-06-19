<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::withoutEvents(function () {
            $hotels = [
                [
                    'title' => 'Sample Villa 1',
                    'description' => [
                        'en' => "A beautiful sample villa with modern amenities.",
                        'ru' => "Красивая образцовая вилла с современными удобствами.",
                    ],
                    'codename' => 'SAMPLE-001',
                    'latitude' => 8.010658936,
                    'longitude' => 98.30201626,
                    'price' => 350000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 1',
                        'ru' => 'Локация 1',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [1],
                    'features' => [1, 2, 3],
                    'types' => [1]
                ],
                [
                    'title' => 'Sample Villa 2',
                    'description' => [
                        'en' => "Another sample villa with pool and garden.",
                        'ru' => "Еще одна образцовая вилла с бассейном и садом.",
                    ],
                    'codename' => 'SAMPLE-002',
                    'latitude' => 8.010350836,
                    'longitude' => 98.30283701,
                    'price' => 400000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 2',
                        'ru' => 'Локация 2',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [1],
                    'features' => [1, 2, 3, 4, 5],
                    'types' => [1, 2]
                ],
                [
                    'title' => 'Sample Apartment 1',
                    'description' => [
                        'en' => "Modern apartment with city views.",
                        'ru' => "Современная квартира с видом на город.",
                    ],
                    'codename' => 'SAMPLE-003',
                    'latitude' => 7.99681635,
                    'longitude' => 98.29939991,
                    'price' => 100000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 3',
                        'ru' => 'Локация 3',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [2],
                    'features' => [1, 2, 3],
                    'types' => [1]
                ],
                [
                    'title' => 'Sample Project 1',
                    'description' => [
                        'en' => "Upcoming development project.",
                        'ru' => "Предстоящий девелоперский проект.",
                    ],
                    'codename' => 'SAMPLE-004',
                    'latitude' => 7.982843973,
                    'longitude' => 98.30223083,
                    'price' => 2500000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 4',
                        'ru' => 'Локация 4',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [1, 3],
                    'features' => [1, 2, 3, 4, 5],
                    'types' => [3, 4]
                ],
                [
                    'title' => 'Sample Condo 1',
                    'description' => [
                        'en' => "Luxury condominium with amenities.",
                        'ru' => "Роскошный кондоминиум с удобствами.",
                    ],
                    'codename' => 'SAMPLE-005',
                    'latitude' => 7.951737275,
                    'longitude' => 98.35988184,
                    'price' => 800000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 5',
                        'ru' => 'Локация 5',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [4],
                    'features' => [1, 2, 3],
                    'types' => [1, 2]
                ],
                [
                    'title' => 'Sample Villa 3',
                    'description' => [
                        'en' => "Spacious villa with private garden.",
                        'ru' => "Просторная вилла с частным садом.",
                    ],
                    'codename' => 'SAMPLE-006',
                    'latitude' => 7.989305615,
                    'longitude' => 98.30665417,
                    'price' => 1200000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 6',
                        'ru' => 'Локация 6',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [1],
                    'features' => [1, 2, 3, 4],
                    'types' => [2, 3]
                ],
                [
                    'title' => 'Sample Villa 4',
                    'description' => [
                        'en' => "Elegant villa with sea views.",
                        'ru' => "Элегантная вилла с видом на море.",
                    ],
                    'codename' => 'SAMPLE-007',
                    'latitude' => 7.997593683,
                    'longitude' => 98.32731217,
                    'price' => 1600000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 7',
                        'ru' => 'Локация 7',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [1, 3],
                    'features' => [1, 2, 3, 4, 5],
                    'types' => [2, 4]
                ],
                [
                    'title' => 'Sample Apartment 2',
                    'description' => [
                        'en' => "Modern apartment complex.",
                        'ru' => "Современный жилой комплекс.",
                    ],
                    'codename' => 'SAMPLE-008',
                    'latitude' => 7.974333363,
                    'longitude' => 98.2850647,
                    'price' => 600000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 8',
                        'ru' => 'Локация 8',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [2, 3],
                    'features' => [1, 2, 3],
                    'types' => [4]
                ],
                [
                    'title' => 'Sample Villa 5',
                    'description' => [
                        'en' => "Luxury villa development.",
                        'ru' => "Роскошный вилловый комплекс.",
                    ],
                    'codename' => 'SAMPLE-009',
                    'latitude' => 8.028549604,
                    'longitude' => 98.29947352,
                    'price' => 2800000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 9',
                        'ru' => 'Локация 9',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [1, 3],
                    'features' => [1, 2, 3, 4, 5],
                    'types' => [3, 4, 5]
                ],
                [
                    'title' => 'Sample Villa 6',
                    'description' => [
                        'en' => "Contemporary villa with amenities.",
                        'ru' => "Современная вилла с удобствами.",
                    ],
                    'codename' => 'SAMPLE-010',
                    'latitude' => 8.056170228,
                    'longitude' => 98.34617615,
                    'price' => 3200000,
                    'main_image_url' => null,
                    'active' => 1,
                    'location' => [
                        'en' => 'Location 10',
                        'ru' => 'Локация 10',
                    ],
                    'location_description' => [
                        'en' => 'Sample location description',
                        'ru' => 'Образцовое описание локации',
                    ],
                    'tags' => [1, 3],
                    'features' => [1, 2, 3],
                    'types' => [3, 4]
                ],
            ];

            foreach ($hotels as $hotelData) {
                // Generate slug from title
                $hotelData['slug'] = Str::slug($hotelData['title']);

                // Extract relationship arrays
                $typesArray = $hotelData['types'];
                $featuresArray = $hotelData['features'];
                $tagsArray = $hotelData['tags'];

                // Remove relationship keys before inserting
                unset($hotelData['types'], $hotelData['features'], $hotelData['tags']);

                // Create the hotel record
                $hotel = Hotel::create($hotelData);

                // Attach relationships
                if (!empty($typesArray)) {
                    $hotel->types()->attach($typesArray);
                }
                if (!empty($featuresArray)) {
                    $hotel->features()->attach($featuresArray);
                }
                if (!empty($tagsArray)) {
                    $hotel->tags()->attach($tagsArray);
                }
            }
        });
    }
}
