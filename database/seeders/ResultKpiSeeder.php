<?php

namespace Database\Seeders;

use App\Models\ResultKpi;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultKpiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resultKpis = [
            Test::class => [
                'ct' => [
                    'name' => 'Ct',
                ],
                'amp_score' => [
                    'name' => 'Amp Score',
                ],
                'cq_conf' => [
                    'name' => 'Cq Conf',
                ],
                'low_formula' => [
                    'name' => 'Low Formula',
                ],
                'modrate_formula' => [
                    'name' => 'Modrate Formula',
                ],
                'high_formula' => [
                    'name' => 'High Formula',
                ],
                'low_value' => [
                    'name' => 'Low Value',
                ],
                'modrate_value' => [
                    'name' => 'Modrate Value',
                ],
                'high_value' => [
                    'name' => 'High Value',
                ],
            ],
        ];

        foreach ($resultKpis as $model => $kpis) {
            foreach ($kpis as $kpiCode => $kpi) {
                ResultKpi::firstOrCreate([
                    'model' => $model,
                    'code' => $kpiCode,
                ], [
                    'name' => $kpi['name'],
                ]);
            }
        }
    }
}
