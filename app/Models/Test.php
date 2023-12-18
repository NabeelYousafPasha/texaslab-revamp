<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status_id',
        'is_free',
        'actual_price',
        'offered_price',
        'competitor_price',
        'featured_at',
        'is_renderabble',
        'description_text',
        'description_html',
        'symptoms',
        'faqs',
        'result_kpis',
    ];

    protected $casts = [
        'is_free' => 'boolean',
        'featured_at' => 'datetime',
        'is_renderabble' => 'boolean',
        'symptoms' => 'json',
        'faqs' => 'json',
        'result_kpis' => 'json',
    ];
}
