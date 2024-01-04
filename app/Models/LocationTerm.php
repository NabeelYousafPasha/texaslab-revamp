<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class LocationTerm extends Model
{
    use HasFactory;
    protected $fillable = [
        'location_id', 'terms_and_conditions',
    ];

    /**
     * @return BelongsTo
     */
    public function locationTerm(): BelongsTo
    {
        return $this->belongsTo(LocationDetail::class, 'location_id');
    }
}
