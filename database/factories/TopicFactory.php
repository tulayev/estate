<?php

namespace Database\Factories;

use App\Models\TopicCategory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerEn = FakerFactory::create('en_US'); // English
        $fakerRu = FakerFactory::create('ru_RU'); // Russian
        $wordCount = str_word_count(strip_tags($fakerEn->realTextBetween(200, 400, 2)));
        $wordsPerMinute = 200;

        return [
            'title' => [
                'en' => $this->faker->sentence(),
                'ru' => $this->faker->sentence(),
            ],
            'slug' => $this->faker->unique()->slug(),
            'body' => [
                'en' => $fakerEn->realTextBetween(200, 400, 2),
                'ru' => $fakerRu->realTextBetween(200, 400, 2),
            ],
            'main_ideas' => [
                'en' => $fakerEn->realTextBetween(200, 400, 2),
                'ru' => $fakerRu->realTextBetween(200, 400, 2),
            ],
            'minutes_to_read' => ceil($wordCount / $wordsPerMinute),
            'views' => $this->faker->numberBetween(0, 1000),
            'active' => $this->faker->boolean(),
            'topic_category_id' => $this->faker->numberBetween(1, 3),
            'created_by' => 1,
        ];
    }
}
