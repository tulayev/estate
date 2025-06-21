<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'role' => 'agent',
                'full_name' => 'John Smith',
                'phone' => '+66 123 456 789',
                'email' => 'john.smith@example.com',
                'note' => 'Sample contact 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'agent',
                'full_name' => 'Anna Johnson',
                'phone' => '+66 987 654 321',
                'email' => 'anna.johnson@example.com',
                'note' => 'Sample contact 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'manager',
                'full_name' => 'Mike Wilson',
                'phone' => '+66 555 123 456',
                'email' => 'mike.wilson@example.com',
                'note' => 'Sample contact 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'agent',
                'full_name' => 'Sarah Davis',
                'phone' => '+66 777 888 999',
                'email' => 'sarah.davis@example.com',
                'note' => 'Sample contact 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'manager',
                'full_name' => 'David Brown',
                'phone' => '+66 111 222 333',
                'email' => 'david.brown@example.com',
                'note' => 'Sample contact 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('contacts')->insert($contacts);
    }
}
