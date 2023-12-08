<?php

namespace App\Models;

use Carbon\Carbon;
// use PDF;

use Illuminate\Database\Eloquent\Model;

class PatientAppointment extends Model
{
    protected $casts = [
        'panel_tests' => 'json',
        'single_tests' => 'json',
        'other_tests' => 'json',
        'icd_codes' => 'json',
        // 'hl7resultpdf'=> 'json',
    ];

    public function patient()
    {
        return $this->belongsTo('App\models\Patient', 'patient_id');
    }

    /**
     * Used to create relation between location and patient
     *
     */
    public function location()
    {
        return $this->belongsTo('App\Location', 'locationId');
    }


    public function getAppointmentAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('m/d/Y');
    }


    public function setAppointmentAttribute($value)
    {
        $this->attributes['appointment'] = \Carbon\Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function test()
    {
        return $this->belongsTo('App\Test', 'single_test');
    }

    public function icdCodes()
    {
        return $this->belongsTo('App\IcdCode', 'icd_codes');
    }

    public function paneltest()
    {
        return $this->belongsTo('App\PatientAppointment', 'panel_tests');
    }

    public function resultStatus()
    {
        return $this->belongsTo('App\ResultStatus', 'result_id');
    }

    public function PatientLocation()
    {
        return $this->belongsTo('App\ResultStatus', 'patientLocationId');
    }


    protected static function boot()
    {
        parent::boot();

        static::created(function ($obj) {
            $obj->sample_id = 'TL' . $obj->id;
            $obj->save();
        });
    }


}