<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelTest extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'panel_id',
        'test_id',
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
