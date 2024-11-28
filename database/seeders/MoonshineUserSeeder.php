<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use MoonShine\Models\MoonshineUser;
use MoonShine\Models\MoonshineUserRole;

class MoonshineUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve the Admin role
        $adminRole = MoonshineUserRole::where('name', 'Admin')->first();

        // Create a default user and assign the Admin role
        MoonshineUser::create([
            'name' => 'Admin',
            'email' => 'admin@estate.com',
            'password' => Hash::make('123'),
            'moonshine_user_role_id' => $adminRole->id,
        ]);
    }
}
