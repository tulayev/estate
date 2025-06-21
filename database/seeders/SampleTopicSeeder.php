<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SampleTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs
        $categoryIds = DB::table('topic_categories')->pluck('id');
        
        $topics = [
            [
                'title' => json_encode([
                    'en' => 'Sample Topic 1',
                    'ru' => 'Образец темы 1'
                ]),
                'slug' => 'sample-topic-1',
                'body' => json_encode([
                    'en' => 'This is a sample topic content in English.',
                    'ru' => 'Это образец содержания темы на русском языке.'
                ]),
                'main_ideas' => json_encode([
                    'en' => 'Sample main ideas for topic 1',
                    'ru' => 'Основные идеи для темы 1'
                ]),
                'minutes_to_read' => 5,
                'views' => 0,
                'image' => null,
                'logo' => null,
                'active' => true,
                'type' => 'for_investors',
                'topic_category_id' => $categoryIds->first(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => json_encode([
                    'en' => 'Sample Topic 2',
                    'ru' => 'Образец темы 2'
                ]),
                'slug' => 'sample-topic-2',
                'body' => json_encode([
                    'en' => 'This is another sample topic content in English.',
                    'ru' => 'Это еще один образец содержания темы на русском языке.'
                ]),
                'main_ideas' => json_encode([
                    'en' => 'Sample main ideas for topic 2',
                    'ru' => 'Основные идеи для темы 2'
                ]),
                'minutes_to_read' => 7,
                'views' => 0,
                'image' => null,
                'logo' => null,
                'active' => true,
                'type' => 'for_developers',
                'topic_category_id' => $categoryIds->skip(1)->first() ?? $categoryIds->first(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => json_encode([
                    'en' => 'Sample Topic 3',
                    'ru' => 'Образец темы 3'
                ]),
                'slug' => 'sample-topic-3',
                'body' => json_encode([
                    'en' => 'This is a third sample topic content in English.',
                    'ru' => 'Это третий образец содержания темы на русском языке.'
                ]),
                'main_ideas' => json_encode([
                    'en' => 'Sample main ideas for topic 3',
                    'ru' => 'Основные идеи для темы 3'
                ]),
                'minutes_to_read' => 3,
                'views' => 0,
                'image' => null,
                'logo' => null,
                'active' => true,
                'type' => 'for_investors',
                'topic_category_id' => $categoryIds->last(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('topics')->insert($topics);
    }
}
