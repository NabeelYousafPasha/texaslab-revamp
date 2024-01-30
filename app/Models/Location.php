<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'clia',
        'sales_rep_code',
        'address',
        'city',
        'state',
        'zipcode',
        'status',
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'status' => 'boolean',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    /**
     *
     * @return HasMany
     */
    public function dayTimings(): HasMany
    {
        return $this->hasMany(LocationDayTiming::class, 'location_id');
    }

    /**
     *
     * @return HasMany
     */
    public function locationTiming(): HasMany
    {
        return $this->hasMany(LocationTiming::class, 'location_id');
    }

    /**
     *
     * @return HasMany
     */
    public function locationTests(): HasMany
    {
        return $this->hasMany(LocationTest::class, 'location_id');
    }

    /**
     *
     * @return HasMany
     */
    public function providers(): HasMany
    {
        return $this->hasMany(LocationProvider::class, 'location_id');
    }

    /**
     *
     * @return BelongsToMany
     */
    public function tests(): BelongsToMany
    {
        return $this->belongsToMany(Test::class, 'location_tests', 'location_id', 'test_id')
            ->withTimestamps(); 
    }

    /**
     *
     * @return BelongsToMany
     */
    public function panels(): BelongsToMany
    {
        return $this->belongsToMany(Panel::class, 'location_panels', 'location_id', 'panel_id')
            ->withTimestamps(); 
    }
}
