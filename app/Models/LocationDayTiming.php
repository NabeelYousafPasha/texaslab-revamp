<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationDayTiming extends Model
{
    use HasFactory;
    protected $fillable = ['location_id', 'day_of_week', 'start_time', 'end_time', 'status'];

}
