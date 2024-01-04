<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'tests',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'locations',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more permissions as needed
        ];

        foreach ($permissions as $permissionData) {
            Permission::create([
                'name' => $permissionData['name'],
                'guard_name' => $permissionData['guard_name'],
            ]);
        }
    }
}
