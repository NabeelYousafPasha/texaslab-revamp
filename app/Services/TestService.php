<?php

namespace App\Services;

use App\Entities\TestEntity;
use App\Models\Test;

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
}