<?php

namespace App\Services;

use App\Models\{
    Panel,
    PanelTest,
};

class PanelService
{
    public function store(array $data)
    {
        return Panel::create($data);
    }

    public function syncPanelTests(Panel $panel, array $tests)
    {
        foreach ($tests as $test) {
            PanelTest::create([
                'panel_id' => $panel->id,
                'test_id' => $test,
            ]);
        }
    }
}