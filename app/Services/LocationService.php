<?php

namespace App\Services;

use App\Models\{
    Location,
    LocationTiming,
    LocationDayTiming,
    LocationTerm,
    LocationTest,
    LocationPanel
};

class LocationService
{
    public function storeLocation(array $data)
    {
        $location = new Location($data);
        $location->save();

        return $location;
    }

    public function storeLocationTiming(array $timingData, $locationId)
    {
        $locationTiming = new LocationTiming($timingData);
        $locationTiming->location_id = $locationId;
        $locationTiming->save();

        return $locationTiming;
    }

    public function storeLocationDayTiming($data, $locationId)
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        foreach ($daysOfWeek as $day) {
            if (isset($data[$day . '_status'])) {
                $locationDayTiming = new LocationDayTiming;
                $locationDayTiming->location_id = $locationId;
                $locationDayTiming->day_of_week = $day;
                $locationDayTiming->start_time = $data[$day . '-start-time']; // Use specific key for start time
                $locationDayTiming->end_time = $data[$day . '-end-time'];     // Use specific key for end time
                $locationDayTiming->status = $data[$day . '_status'];
                $locationDayTiming->save();
            }
        }

    }


    public function storeLocationTerms(array $data, $locationId)
    {
        $locationTerm = new LocationTerm($data);
        $locationTerm->location_id = $locationId;
        $locationTerm->save();

        return $locationTerm;
    }

    public function storeLocationTests(array $tests, $locationId)
    {
        foreach ($tests ?? [] as $testId) {
            LocationTest::create([
                'location_id' => $locationId,
                'test_id' => $testId,
            ]);
        };
    }

    public function storeLocationPanels(array $panels, $locationId)
    {
        foreach ($panels ?? [] as $panelId) {
            LocationPanel::create([
                'location_id' => $locationId,
                'panel_id' => $panelId,
            ]);
        };
    }
}