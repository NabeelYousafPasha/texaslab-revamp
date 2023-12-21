<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status_id',
        'is_free',
        'actual_price',
        'offered_price',
        'competitor_price',
        'featured_at',
        'is_renderabble',
        'description_text',
        'description_html',
        'symptoms',
        'faqs',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_free' => 'boolean',
        'featured_at' => 'datetime',
        'is_renderabble' => 'boolean',
        'symptoms' => 'json',
        'faqs' => 'json',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | ACCESSORS & MUTATORS 
     * |--------------------------------------------------------------------------
     */
    public function paidOrFree(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['is_free'] ? 'Free' : 'Paid',
        );
    }


    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    /**
     * Get the Status of Test
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
