<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationPanel extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location_id',
        'panels',
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'panels' => 'json',
    ];
}
