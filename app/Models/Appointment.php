<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
        'patient_id',
        'appointment_date',
        'appointment_time',
        'token',
        'step',
        'created_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        // 'appointment_date' => 'date',
        // 'appointment_time' => 'datetime:H:i',
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
            get: function () { 
                $date = Carbon::parse($this->attributes['appointment_date'])->format('m/d/Y');
                $time = Carbon::parse($this->attributes['appointment_time'])->format('h:i A');

                return $date.' - '.$time;
            },
            // set: fn ($value) => Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d'),
        );
    }

    /**
     * |--------------------------------------------------------------------------
     * | SCOPES
     * |--------------------------------------------------------------------------
     */
    
    /**
     *
     * @param Builder $builder
     * 
     * @return Builder
     */
    public function scopeOfInCompleted(Builder $builder): Builder
    {
        return $builder->whereNotNull('step');
    }
    
    /**
     *
     * @param Builder $builder
     * 
     * @return Builder
     */
    public function scopeOfCompleted(Builder $builder): Builder
    {
        return $builder->whereNull('step');
    }
    
    /**
     *
     * @param Builder $builder
     * @param string $step
     * 
     * @return Builder
     */
    public function scopeOfStep(Builder $builder, string $step): Builder
    {
        return $builder->where('step', '=', $step);
    }
    
    /**
     *
     * @param Builder $builder
     * 
     * @return Builder
     */
    public function scopeByAuthUser(Builder $builder): Builder
    {
        return $builder->where('created_by', '=', auth()->id());
    }
    
    /**
     *
     * @param Builder $builder
     * 
     * @return Builder
     */
    public function scopeOfCurrentToken(Builder $builder): Builder
    {
        return $builder->where('token', '=', csrf_token());
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
        return $this->belongsToMany(Test::class, 'appointment_tests', 'appointment_id', 'test_id')
            ->withTimestamps();
    }

    /**
     *
     * @return BelongsToMany
     */
    public function panels(): BelongsToMany
    {
        return $this->belongsToMany(Panel::class, 'appointment_panels', 'appointment_id', 'panel_id')
            ->withTimestamps();
    }

    /**
     *
     * @return BelongsToMany
     */
    public function location_providers(): BelongsToMany
    {
        return $this->belongsToMany(LocationProvider::class, 'appointment_location_providers', 'appointment_id', 'location_provider_id')
            ->withTimestamps();
    }
}
