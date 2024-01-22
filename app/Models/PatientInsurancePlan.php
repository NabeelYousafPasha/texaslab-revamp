<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PatientInsurancePlan extends Pivot
{
    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_insurance_id',
        'insurance_plan_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
