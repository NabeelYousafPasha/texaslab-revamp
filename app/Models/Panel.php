<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panel extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status_id',
        'description_text',
        'description_html',
        'price',
        'is_renderabble',
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_renderabble' => 'boolean',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | RELATIONSHIPS
     * |--------------------------------------------------------------------------
     */

    /**
     * Get the Status of Test
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
