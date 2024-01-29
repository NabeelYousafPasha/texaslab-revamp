<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    BelongsToMany,
};

class LocationProvider extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location_id', 
        'first_name', 
        'last_name', 
        'npi',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | ACCESSORS & MUTATORS
     * |--------------------------------------------------------------------------
     */

    /**
     *
     * @return Attribute
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->attributes['first_name'].' '.$this->attributes['last_name'];
            },
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
     * @param $nli
     * 
     * @return Builder
     */
    public function scopeOfNli(Builder $builder, $nli): Builder
    {
        return $builder->where('nli', '=', $nli);
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
     * @return BelongsToMany
     */
    public function appointments(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class, 'appointment_location_providers', 'location_provider_id', 'appointment_id')
            ->withTimestamps();
    }
}
