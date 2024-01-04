<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'clia',
        'sales_rep_code',
        'address',
        'city',
        'state',
        'zipcode',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'panel_ids' => 'json',
        'test_ids' => 'json',
    ];
}
