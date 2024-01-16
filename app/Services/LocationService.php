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
    /**
     *
     * @param array $data
     * 
     * @return Location
     */
    public function storeLocation(array $data): Location
    {
        $location = new Location($data);
        $location->save();

        return $location;
    }

    /**
     *
     * @param array $timingData
     * @param integer $locationId
     * 
     * @return LocationTiming
     */
    public function storeLocationTiming(array $timingData, int $locationId): LocationTiming
    {
        $locationTiming = new LocationTiming($timingData);
        $locationTiming->location_id = $locationId;
        $locationTiming->save();

        return $locationTiming;
    }

    /**
     *
     * @param [type] $data
     * @param integer $locationId
     * 
     * @return void
     */
    public function storeLocationDayTiming($data, int $locationId)
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        
        foreach ($daysOfWeek as $day) {
            if (isset($data[$day . '_status'])) {
                $locationDayTiming = new LocationDayTiming();
                $locationDayTiming->location_id = $locationId;
                $locationDayTiming->day_of_week = $day;
                $locationDayTiming->start_time = $data[$day . '-start-time']; // Use specific key for start time
                $locationDayTiming->end_time = $data[$day . '-end-time'];     // Use specific key for end time
                $locationDayTiming->status = $data[$day . '_status'];
                $locationDayTiming->save();
            }
        }
    }

    /**
     *
     * @param array $data
     * @param integer $locationId
     * 
     * @return LocationTerm
     */
    public function storeLocationTerms(array $data, int $locationId): LocationTerm
    {
        $locationTerm = new LocationTerm($data);
        $locationTerm->location_id = $locationId;
        $locationTerm->save();

        return $locationTerm;
    }

    /**
     *
     * @param array $tests
     * @param integer $locationId
     * 
     * @return void
     */
    public function storeLocationTests(array $tests, int $locationId)
    {
        foreach ($tests ?? [] as $testId) {
            LocationTest::create([
                'location_id' => $locationId,
                'test_id' => $testId,
            ]);
        };
    }

    /**
     *
     * @param array $panels
     * @param integer $locationId
     * 
     * @return void
     */
    public function storeLocationPanels(array $panels, int $locationId)
    {
        foreach ($panels ?? [] as $panelId) {
            LocationPanel::create([
                'location_id' => $locationId,
                'panel_id' => $panelId,
            ]);
        };
    }
}