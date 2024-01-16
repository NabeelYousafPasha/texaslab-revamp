<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        return $this->hasMany(LocationTiming::class, 'location_id');
    }
}
