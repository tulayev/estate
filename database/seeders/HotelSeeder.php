<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Floor;
use App\Models\Hotel;
use App\Models\Tag;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable model events to bypass the creating and deleting events
        Hotel::withoutEvents(function () {
            // Create types, tags and features
            $types = Type::all();
            $tags = Tag::factory(10)->create(); // Create 10 tags
            $features = Feature::factory(10)->create(); // Create 10 features

            // Create 20 hotels
            Hotel::factory(20)->create()->each(function ($hotel) use ($types, $tags, $features) {
                // Manually set the created_at and updated_at fields
                $createdAt = Carbon::now()->subDays(rand(0, 30)); // Random date in the last 30 days
                $updatedAt = Carbon::now()->subDays(rand(0, 30)); // Random date in the last 30 days

                // Update the hotel with the created_at and updated_at
                $hotel->update([
                    'created_at' => $createdAt,
                    'updated_at' => $updatedAt,
                ]);

                // Attach random tags
                $hotel->types()->attach($types->random(rand(1, 3))->pluck('id')->toArray());

                // Attach random tags
                $hotel->tags()->attach($tags->random(rand(1, 10))->pluck('id')->toArray());

                // Attach random features
                $hotel->features()->attach($features->random(rand(1, 10))->pluck('id')->toArray());

                // Create floors for each hotel
                Floor::factory(rand(1, 5))->create(['hotel_id' => $hotel->id]);

                // Optionally, you can set a different `updated_at` for each update action
                $hotel->touch(); // Updates the `updated_at` field only if needed
            });
        });
    }
}
