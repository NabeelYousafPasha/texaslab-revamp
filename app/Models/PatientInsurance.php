<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PatientInsurance extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_id',
        'name',
        'responsible_relationship',
        'subscriber_member_id',
        'carrier_code',
        'address',
        'city',
        'state',
        'zipcode',
        'employer_no',
        'ssn',
        'is_worker_compensated',
        'model_type',
        'model_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_worker_compensated' => 'boolean',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    /**
     *
     * @return BelongsToMany
     */
    public function insurance_plans(): BelongsToMany
    {
        return $this->belongsToMany(InsurancePlan::class, 'patient_insurance_plan', 'patient_insurance_id', 'insurance_plan_id')
            ->withTimestamps();
    }
}
