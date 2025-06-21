<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleHotelLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all hotel and location IDs
        $hotelIds = DB::table('hotels')->pluck('id');
        $locationIds = DB::table('locations')->pluck('id');
        
        $hotelLocations = [];
        
        foreach ($hotelIds as $hotelId) {
            // Assign 1-2 random locations to each hotel
            $assignedLocations = $locationIds->random(rand(1, 2));
            
            foreach ($assignedLocations as $locationId) {
                $hotelLocations[] = [
                    'hotel_id' => $hotelId,
                    'location_id' => $locationId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Remove duplicates
        $hotelLocations = collect($hotelLocations)
            ->unique(function ($item) {
                return $item['hotel_id'] . '-' . $item['location_id'];
            })
            ->values()
            ->toArray();

        DB::table('hotel_location')->insert($hotelLocations);
    }
}
