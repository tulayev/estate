<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topicCategories = [
            'Research' => 'Исследование',
            'New'      => 'Новинка',
            'Opinion'  => 'Мысль',
        ];

        foreach ($topicCategories as $en => $ru) {
            DB::table('topic_categories')->insert([
                'title' => json_encode([
                    'en' => $en,
                    'ru' => $ru,
                ]),
            ]);
        }
    }
}
