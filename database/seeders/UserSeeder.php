<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleUsers = [
            Role::SUPER_ADMIN => [
                'admin@texaslab.com' => [
                    'name' => 'Admin',
                    'email' => 'admin@texaslab.com',
                    'password' => bcrypt('password'),
                ],
            ],
        ];

        foreach ($roleUsers as $role => $users) {    
            foreach ($users as $userIndex => $user) {
                $seederUser = User::firstOrCreate([
                    'email' => $userIndex,
                ], [
                    ...$user
                ]);

                $seederUser->assignRole($role);
            }
        }
    }
}
