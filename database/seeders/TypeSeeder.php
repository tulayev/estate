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
        $types = [
            'For Rent'   => 'Для аренды',
            'Completed'  => 'Завершено',
            'Primary'    => 'Первичный',
            'Off Plan'   => 'На этапе строительства',
            'Structure'  => 'Структура',
        ];

        foreach ($types as $en => $ru) {
            DB::table('types')->insert([
                'name' => json_encode([
                    'en' => $en,
                    'ru' => $ru,
                ]),
            ]);
        }
    }
}
