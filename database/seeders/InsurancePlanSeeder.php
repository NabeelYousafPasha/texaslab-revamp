<?php

namespace Database\Seeders;

use App\Models\InsurancePlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsurancePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insurancePlans = [
            'HMO' => 'HMO',
            'PPO' => 'PPO',
            'EPO' => 'EPO',
            'POS' => 'POS',
        ];


        foreach ($insurancePlans as $code => $name) {
            InsurancePlan::firstOrCreate([
                'code' => $code,
            ], [
                'name' => $name,
            ]);
        }
    }
}
