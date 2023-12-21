<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
