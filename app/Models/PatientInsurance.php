<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
