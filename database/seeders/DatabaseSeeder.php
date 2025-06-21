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
            MoonshineUserRoleSeeder::class,
            MoonshineUserSeeder::class,
            TypeSeeder::class,
            TagSeeder::class,
            FeatureSeeder::class,
            LocationSeeder::class,
            TopicCategorySeeder::class,
            SampleContactSeeder::class,
            SampleTopicSeeder::class,
            SampleHotelSeeder::class,
            SampleFloorSeeder::class,
            SampleHotelLocationSeeder::class,
        ]);
    }
}
