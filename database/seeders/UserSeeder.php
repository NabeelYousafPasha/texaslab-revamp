<?php

namespace Database\Seeders;

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
        $users = [
            'admin@texaslab.com' => [
                'name' => 'Admin',
                'email' => 'admin@texaslab.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $userIndex => $user) {
            User::firstOrCreate([
                'email' => $userIndex,
            ], [
                ...$user
            ]);
        }
    }
}
