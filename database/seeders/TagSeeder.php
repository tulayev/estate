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
        $tags = [
            'Villa'       => 'Вилла',
            'Apartment'   => 'Апартаменты',
            'Projects'    => 'Проекты',
            'Condominium' => 'Кондоминиум',
        ];

        foreach ($tags as $en => $ru) {
            DB::table('tags')->insert([
                'name' => json_encode([
                    'en' => $en,
                    'ru' => $ru,
                ]),
            ]);
        }
    }
}
