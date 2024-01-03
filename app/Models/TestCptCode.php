<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCptCode extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'test_id',
        'cpt_code',
        'cpt_description',
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
