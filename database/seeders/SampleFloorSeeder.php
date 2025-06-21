<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleFloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all hotel IDs
        $hotelIds = DB::table('hotels')->pluck('id');
        
        $floors = [];
        
        foreach ($hotelIds as $hotelId) {
            // Create 1-3 floors per hotel
            $floorCount = rand(1, 3);
            
            for ($i = 1; $i <= $floorCount; $i++) {
                $floors[] = [
                    'hotel_id' => $hotelId,
                    'floor' => $i,
                    'image' => null,
                    'image_url' => null,
                    'bedrooms' => rand(1, 5),
                    'bathrooms' => rand(1, 3),
                    'area' => rand(50, 300),
                    'price' => rand(50000, 500000),
                    'postfix' => 'THB',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert floors in batches
        foreach (array_chunk($floors, 50) as $batch) {
            DB::table('floors')->insert($batch);
        }
    }
}
