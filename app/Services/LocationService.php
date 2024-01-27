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
     * Store basic location details
     *
     * @param array $data
     * @return Location
     */
    public function storeLocation(array $data): Location
    {
        $location = new Location($data);
        $location->save();

        return $location;
    }

    /**
     * Update location details
     *
     * @param Location $location
     * @param array $data
     * @return Location
     */
    public function updateLocation(Location $location, array $data): Location
    {
        $location->update($data);

        return $location;
    }

    /**
     * Store location timing details
     *
     * @param array $timingData
     * @param integer $locationId
     * @return LocationTiming
     */
    public function storeLocationTiming(array $timingData, int $locationId): LocationTiming
    {
        $existingTiming = LocationTiming::where('location_id', $locationId)->first();

        if ($existingTiming) {
            $existingTiming->update($timingData);
            return $existingTiming;
        }
        
        $locationTiming = new LocationTiming($timingData);
        $locationTiming->location_id = $locationId;
        $locationTiming->save();

        return $locationTiming;
    }


    /**
     * Store location day timing details
     *
     * @param array $data
     * @param integer $locationId
     * @return void
     */
    public function storeLocationDayTiming(array $data, int $locationId)
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($daysOfWeek as $day) {
            $startKey = $day . '-start-time';
            $endKey = $day . '-end-time';
        
            if (isset($data[$day . '_status'])) {
                $dayTimingData = [
                    'location_id' => $locationId,
                    'day_of_week' => $day,
                    'start_time' => $data[$startKey],
                    'end_time' => $data[$endKey],
                    'status' => $data[$day . '_status'],
                ];
        
                LocationDayTiming::updateOrCreate(
                    ['location_id' => $locationId, 'day_of_week' => $day],
                    $dayTimingData
                );
            }
        }
    }

    /**
     * Store location terms details
     *
     * @param array $data
     * @param integer $locationId
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
     * Store location tests details
     *
     * @param array $tests
     * @param integer $locationId
     * @return void
     */
    public function storeLocationTests(array $tests, int $locationId)
    {
        foreach ($tests ?? [] as $testId) {
            LocationTest::create([
                'location_id' => $locationId,
                'test_id' => $testId,
            ]);
        }
    }

    /**
     * Store location panels details
     *
     * @param array $panels
     * @param integer $locationId
     * @return void
     */
    public function storeLocationPanels(array $panels, int $locationId)
    {
        foreach ($panels ?? [] as $panelId) {
            LocationPanel::create([
                'location_id' => $locationId,
                'panel_id' => $panelId,
            ]);
        }
    }
}
