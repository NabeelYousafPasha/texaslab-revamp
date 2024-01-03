<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TestIcdCode extends Pivot
{
    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'test_id',
        'icd_code_id',
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
