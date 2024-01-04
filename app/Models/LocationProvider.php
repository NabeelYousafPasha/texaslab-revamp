<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationProvider extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_id', 'first_name', 'last_name', 'npi',
    ];

    /**
     * @return BelongsTo
     */
    public function locationProvider(): BelongsTo
    {
        return $this->belongsTo(LocationDetail::class, 'location_id');
    }
}
