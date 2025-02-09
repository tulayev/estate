<?php

namespace Database\Seeders;

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
        $adminRole = MoonshineUserRole::where('name', 'Admin')->first();
        $moderatorRole = MoonshineUserRole::where('name', 'Moderator')->first();
        $developerRole = MoonshineUserRole::where('name', 'Developer')->first();

        MoonshineUser::create([
            'name' => 'Admin',
            'email' => 'admin@estate.com',
            'password' => Hash::make('123'),
            'moonshine_user_role_id' => $adminRole->id,
        ]);
        MoonshineUser::create([
            'name' => 'Moderator',
            'email' => 'moderator@estate.com',
            'password' => Hash::make('123'),
            'moonshine_user_role_id' => $moderatorRole->id,
        ]);
        MoonshineUser::create([
            'name' => 'Developer',
            'email' => 'developer@estate.com',
            'password' => Hash::make('123'),
            'moonshine_user_role_id' => $developerRole->id,
        ]);
    }
}
