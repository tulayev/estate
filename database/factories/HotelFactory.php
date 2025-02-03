<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
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

        return [
            'title' => $this->faker->company,
            'slug' => $this->faker->unique()->slug,
            'description' => [
                'en' => $fakerEn->realTextBetween(900, 1000, 2),
                'ru' => $fakerRu->realTextBetween(900, 1000, 2),
            ],
            'codename' => $this->faker->optional()->word,
            'location' => [
                'en' => $fakerEn->city,
                'ru' => $fakerRu->city,
            ],
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'price' => $this->faker->randomFloat(3, 50, 1000),
            'active' => $this->faker->boolean(80), // 80% chance to be active
            'created_by' => 1,
            'main_image_url' => $this->faker->imageUrl(800, 600),
            'gallery_url' => collect(range(1, rand(3, 10)))
                                ->map(function () {
                                    return $this->faker->imageUrl(800, 600);
                                })
                                ->implode(';'),
        ];
    }
}
