<?php

namespace App\Services;

use App\Entities\TestEntity;
use App\Models\Test;
use App\Models\TestResultKpi;

class TestService 
{
    public function store(array $data)
    {
        // $testEntity = new TestEntity();

        // $testEntity->setName($data['name']);
        // $testEntity->setStatusId($data['status_id']);
        // $testEntity->setIsFree($data['is_free']);
        // $testEntity->setActualPrice($data['actual_price']);
        // $testEntity->setOfferedPrice($data['offered_price']);
        // $testEntity->setCompetitorPrice($data['competitor_price']);
        // $testEntity->setFeaturedAt($data['featured_at']);
        // $testEntity->setIsRenderabble($data['is_renderabble']);
        // $testEntity->setDescriptionText($data['description_text']);
        // $testEntity->setDescriptionHtml($data['description_html']);

        return Test::create($data);
    }

    public function syncTestResultKpis(Test $test, array $resultKpis)
    {
        foreach ($resultKpis as $resultKpiId => $value) {
            TestResultKpi::create([
                'test_id' => $test->id,
                'result_kpi_id' => $resultKpiId,
                'value' => $value,
            ]);
        }
    }
}