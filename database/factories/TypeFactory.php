<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
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
            'name' => [
                'en' => $fakerEn->word,
                'ru' => $fakerRu->word,
            ],
        ];
    }
}
