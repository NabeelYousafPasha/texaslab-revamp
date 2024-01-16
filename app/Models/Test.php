<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Test extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
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
        'specimen',
        'labdaq_compendium',
        'labdaq_panel_name',
        'meta_title',
        'meta_description',
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_free' => 'boolean',
        'featured_at' => 'datetime',
        'is_renderabble' => 'boolean',
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
    
    /**
     *
     * @return BelongsToMany
     */
    public function icd_codes(): BelongsToMany
    {
        return $this->belongsToMany(IcdCode::class, 'test_icd_code', 'test_id', 'icd_code_id');
    }

    /**
     *
     * @return BelongsToMany
     */
    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class, 'appointment_tests', 'test_id', 'appointment_id');
    }
}
