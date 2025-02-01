<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'en' => 'primary',
                'ru' => 'первичный',
            ],
            [
                'en' => 'resale',
                'ru' => 'перепродажа',
            ],
            [
                'en' => 'land',
                'ru' => 'земля',
            ],
        ];

        foreach ($types as $typeData) {
            Type::create([
                'name' => $typeData,
            ]);
        }
    }
}
