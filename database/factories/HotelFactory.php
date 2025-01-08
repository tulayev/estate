<?php

namespace Database\Factories;

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
        return [
            'title' => $this->faker->company,
            'slug' => $this->faker->unique()->slug,
            'description' => [
                'en' => $this->faker->paragraph,
                'ru' => $this->faker->paragraph,
            ],
            'codename' => $this->faker->optional()->word,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'price' => $this->faker->randomFloat(3, 50, 1000),
            'active' => $this->faker->boolean(80), // 80% chance to be active
            'created_by' => 1, // Assume admin user exists
        ];
    }
}
