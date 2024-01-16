<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        // 'appointment_time' => 'datetime'
    ];


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
        return $this->belongsTo(User::class, 'user_id');
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
}
