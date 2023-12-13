<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientAppointment extends Model
{

    protected $fillable = [

    ];

    protected $casts = [
        'panel_tests' => 'json',
        'single_tests' => 'json',
        'other_tests' => 'json',
        'icd_codes' => 'json',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | BOOT
     * |--------------------------------------------------------------------------
     */
    protected static function boot()
    {
        parent::boot();

        // @todo - use observer
        static::created(function ($obj) {
            $obj->sample_id = 'TL' . $obj->id;
            $obj->save();
        });
    }


    /**
     * |--------------------------------------------------------------------------
     * | ACCESSORS & MUTATORS
     * |--------------------------------------------------------------------------
     */
    public function getAppointmentAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function setAppointmentAttribute($value)
    {
        $this->attributes['appointment'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    /**
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
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    /**
     * @return BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'locationId');
    }

    /**
     * @return BelongsTo
     */
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class, 'single_test');
    }

    /**
     * @return BelongsTo
     */
    public function icdCodes(): BelongsTo
    {
        return $this->belongsTo(IcdCode::class, 'icd_codes');
    }

    /**
     * @return BelongsTo
     */
    public function paneltest(): BelongsTo
    {
        return $this->belongsTo(self::class, 'panel_tests');
    }

    /**
     * @return BelongsTo
     */
    public function resultStatus(): BelongsTo
    {
        return $this->belongsTo(ResultStatus::class, 'result_id');
    }

    /**
     * @return BelongsTo
     */
    public function PatientLocation(): BelongsTo
    {
        return $this->belongsTo(ResultStatus::class, 'patientLocationId');
    }

}