<?php

namespace Database\Seeders;

use App\Models\{
    Panel,
    Status,
    Test,
};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            Test::class => [
                'draft' => [
                    'name' => 'Draft',
                ],
                'active' => [
                    'name' => 'Active',
                ],
            ],
            Panel::class => [
                'draft' => [
                    'name' => 'Draft',
                ],
                'active' => [
                    'name' => 'Active',
                ],
            ],
        ];

        foreach ($statuses as $model => $status) {
            foreach ($status as $statusCode => $statusValue) {
                Status::firstOrCreate([
                    'model' => $model,
                    'code' => $statusCode,
                ], [
                    'name' => $statusValue['name'],
                ]);
            }
        }
    }
}
