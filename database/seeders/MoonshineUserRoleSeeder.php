<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MoonShine\Models\MoonshineUserRole;

class MoonshineUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define default roles
        $roles = [
            ['name' => 'Admin'],  // Admin role
            ['name' => 'Moderator'], // Editor role
        ];

        // Insert roles into the database
        foreach ($roles as $role) {
            MoonshineUserRole::updateOrCreate(
                ['name' => $role['name']],
                ['name' => $role['name']] // Ensures no duplicates
            );
        }
    }
}
