<?php

namespace Database\Seeders;

use App\Models\TopicCategory;
use Illuminate\Database\Seeder;

class TopicCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TopicCategory::factory(5)->create();
    }
}
