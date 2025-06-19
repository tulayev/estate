<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create tags with specific IDs to match Constants::SYSTEM_TAG_IDS
        $tags = [
            1 => ['en' => 'Villa', 'ru' => 'Вилла'],
            2 => ['en' => 'Apartment', 'ru' => 'Апартаменты'],
            3 => ['en' => 'Projects', 'ru' => 'Проекты'],
            4 => ['en' => 'Condominium', 'ru' => 'Кондоминиум'],
            5 => ['en' => 'Commercial', 'ru' => 'Коммерческая'],
            6 => ['en' => 'Land', 'ru' => 'Земельный участок'],  // land => 6
        ];

        foreach ($tags as $id => $names) {
            DB::table('tags')->insert([
                'id' => $id,
                'name' => json_encode($names),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
