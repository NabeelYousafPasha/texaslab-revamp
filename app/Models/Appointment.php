<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    BelongsToMany
};

/**
 * @property int $id
 * @property int $location_id
 * @property int $user_id
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class Appointment extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location_id',
        'user_id',
        'appointment_date',
        'appointment_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'appointment_date' => 'date',
        'appointment_time' => 'datetime:H:i:s',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | BOOT
     * |--------------------------------------------------------------------------
     */

    /**
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // @todo - use observer
        // static::created(function ($obj) {
        //     $obj->sample_id = 'TL' . $obj->id;
        //     $obj->save();
        // });
    }

    /**
     * |--------------------------------------------------------------------------
     * | ACCESSORS & MUTATORS
     * |--------------------------------------------------------------------------
     */

    /**
     *
     * @return Attribute
     */
    protected function appointment(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('m/d/Y'),
            set: fn ($value) => Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d'),
        );
    }

    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    /**
     * 
     * @return BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * 
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    /**
     *
     * @return BelongsToMany
     */
    public function tests(): BelongsToMany
    {
        return $this->belongsToMany(Test::class, 'appointment_tests', 'appointment_id', 'test_id');
    }

    /**
     *
     * @return BelongsToMany
     */
    public function panels(): BelongsToMany
    {
        return $this->belongsToMany(Panel::class, 'appointment_panels', 'appointment_id', 'panel_id');
    }

    /**
     *
     * @return BelongsToMany
     */
    public function location_providers(): BelongsToMany
    {
        return $this->belongsToMany(LocationProvider::class, 'appointment_location_providers', 'appointment_id', 'location_provider_id');
    }
}
