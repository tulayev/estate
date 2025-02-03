<?php

namespace Database\Seeders;

use App\Helpers\Constants;
use Illuminate\Database\Seeder;
use MoonShine\Models\MoonshineUserRole;

class MoonshineUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [];

        foreach (Constants::ROLES as $k => $v) {
            $roles[] = ['name' => $k];
        }

        foreach ($roles as $role) {
            MoonshineUserRole::updateOrCreate(
                ['name' => $role['name']],
                ['name' => $role['name']] // Ensures no duplicates
            );
        }
    }
}
