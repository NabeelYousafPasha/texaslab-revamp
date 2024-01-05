<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationTiming extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
        'block_start_time',
        'block_end_time',
        'time_interval',
        'block_limit',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    /**
     * @return BelongsTo
     */
    public function locationTiming(): BelongsTo
    {
        return $this->belongsTo(LocationDetail::class, 'location_id');
    }
}
