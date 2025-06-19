<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create types with specific IDs to match Constants::SYSTEM_TYPE_IDS
        $types = [
            1 => ['en' => 'For Rent', 'ru' => 'Для аренды'],       // rent => 1
            2 => ['en' => 'Completed', 'ru' => 'Завершено'],       // additional type
            3 => ['en' => 'Primary', 'ru' => 'Первичный'],         // primary => 3
            4 => ['en' => 'Off Plan', 'ru' => 'На этапе строительства'], // additional type
            5 => ['en' => 'Structure', 'ru' => 'Структура'],       // additional type
            6 => ['en' => 'Resales', 'ru' => 'Перепродажа'],       // resales => 6
        ];

        foreach ($types as $id => $names) {
            DB::table('types')->insert([
                'id' => $id,
                'name' => json_encode($names),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
