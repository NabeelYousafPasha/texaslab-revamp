<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $model
 * @property ?\Illuminate\Support\Carbon $created_at
 * @property ?\Illuminate\Support\Carbon $updated_at
 */
class ResultKpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'model',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * |--------------------------------------------------------------------------
     * | SCOPES
     * |--------------------------------------------------------------------------
     */
    
    /**
     *
     * @param Builder $builder
     * @param string $model
     * @return Builder
     */
    public function scopeOfModel(Builder $builder, string $model): Builder
    {
        return $builder->where('model', '=', $model);
    }

    /**
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeOfTest(Builder $builder): Builder
    {
        return $builder->ofModel(Test::class);
    }
}
